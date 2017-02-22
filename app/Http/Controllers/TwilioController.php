<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Twiml;
use Illuminate\Support\Facades\Response;
use App\Twilio;

class TwilioController extends Controller
{
    private $client;

    function __construct()
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $this->client = new Client($sid, $token);
    }

    public function index(Request $request)
    {
        return view('twilio.index');
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'phone_number' => 'required|min:10',
            'message' => 'required|min:4',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        $twilio = $this->store($request);

        if(!empty($request->input('sms'))){
            $this->sms($twilio);
        }

        if(!empty($request->input('voice'))){
            $this->voice($twilio);
        }

        flash()->overlay('Please stand by, your message is on the way.', 'Success!');
        return redirect('/');
    }

    private function store(Request $request)
    {
        $twilio = new Twilio;

        foreach ($twilio->getFillable() as $field){
            if(!empty($request->input($field))){
                if($request->input($field) == 'on'){
                    $twilio->{$field} = true;
                } else {
                    $twilio->{$field} = $request->input($field);
                }
            }
        }

        $twilio->save();
        return $twilio;
    }

    private function sms($twilio)
    {
        try {
            $response = $this->client->messages->create(
                '+1' . $twilio->phone_number,
                array(
                    'from' => env('TWILIO_DEFAULT_NUMBER'),
                    'body' => $twilio->message
                )
            );
        } catch (Exception $e) {
            Log::info('Error completing sms: ' . $twilio->id . ' | ' . $e);
        }
    }

    private function voice($twilio)
    {
        try {
            $call = $this->client->account->calls->create(
                '+1' . $twilio->phone_number,
                env('TWILIO_DEFAULT_NUMBER'),
                array("url" => url('/twilio/outbound/' . $twilio->id))
            );
        } catch (Exception $e) {
            Log::info('Error completing call: ' . $twilio->id . ' | ' . $e);
        }
    }

    public function outbound($id)
    {
        $twilio = Twilio::where('id', $id)->first();

        $twiml = new Twiml();
        $twiml->say($twilio->message, array('voice' => 'alice'));
        $response = Response::make($twiml, 200);
        $response->header('Content-Type', 'text/xml');
        return $response;
    }
}

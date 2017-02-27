<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KatasController extends Controller
{
    public function fizz_buzz(Request $request)
    {
        $res = array();

        for($i=1; $i<=100; $i++){
            $var = '';

            if($i % 3 == 0){
                $var .= 'Fizz';
            }

            if($i % 5 == 0){
                $var .= 'Buzz';
            }

            if(empty($var))
            {
                $var = $i;
            }

            $res[] = $var;
        }

        return view('katas.fizz_buzz')->with('results', $res);
    }

    public function info(Request $request)
    {
        return view('katas.info');
    }

    public function debug(Request $request)
    {
        try {
            $databases = DB::select('SHOW DATABASES;');
        }
        catch (Exception $e) {
            $databases = $e->getMessage();
        }

        return view('katas.debug')->with('databases', $databases);
    }

    public function pig_latin(Request $request)
    {
        return view('katas.pig_latin');
    }
}

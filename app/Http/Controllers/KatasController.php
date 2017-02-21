<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}

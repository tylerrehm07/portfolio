@extends('layouts.master')

@section('styles')
    <link href="/css/katas/fizz_buzz.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="content">
    <div class="title m-b-md">
        Fizz Buzz Exercise
    </div>

    <div class="sub">
        <div class="description">
            <p>
                The "Fizz-Buzz test" is an interview question designed to help filter out the 99.5% of programming job candidates who can't seem to program their way out of a wet paper bag.
                The text of the programming assignment is as follows:
                "Write a program that prints the numbers from 1 to 100. But for multiples of three print “Fizz” instead of the number and for the multiples of five print “Buzz”. For numbers which are multiples of both three and five print “FizzBuzz”."
            </p>
        </div>

        <div class="results">
            <table>
                <tr>
                    <th>Integer</th>
                    <th>Result</th>
                </tr>
                @foreach($results as $key => $result)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $result }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="description">
            <p>
                That's it! Thanks for checking out this exercise.
                To review some more exercises, please return to the <a href="/">home page</a>.
            </p>
        </div>

        <div class="spacer"></div>
    </div>
</div>
@endsection

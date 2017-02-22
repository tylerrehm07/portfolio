@extends('layouts.master')

@section('styles')
    <link href="/css/welcome.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">

            <div class="title m-b-md">
                Tyler Rehm
            </div>

            <div class="links">
                <a href="/katas/fizz_buzz">Fizz Buzz</a>
                <a href="/katas/info">Php Info</a>
                <a href="/katas/debug">Debug</a>
                <a href="/twilio">Twilio</a>
            </div>

            <div class="links">
                <a href="https://github.com/tylerrehm07/portfolio">Github</a>
                <a href="https://www.linkedin.com/in/tylerrehm/">LinkedIn</a>
                <a href="/sites">Sites</a>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#flash-overlay-modal').modal();
    </script>
@endsection


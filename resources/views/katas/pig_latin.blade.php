@extends('layouts.master')

@section('styles')
    <link href="/css/katas/pig_latin.css" rel="stylesheet" type="text/css">
@endsection

@section('js')
    <script src="/js/pig_latin.js"></script>
@endsection

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Pig Latin Exercise
        </div>

        <div class="sub">
            <div align="center">
                <p>
                    Using jQuery, we will take any word(s) and convert them to pig latin for you. Enjoy!
                </p>
            </div>

            <div class="entry">
                <textarea id="user_entry"></textarea><br/>
                <button type="button" class="btn btn-default" id="submission">Translate</button>
            </div>

            <div class="results" align="left">
                <p id="conversion"></p>
            </div>

            <div align="center">
                @include('partials.salutation')
            </div>

        </div>
    </div>
@endsection

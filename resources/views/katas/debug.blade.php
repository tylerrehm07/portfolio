@extends('layouts.master')

@section('styles')
    <link href="/css/katas/debug.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Debug Information
        </div>

        <h3>Environment</h3>
        {{ env('APP_ENV') }}

        <h3>Debugging?</h3>
        {{ (!empty(env('APP_DEBUG'))) ? 'Yes' : 'No' }}

        <h3>Test Database Connection</h3>
        @if(is_array($databases))
            <strong class="confirmed">Connection confirmed</strong>
            <br/>
            <div align="center">
                <h3>Your Databases:</h3>
                <table class="table databases">
                    @foreach($databases as $database)
                        <tr>
                            <td>
                                {{ $database->Database }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @else
            <strong class="error">Caught exception:  {{ $databases }}</strong>
        @endif

        @include('partials.salutation')

    </div>
@endsection


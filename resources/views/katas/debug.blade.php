@extends('layouts.master')

@section('styles')
    <style>
        .confirmed{
            background-color:green;
            padding:5px;
        }
        .error{
            background-color:crimson;
            padding:5px;
        }
    </style>
@endsection

@section('content')
    <h1>Environment</h1>
    {{ env('APP_ENV') }}

    <h1>Debugging?</h1>
    {{ (!empty(env('APP_DEBUG'))) ? 'Yes' : 'No' }}

    <h1>Test Database Connection</h1>
    @if(is_array($databases))
        <strong class="confirmed">Connection confirmed</strong>
        <br><br>Your Databases:<br><br>
        <table>
        @foreach($databases as $database)
            <tr>
                <td>
                    {{ $database->Database }}
                </td>
            </tr>
        @endforeach
        </table>
    @else
        <strong class="error">Caught exception:  {{ $databases }}</strong>
    @endif
@endsection

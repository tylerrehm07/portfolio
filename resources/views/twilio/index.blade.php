@extends('layouts.master')

@section('styles')
    <link href="/css/twilio.css" rel="stylesheet" type="text/css">
@endsection

@section('content')

    <div class="content">
        <div class="title m-b-md">
            Twilio Demo
        </div>

        <div class="description">
            Here you can send a voice and/or sms message to whomever you'd like! Feel free to interact with the Twilio API.
        </div>

        <div class="col-md-12">
            <form action="/twilio/add" method="POST" id="sms">
                {{ csrf_field() }}

                <div class="col-md-1"></div>

                <div class="col-md-4">
                    <h3>User Information</h3>

                    <div class="input-group" align="left">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" placeholder="800-555-5555" name="phone_number">
                    </div>
                    @if(!empty($errors->first('phone_number')))
                        <br/>
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('phone_number') }}
                        </div>
                    @endif
                    <br>
                    <div class="input-group" align="left">
                        <label for="message">Message</label>
                        <textarea class="form-control" name="message" rows="5" cols="26"></textarea>
                    </div>
                    @if(!empty($errors->first('message')))
                        <br/>
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('message') }}
                        </div>
                    @endif
                </div>

                <div class="col-md-2"></div>

                <div class="col-md-4" align="left">

                    <h3>Methods</h3>

                    <div class="checkbox">
                        <label><input type="checkbox" name="voice">Voice</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="sms" checked>SMS</label>
                    </div>

                    <br>

                    <div>
                        {!! Recaptcha::render() !!}

                        @if(!empty($errors->first('g-recaptcha-response')))
                            <br/>
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('g-recaptcha-response') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group submit">
                        <button type="submit" class="btn btn-default">Go!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-12 salutation">
        @include('partials.salutation')
    </div>

@endsection
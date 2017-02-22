<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twilio extends Model
{
    protected $fillable = ['phone_number', 'message', 'voice', 'sms'];
}

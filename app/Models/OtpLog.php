<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtpLog extends Model
{
    protected $fillable = ['identifier', 'otp', 'expires_at', 'is_verified'];
}

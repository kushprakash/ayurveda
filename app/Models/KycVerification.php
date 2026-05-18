<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KycVerification extends Model
{
    protected $fillable = [
        'user_id', 'application_id', 'aadhaar_no', 'is_aadhaar_verified',
        'pan_no', 'is_pan_verified', 'bank_name', 'account_no', 
        'ifsc_code', 'account_holder', 'is_bank_verified', 'raw_response'
    ];

    protected $casts = [
        'raw_response' => 'json',
        'is_aadhaar_verified' => 'boolean',
        'is_pan_verified' => 'boolean',
        'is_bank_verified' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

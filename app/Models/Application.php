<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'application_no', 'user_id', 'vacancy_id', 'state_id', 
        'district_id', 'block_id', 'panchayat_id', 'village_id',
        'gender', 'dob', 'address', 'education', 'experience',
        'status', 'payment_status', 'total_amount', 'signature',
        'current_step', 'completion_percentage', 'kyc_status', 'form_data', 'last_active_at'
    ];

    protected $casts = [
        'form_data' => 'array',
        'last_active_at' => 'datetime'
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function panchayat()
    {
        return $this->belongsTo(Panchayat::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }


    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function kyc()
    {
        return $this->hasOne(KycVerification::class);
    }
}

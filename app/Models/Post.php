<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name', 'code', 'description', 'salary', 
        'application_fee', 'gst_percentage', 'is_active'
    ];

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function requiredDocuments()
    {
        return $this->hasMany(PostRequiredDocument::class);
    }

    public function getTotalFeeAttribute()
    {
        return $this->application_fee + ($this->application_fee * ($this->gst_percentage / 100));
    }
}

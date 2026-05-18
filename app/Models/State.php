<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name', 'code', 'icon', 'is_active'];

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }
}

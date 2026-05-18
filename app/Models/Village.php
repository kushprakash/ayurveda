<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $fillable = ['panchayat_id', 'name'];

    public function panchayat()
    {
        return $this->belongsTo(Panchayat::class);
    }
}

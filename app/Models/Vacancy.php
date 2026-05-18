<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'post_id', 'state_id', 'total_seats', 'start_date', 'end_date',
        'department', 'employment_type', 'age_limit', 'qualification',
        'experience', 'selection_criteria', 'work_flow', 'responsibilities',
        'terms_conditions', 'salary_structure', 'training_details',
        'joining_process', 'selection_rounds', 'hiring_timeline', 'is_active'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}

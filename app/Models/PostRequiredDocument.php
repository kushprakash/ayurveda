<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostRequiredDocument extends Model
{
    protected $fillable = ['post_id', 'document_name', 'is_mandatory'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

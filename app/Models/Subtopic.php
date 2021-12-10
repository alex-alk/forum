<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtopic extends Model
{
    use HasFactory;

    public function topics()
    {
    	return $this->belongsTo('App\Models\Topic');
    }

    public function messages()
    {
    	return $this->hasMany('App\Models\Message');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}

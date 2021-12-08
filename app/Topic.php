<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    public function subtopics()
    {
    	return $this->hasMany('App\Subtopic');
    }

    public function messages()
    {
    	return $this->hasMany('App\Message');
    }
}

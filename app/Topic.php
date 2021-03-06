<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function subtopics()
    {
    	return $this->hasMany('App\Subtopic');
    }

    public function messages()
    {
    	return $this->hasMany('App\Message');
    }
}

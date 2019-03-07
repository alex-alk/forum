<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtopic extends Model
{
    public function topics()
    {
    	return $this->belongsTo('App\Topic');
    }

    public function messages()
    {
    	return $this->hasMany('App\Message');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}

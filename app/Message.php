<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	public function topic()
	{
    	return $this->belongsTo('App\Topic');
	}

	public function subtopic()
	{
    	return $this->belongsTo('App\Subtopic');
	}

	public function user()
    {
    	return $this->belongsTo('App\User');
    }
}

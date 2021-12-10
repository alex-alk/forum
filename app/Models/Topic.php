<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
* @mixin Eloquent
* @property int id
* @property string title
*/
class Topic extends Model
{
    use HasFactory;

    public function subtopics()
    {
    	return $this->hasMany('App\Models\Subtopic');
    }

    public function messages()
    {
    	return $this->hasMany('App\Models\Message');
    }
}

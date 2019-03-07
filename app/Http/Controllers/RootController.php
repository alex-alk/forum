<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subtopic;
use App\Topic;
use App\Message;

class RootController extends Controller
{
    public function root()
    {	

        $subtopics = Subtopic::all();
        $messages = Message::all();
    	$topics = Topic::all();
		$recentSubtopics = Subtopic::orderBy('updated_at', 'desc')->take(3)->get();
    	return view('welcome', compact('topics', 'recentSubtopics', 'subtopics', 'messages'));
    }
}

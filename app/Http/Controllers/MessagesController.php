<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subtopic;
use App\Topic;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id1, $id2)
    {
        $subtopic = Subtopic::find($id2);
        $navsubtopic = Subtopic::find($id2);
        $topic = Topic::find($id1);
        $navtopic = Topic::find($id1);
        $subtopic->views += 1;
        $subtopic->save();
        return view('message', compact('subtopic', 'topic', 'navtopic', 'navsubtopic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id1, $id2)
    {
        if(!Auth::check())
            return redirect('/home');
        $topic = Topic::find($id1);
        $subtopic = Subtopic::find($id2);
        $action = 'create';
        return view('message', compact('topic','subtopic', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id1, $id2)
    {
        $subtopic = Subtopic::find($id2);
        $message = new Message();
        request()->validate([
            'body' => 'required'
        ]);
        $message->body = request('body');
        $message->user_id = Auth::user()->id;
        $message->topic_id = $id1;
        $subtopic->messages()->save($message);
        return redirect("/topic/$id1/subtopic/$id2/message");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::find($id);
        return $message;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id1, $id2, $id3)
    {
        $topic = Topic::find($id1);
        $subtopic = Subtopic::find($id2);
        $message = Message::find($id3);
        $action = 'edit';
        return view('message', compact('topic', 'subtopic', 'message', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id1, $id2, $id3)
    {
        $message = Message::find($id3);
        request()->validate([
            'body' => 'required'
        ]);
        $message->body = request('body');
        $message->save();
        return redirect("/topic/$id1/subtopic/$id2/message");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id1, $id2, $id3)
    {
        $message = Message::find($id3);
        $message->delete();
        return redirect("/topic/$id1/subtopic/$id2/message");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Subtopic;
use App\Models\Topic;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id1, $id2)
    {
        $topic = Topic::find($id1);
        $subtopic = Subtopic::find($id2);
        $action = 'create';
        return view('message', compact('topic','subtopic', 'action'));
    }

    public function store($id1, $id2, Request $request)
    {
        request()->validate([
            'body' => 'required',
        ]);
        /** @var User $user */
        $user = Auth::user();

        $subtopic = Subtopic::find($id2);
        $message = new Message();

        $message->body = request('body');
        $message->user_id = $user->id;
        $message->subtopic_id = $subtopic->id;
        $message->save();
        return redirect(route('subtopics.show', [$subtopic->id]));
    }

    public function show(Subtopic $subtopic)
    {
        $subtopic->views += 1;
        $subtopic->save();
        return view('message', compact('subtopic'));
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
        return redirect("subtopics/$id2");
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
        return redirect("/subtopics/$id2");
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Subtopic;
use App\Models\Topic;
use App\Models\Message;

class SubtopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subtopic');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if(!Auth::check())
            return redirect('/home');
        $topic = Topic::find($id);
        $action = 'create';
        return view('subtopic', compact('topic', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $topic = Topic::find($id);
        $subtopic = new Subtopic();
        request()->validate([
            'title' => 'required'
        ]);
        $subtopic->title = request('title');
        $subtopic->user_id = Auth::User()->id;
        $topic->subtopics()->save($subtopic);
        return redirect("/topics/$id");

    }

    public function show(Subtopic $subtopic)
    {
        return view('message', compact('subtopic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id1, $id2)
    {
        $subtopic = Subtopic::find($id2);
        Message::where('subtopic_id', $id2)->delete();
        try {
            $subtopic->delete();
        } catch (\Exception $e){
            dd("eroare: nu se poate șterge");
        }
        return redirect("/topics/$id1");
        
    }   
}

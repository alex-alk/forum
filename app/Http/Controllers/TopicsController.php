<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Subtopic;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check() && Auth::user()->name == 'admin')
            return view('topic');
        return redirect('/home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topic = new Topic();
        request()->validate([
            'title' => 'required'
        ]);
        $topic->title = request('title');
        $topic->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subtopics = Subtopic::where('topic_id', '=', $id)->orderBy('created_at', 'desc')->get();
        $topic = Topic::find($id);
        $navtopic = Topic::find($id);
        return  view('subtopic', compact('subtopics', 'topic', 'navtopic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check() && Auth::user()->name == 'admin'){
            $topic = Topic::find($id);
            return view('topic', compact('topic'));
        } else {
            return redirect('/home');
        }
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
        $topic = Topic::find($id);
        request()->validate([
            'title' => 'required'
        ]);
        $topic->title = request('title');
        $topic->save();
        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = Topic::find($id);
        try {
            $topic->delete();
        } catch (\Exception $e) {
            dd("eroare: nu se poate șterge");
        }
        return redirect('/');
    }
}

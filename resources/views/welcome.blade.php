@extends('layouts.app')

@section('title', 'Forum')

@section('content')
    <aside>
        <p>Recent subjects</p>
    @foreach($recentSubtopics as $recentSubtopic)
        <p><a href="{{ route('subtopics.show', [$recentSubtopic->id]) }}">{{ $recentSubtopic->title }}</a></p>
    @endforeach
    </aside>
    <table id="main">
        @foreach ($topics as $topic)
        <tr>
            <td class="topic">
                <i class="fa fa-comments"></i>
                <a href="{{ route('topics.show', [$topic->id]) }}">{{ $topic->title }}</a>
                @if (Illuminate\Support\Facades\Auth::check() &&  
                    Illuminate\Support\Facades\Auth::user()->name == 'admin')
                    <form action="/topic/{{ $topic->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    <form action="/topic/{{ $topic->id }}/edit" method="GET">
                        <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                    </form>
                @endif
            </td>
            <td class="info"><span>Subjects</span><span>{{ count($topic->subtopics) }}</span></td>
            <td class="info"><span>Messages</span><span>{{ count($topic->messages) }}</span></td>
        </tr>
        @endforeach
    </table>
    @if (Illuminate\Support\Facades\Auth::check() &&  
        Illuminate\Support\Facades\Auth::user()->name == 'admin')
        <div class="create-link"><a href="/topic/create" class="btn btn-primary">Create topic</a></div>
    @endif
@endsection
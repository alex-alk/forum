@extends('layouts.app')

@section('title', 'Forum pentru case')

@section('content')
    <aside>
        <p>Subiecte recente</p>
        @foreach($recentSubtopics as $recentSubtopic)
        <p><a href="/topic/{{ $recentSubtopic->topic_id }}/subtopic/{{ $recentSubtopic->id }}/message">{{ $recentSubtopic->title }}</a></p>
    @endforeach
    </aside>
    <table id="main">
        @foreach ($topics as $topic)
        <tr>
            <td class="topic">
                <i class="fa fa-comments"></i>
                <a href="/topic/{{ $topic->id }}">{{ $topic->title }}</a>
                @if (Illuminate\Support\Facades\Auth::check() &&  
                    Illuminate\Support\Facades\Auth::user()->name == 'admin')
                    <form action="/topic/{{ $topic->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Șterge</button>
                    </form>
                    <form action="/topic/{{ $topic->id }}/edit" method="GET">
                        <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                    </form>
                @endif
            </td>
            <td class="info"><span>Subiecte</span><span>{{ count($topic->subtopics) }}</span></td>
            <td class="info"><span>Mesaje</span><span>{{ count($topic->messages) }}</span></td>
        </tr>
        @endforeach
    </table>
    @if (Illuminate\Support\Facades\Auth::check() &&  
        Illuminate\Support\Facades\Auth::user()->name == 'admin')
        <div class="create-link"><a href="/topic/create" class="btn btn-primary">Creează topic</a></div>
    @endif
@endsection
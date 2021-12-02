@extends('layouts.app')

@section('title')
	{{ $topic->title  }}
@endsection

@if(!isset($action))
	@section('content')
		<table id="main">
			@foreach($subtopics as $subtopic)
			<tr>
				<td class="topic">
					<a href="/topic/{{ $topic->id }}/subtopic/{{ $subtopic->id }}/message">{{ $subtopic->title }}</a>
					<span class="under">{{ $subtopic->user->name }}</span>, 
					<span>{{ $subtopic->created_at }}</span>
					@if (Illuminate\Support\Facades\Auth::check() &&  
	                    Illuminate\Support\Facades\Auth::user()->name == 'admin')
	                    <form action="/topic/{{ $topic->id }}/subtopic/{{ $subtopic->id }}" method="POST">
	                        @csrf
	                        @method('DELETE')
	                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
	                    </form>
	                @endif
				</td>
	            <td class="info"><span>Messages</span><span>{{ count($subtopic->messages) }}</span></td>
	            <td class="info"><span>Views</span><span>{{ $subtopic->views }}</span></td>
				</tr>
			@endforeach
		</table>
		<a href="/topic/{{ $topic->id }}/subtopic/create" class="create-link btn btn-primary btn-sm">Create subject</a>
		@isset($message)
		 {{ $message }}
		@endisset
	@endsection
@else
	@section('content')
	<form action="/topic/{{ $topic->id }}/subtopic" method="POST" class="form">
		@csrf
		<div class="form-group">
			<label for="title">Subject title: </label>
			<input type="text" name="title" class="form-control" id="title">
		</div>
		<input type="hidden" name="topic" value="{{ $topic->id }}">
		<button type="submit" class="btn btn-primary">Create</button>
	</form>
	@endsection
@endif

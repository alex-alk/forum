@extends('layouts.app')
@section('title')
	{{ $subtopic->title }}
@endsection

@if(!isset($action))
	@section('content')
		<table id="messages">
		@foreach($subtopic->messages as $message)
			<tr>
				<td class="profile">
					<div class="avatar">{{ strtoupper(substr($message->user->name, 0, 1)) }}</div>
					<div>
						<div>{{ $message->user->name}}</div>
						<div>Înscris: {{ $message->user->created_at }}</div>
					</div>
				</td>
				<td class="body">
					{!! $message->body !!}
					@if(Illuminate\Support\Facades\Auth::check() &&  
	                    Illuminate\Support\Facades\Auth::user()->name == 'admin') 
						<form action="/topic/{{ $topic->id }}/subtopic/{{ $subtopic->id }}/message/{{ $message->id }}" method="POST">
				            @csrf
				            @method('DELETE')
				            <button type="submit" class="btn btn-danger btn-sm">Șterge</button>
				        </form>
				    @elseif (Illuminate\Support\Facades\Auth::check() &&  
	                    Illuminate\Support\Facades\Auth::user()->name == $message->user->name)
	                    <form action="/topic/{{ $topic->id }}/subtopic/{{ $subtopic->id }}/message/{{ $message->id }}" method="POST">
				            @csrf
				            @method('DELETE')
				            <button type="submit" class="btn btn-danger btn-sm">Șterge</button>
				        </form>
				        <form action="/topic/{{ $topic->id }}/subtopic/{{ $subtopic->id }}/message/{{ $message->id }}/edit" method="GET">
				            <button type="submit" class="btn btn-warning btn-sm">Editare</button>
				        </form>
				    @else
				    @endif

			    </td>
			</tr>
		@endforeach
		<table>
		<a href="/topic/{{ $topic->id }}/subtopic/{{ $subtopic->id }}/message/create" class="create-link-messages btn btn-primary btn-sm">Scrie răspuns</a>
	@endsection
@elseif( $action == 'create')
	@section('content')
	    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
	    <script>tinymce.init({ selector:'textarea' });</script>
		<form action="/topic/{{ $topic->id }}/subtopic/{{ $subtopic->id }}/message" method="POST" class="form">
		@csrf
		<div class="form-group">
			<label for="body">Mesaj: </label>
			<textarea name="body" class="form-control" id="body"></textarea>
		</div>
		<input type="hidden" name="subtopic" value="{{ $subtopic->id }}">
		<button type="submit" class="btn btn-primary">Creează</button>
	</form>
	@endsection
@else
	@section('content')
		<form action="/topic/{{ $topic->id }}/subtopic/{{ $subtopic->id }}/message/{{ $message->id }}" method="POST" class="form">
			@csrf
			@method('PATCH')
			<div class="form-group">
				<label for="body">Mesaj: </label>
				<textarea name="body" class="form-control" id="body">{{ $message->body }}</textarea>
			</div>
			<button type="submit" class="btn btn-primary">Edit</button>
		</form>
	@endsection
@endif
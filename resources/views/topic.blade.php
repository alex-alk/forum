@extends('layouts.app')

@section('title', 'Creează topic')

@section('content')

	@if(isset($topic))
		<form action="/topics/{{ $topic->id }}" method="POST" class="form">
			@csrf
			@method('PATCH')
			<div class="form-group">
				<label for="title">Topic title: </label>
				<input type="text" name="title" class="form-control" id="title" value="{{ $topic->title }}">
			</div>
			<button type="submit" class="btn btn-primary">Edit</button>
		</form>
	@else
		<form action="/topics" method="POST" class="form">
			@csrf
			<div class="form-group">
				<label for="title">Topic title: </label>
				<input type="text" name="title" class="form-control" id="title">
			</div>
			<button type="submit" class="btn btn-primary">Create</button>
		</form>
	@endif
@endsection
// layouts.master
<html>
<head>
    <title>My Site | @yield('title', 'Home Page')</title> if no content adds default
</head>
<body>
<div class="container">
    @yield('content') // replaces all content
</div>
@section('footerScripts')
    <script src="app.js"></script>
@show
</body>
</html>


@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
    Welcome to your application dashboard!
@endsection
@section('footerScripts')
    @parent //adds from master
    <script src="dashboard.js"></script>
@endsection
//-------------------------------

View partials:
<!-- resources/views/home.blade.php -->
<div class="content" data-page-name="{{ $pageName }}">
    <p>Here's why you should sign up for our app: <strong>It's Great.</strong></p>
    @include('sign-up-button', ['text' => 'See just how great it is'])
</div>
<!-- resources/views/sign-up-button.blade.php -->
<a class="button button--callout" data-page-name="{{ $pageName }}">
    <i class="exclamation-icon"></i> {{ $text }}
</a>

//--------------------------------
Injecting a service class into bloade:
@inject('analytics', 'App\Services\Analytics')
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
Injecting a service class into blade:
@inject('analytics', 'App\Services\Analytics')

//---------------------------------------
Binding a custom Blade directive in a service provider
public function boot()
{
    Blade::directive('ifGuest', function () {
        return "<?php if (auth()->guest()): ?>";
    });
}

Creating a Blade directive with parameters
// Binding
Blade::directive('newlinesToBr', function ($expression) {
    return "<?php echo nl2br({$expression}); ?>";
});
// In use
<p>@newlinesToBr($message->body)</p>

//-------------------------------------------
Testing blade templates
public function test_list_page_shows_all_events()
{
    $event1 = factory(Event::class)->create();
    $response = $this->get("events/{ $event->id }");
    $response->assertViewHas('event', function ($event) use ($event1) {
        return $event->id === $event1->id;
    });
}
//-------------------------------
if mass assignment is enabled, you can use Contact::create($request->only('name', 'email'));
//---------------------------
Delete multiple items:
Contact::where('updated_at', '<', now()->subYear())->delete();
//-----------------------------------
Eloquent scopes:
public function scopePopular($query)
{
    return $query->where('votes', '>', 100);
}
using it: $users = User::popular()->orderBy('created_at')->get();

Casting columns:
class Contact
{
    protected $casts = [
        'vip' => 'boolean',
        'children_names' => 'array',
        'birthday' => 'date',
    ];
}
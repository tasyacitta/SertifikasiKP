@dd($post)

@extends('layouts.main')

@section('container')
<h1>Logout Agenda</h1>

@foreach ($post as $posts)
<h2>{{ $posts["title"] }}</h2>
<h3>{{ $posts["author"] }}</h3>
<p>{{ $posts["body"] }}</p>
@endforeach
@endsection
@extends('layouts.app')
@section('content')
<h1>Login</h1>
<ul>
  @foreach($posts as $post)
  <li>{{$post->title}}</li>
@endforeach  
</ul>

@endsection

@extends('layouts.app')

@section('content')
  <h1>Wszystkie Wpisy</h1>
  @if(count($posts) > 0)
    @foreach($posts as $post)
      <div class=" alert alert-secondary">
        <h3> <a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
        <small>Dodane : {{$post->created_at}} przez : {{$post->user->name}}</small>
      </div>
    @endforeach
    {{$posts->links()}}
    @else
    <hr>
      <p>Nie znaleziono wpisów</p>
  @endif
@endsection

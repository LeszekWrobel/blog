@extends('layouts.app')

@section('content')
  <h1>Posts</h1>
  @if(count($posts) > 0)
    @foreach($posts as $post)
      <div class=" alert alert-secondary">
        <h3> <a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
        <small>Dodano : {{$post->created_at}}</small>
      </div>
    @endforeach
    {{$posts->links()}}
    @else
      <p>Nie znaleziono postów</p>
  @endif
@endsection

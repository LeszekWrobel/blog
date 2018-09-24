@extends('layouts.app')

@section('content')
  <h1>Wszystkie Wpisy</h1>
  @if(count($posts) > 0)
    @foreach($posts as $post)
      <div class=" alert alert-secondary">
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <img style ="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
          </div>
          <div class="col-md-8 col-sm-8">
            <h3> <a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>Dodane : {{$post->created_at}} przez : {{$post->user->name}}</small>
          </div>
        </div>
      </div>
    @endforeach
    {{$posts->links()}}
    @else
    <hr>
      <p>Nie znaleziono wpisów</p>
  @endif
@endsection

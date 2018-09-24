@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-outline-secondary mt-2" >Powrót</a>
  <!-- <h1>{{$post->title}}</h1> użyć bez edytora tekstu-->
  <h1>{!!$post->title!!}</h1>
    <!-- <h3>{{$post->body}}</h3> -->
    <div class="alert alert-secondary">
      <img style ="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
      <h3>{!!$post->body!!}</h3>
    </div>
  <small>Dodane : {{$post->created_at}} przez : {{$post->user->name}}</small><br>
  @if($post->updated_at != '')
  <small>Ostatnia Edycja : {{$post->updated_at}}</small>
  @endif
  <hr>
  @if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
      <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-secondary">Edytuj</a>
      {!!Form::open(['action' => ['PostsController@destroy', $post->id],'method' => 'POST', 'class' => 'd-inline'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Usuń', ['class' => 'btn btn-outline-danger'])}}
      {!!Form::close()!!}
    @endif
  @endif
@endsection

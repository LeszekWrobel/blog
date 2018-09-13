@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-outline-secondary mt-2" >Powrót</a>
  <!-- <h1>{{$post->title}}</h1> użyć bez edytora tekstu-->
  <h1>{!!$post->title!!}</h1>
    <!-- <h3>{{$post->body}}</h3> -->
    <div class="alert alert-secondary">
      <h3>{!!$post->body!!}</h3>
    </div>
  <small>Dodano : {{$post->created_at}}</small><br>
  <small>Ostatnia Edycja : {{$post->updated_at}}</small>
  <hr>
  <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-secondary">Edytuj</a>
  {!!Form::open(['action' => ['PostsController@destroy', $post->id],'method' => 'POST', 'class' => 'd-inline'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Usuń', ['class' => 'btn btn-outline-danger'])}}
  {!!Form::close()!!}
@endsection

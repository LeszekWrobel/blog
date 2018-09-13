@extends('layouts.app')

@section('content')
  <h1>Edycja Posta</h1>
  {!! Form::open(['action' => ['PostsController@update',$post->id], 'method' => 'POST']) !!}
    <div class="foem-group">
      {{Form::label('title','Tytuł')}}
      {{Form::text('title',$post->title,['class' => 'form-control', 'placeholder' => 'Tytuł'])}}
    </div>
    <div class="foem-group">
      {{Form::label('body','Treść')}}
      {{Form::textarea('body',$post->body,['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Treść'])}}
    </div>
      {{Form::hidden('_method','PUT')}}
      {{Form::submit('Zapisz zmiany', ['class'=>'btn btn-outline-primary mt-2'])}}
{!! Form::close() !!}
@endsection

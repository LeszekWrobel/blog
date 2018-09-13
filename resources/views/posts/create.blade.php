@extends('layouts.app')

@section('content')
  <h1>Napisz Posta</h1>
  {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
    <div class="foem-group">
      {{Form::label('title','Tytuł')}}
      {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Tytuł'])}}
    </div>
    <div class="foem-group">
      {{Form::label('body','Treść')}}
      {{Form::textarea('body','',['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Treść'])}}
    </div>
      {{Form::submit('Wyślij', ['class'=>'btn btn-outline-primary mt-2'])}}
{!! Form::close() !!}
@endsection

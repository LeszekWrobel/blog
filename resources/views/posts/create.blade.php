@extends('layouts.app')

@section('content')
  <h1>Napisz Wiadomość</h1>
  {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype'=> 'multipart/data']) !!}
    <div class="foem-group">
      {{Form::label('title','Tytuł')}}
      {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Tytuł'])}}
    </div>
    <div class="foem-group">
      {{Form::label('body','Treść')}}
      {{Form::textarea('body','',['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Treść'])}}
    </div>
    <div class="form-group mt-2">
      {{Form::file('cover_image')}}
    </div>
      {{Form::submit('Dodaj Wpis', ['class'=>'btn btn-outline-primary mt-2'])}}
{!! Form::close() !!}
@endsection

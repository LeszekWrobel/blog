@extends('layouts.app')

@section('content')
  <h1>{{$title}}</h1>
  <div class="jumbotron text-center">
  <h1 class="display-4">Hello, Blog!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p><a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Login</a> <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">Register</a></p>
</div>
@endsection

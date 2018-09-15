@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Zalogowany</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-outline-primary mb-2" href="/posts/create">Dodaj Post</a>
                    <h3>Twoje Wpisy na Blogu.</h3>
                    @if(count($posts) > 0)
                      <table class="table table-striped">
                        <tr>
                          <th>Tytuł</th>
                          <th></th>
                          <th></th>
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                          <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>

                          <td>
                            <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-secondary">Edytuj</a>
                          </td>
                          <td>
                            {!!Form::open(['action' => ['PostsController@destroy', $post->id],'method' => 'POST', 'class' => 'd-inline'])!!}
                              {{Form::hidden('_method', 'DELETE')}}
                              {{Form::submit('Usuń', ['class' => 'btn btn-outline-danger'])}}
                            {!!Form::close()!!}
                          </td>
                        </tr>
                        @endforeach
                      </table>
                      @else
                      <hr>
                        <p>Nie masz żadnych wpisów na Blogu</p>
                      @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

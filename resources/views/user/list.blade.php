@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-info">
                  <div class="panel-heading">Resultados</div>
                  <ul class="list-group">
                    @foreach ($users as $key => $value)
                        <li class="list-group-item"><a href="{{route('user.show', $value->id)}}">{{$value->name}}</a></li>
                    @endforeach
                  </ul>
              </div>
          </div>
      </div>
  </div>
@endsection

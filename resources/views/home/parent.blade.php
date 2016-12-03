@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <span>Bienvenido! ¿Qué tal si envias un mensaje?</span>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">Envía un mensaje</div>

                <div class="panel-body">
                    <form class="form-group" action="/home" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_origin" value="{{Auth::user()->id}}">
                        @if ($errors->has('user_recipient'))
                            <span class="help-block">
                                <strong>{{ $errors->first('user_recipient') }}</strong>
                            </span>
                        @endif
                        <div class="form-group{{ $errors->has('user_recipient') ? ' has-error' : '' }}">
                            <input type="text" name="user_recipient" class="typeahead form-control" placeholder="Destinatario" autocomplete="off">
                        </div>
                        @if ($errors->has('message'))
                            <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <textarea name="message" class="form-control" rows="5" placeholder="Dime! ¿Qué mensaje quieres enviar?" style="resize: none;"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
            @if (Auth::user()->category->description == 'teacher')
              <div class="panel panel-default">
                  <div class="panel-heading">Buscar usuario</div>
                  <div class="panel-body">
                      <form class="form-group" action="{{route('user.search')}}" method="get">
                          <div class="input-group">
                              <input type="text" class="form-control" name="user" placeholder="Ingresar nombre">
                              <span class="input-group-btn">
                                <button type="submit"  class="btn btn-default">
                                  <span class="glyphicon glyphicon-search"></span>
                                </button>
                              </span>
                          </div>
                      </form>
                  </div>
              </div>
            @endif

            @foreach ($messages as $value)
              <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-11 col-sm-11 col-xs-10 col-offset-1" >Mensaje de {{$value->origin->name}}</div>
                        <div class="col-md-1 col-sm-1 col-xs-1 col-offset-12">
                          <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-menu-down">
                            </span>
                          </button>
                          <div class="dropdown-menu">
                            <form action={{route('message.destroy', $value->id)}} method="post">
                              {{method_field('DELETE')}}
                              {{csrf_field()}}
                              <button class="btn btn-block" type="submit">Borrar</button>
                            </form>
                            <form action={{route('message.edit', $value->id)}} method="get">
                              <button class="btn btn-block" type="submit">Editar</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel-body">
                      <span>{{$value->message}}</span>
                  </div>
              </div>
            @endforeach

        </div>
    </div>
</div>
<script type="text/javascript">
  var path = "{{  route('autocomplete') }}";
  $('input.typeahead').typeahead({
      minLength: 0,
      source:  function (query, process) {
      return $.get(path, { query: query }, function (data) {
              return process(data);
          });
      }
  });
</script>
@endsection

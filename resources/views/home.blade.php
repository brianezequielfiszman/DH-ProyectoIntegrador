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
                            <input type="text" name="user_recipient" class="form-control" placeholder="Destinatario">
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
            @if (Auth::user()->category->id != 3)
              <div class="panel panel-default">
                  <div class="panel-heading">Buscar usuario</div>
                  <div class="panel-body">
                      <form class="form-group" action="/user" method="get">
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
                  <div class="panel-heading">Mensaje de {{$value->origin->name}}</div>

                  <div class="panel-body">
                      <span>{{$value->message}}</span>
                  </div>
              </div>
            @endforeach

        </div>
    </div>
</div>

@endsection

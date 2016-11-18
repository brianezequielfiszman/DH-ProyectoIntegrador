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
                       {{ method_field('PUT') }}
                       <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                       <div class="form-group">
                          <input type="text" name="user_recipient" class="form-control" placeholder="Destinatario">
                       </div>
                       <div class="form-group">
                          <textarea name="message" class="form-control" rows="5" placeholder="Dime! ¿Qué mensaje quieres enviar?" style="resize: none;"></textarea>
                       </div>
                       <div class="form-group">
                          <input type="submit" class="btn btn-primary" value="Enviar">
                       </div>
                    </form>
                </div>
            </div>
            @foreach ($messages as $key => $value)
              <div class="panel panel-default">
                  <div class="panel-heading">Mensaje de {{App\User::find($value->user_id)->name}}</div>

                  <div class="panel-body">
                      <span>{{$value->text}}</span>
                  </div>
              </div>
            @endforeach
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
            </div>
          </div>
        </div>
@endsection

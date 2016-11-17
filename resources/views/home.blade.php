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
                       <textarea name="message" class="form-control" rows="5" placeholder="Dime! ¿Qué mensaje quieres enviar?"></textarea>

                       <input type="submit" class="btn btn-primary" value="Enviar">

                    </form>
                </div>
            </div>
            @foreach ($messages as $key => $value)
              <div class="panel panel-default">
                  <div class="panel-heading">Titulo</div>

                  <div class="panel-body">
                      <span>{{$value->text}}</span>
                  </div>
              </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

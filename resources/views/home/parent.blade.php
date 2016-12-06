@extends('home.index')
@section('home')
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
                <div class="panel-heading">Envía un mensaje{{(isset($user) ? ' a '.$user->name : '')}}</div>
                @include('home.layouts.message-box')
            </div>
            @if (Auth::user()->category->description == 'teacher')
              @include('layouts.user-search-form')
            @endif

            @foreach ($messages as $message)
              <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="container-fluid">
                      <div class="row centered-row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          Mensaje de {{$message->origin->name}}
                        </div>
                        @if ($message->origin->id === Auth::user()->id and !isset($message->reply_id))
                          @include('home.layouts.dropdown-menu')
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="panel-body">
                      <span>{{$message->message}}</span>
                  </div>
                  <footer class="panel-footer">
                    @if (isset($message->reply_id))
                      <p>{{$message->reply->content}}</p>
                    @else
                      <form class="form-horizontal" action="{{route('reply.store')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="message_id" value="{{$message->id}}">
                        <input type="hidden" name="origin_id" value="{{Auth::user()->id}}">
                        <input type="text" class="form-control" name="content" placeholder="Escriba una respuesta">
                      </form>
                    @endif
                  </footer>
              </div>
            @endforeach

        </div>
    </div>
</div>
@endsection

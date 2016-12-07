@extends('home.index')
@section('home')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">Hola {{Auth::user()->fullName()}}</div>
                <div class="panel-body">
                    <span>¿Qué tal si envias un mensaje?</span>
                </div>
            </div>

            <div class="panel panel-primary">
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
                      <span class="text-primary">{{$message->reply->content}}</span>
                    @else
                      @include('home.layouts.reply-box')
                    @endif
                  </footer>
              </div>
            @endforeach

        </div>
    </div>
</div>
@endsection

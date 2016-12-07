@extends('home.index')
@section('home')
<div class="container-fluid">
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
                        <div class="col-md-11 col-sm-11 col-xs-11">
                          Mensaje de {{$message->origin->name}}
                        </div>
                        <div class="pull-right">
                           <span class="text-info text-right">
                              {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $message->created_at)->format('Y-m-d')}}
                           </span>
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
            <div class="text-center">
                {{ $messages }}
            </div>
        </div>
    </div>
</div>
@endsection

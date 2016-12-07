@extends('layouts.app')
@section('content')
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">Resultados</div>
                  <ul class="list-group">
                      @foreach ($users as $key => $value)
                        <div class="container-fluid">
                          <div class="row clearfix">
                            <li class="list-group-item centered-row clearfix">
                                <div class="col-xs-8 col-sm-10 col-md-10 col-lg-10">
                                  @if (Auth::user()->category->description === 'admin')
                                  <span>{{$value->name}} {{$value->lastName}}</span>
                                  @else
                                  <a href="{{route('home').'/'. $value->id}}">
                                    {{$value->name}} {{$value->lastName}}
                                  </a>
                                  @endif
                                </div>
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                  @include('user.layouts.btn-group')
                                </div>
                              </li>
                          </div>
                        </div>
                          @endforeach
                      </ul>
                </div>
            </div>
@endsection

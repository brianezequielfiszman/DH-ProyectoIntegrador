@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">Resultados</div>
                <ul class="list-group">
                    @foreach ($users as $key => $value)
                    <li class="list-group-item clearfix">
                        <div class="col-xs-8 col-sm-10">
                            @if (Auth::user()->category->description === 'admin')
                            <span>{{$value->name}} {{$value->lastName}}</span> @else
                            <a href="{{route('home').'/'. $value->id}}">{{$value->name}} {{$value->lastName}}</a> @endif
                        </div>

                        @if (Auth::user()->category->description === 'admin' and ($action === 'delete' or $action === 'edit'))
                          @if ($action === 'delete')
                            <form action={{route( 'user.destroy', $value->id)}} method="post">
                              {{method_field('DELETE')}}
                              {{csrf_field()}}
                          @elseif ($action === 'edit')
                            <form action={{route( 'user.edit', $value->id)}} method="get">
                          @endif
                              <div class="col-xs-1 col-sm-1">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                  <a class="btn btn-default" href="{{route('user.show', $value->id)}}">
                                    <span class="glyphicon {{ "glyphicon-user" }} admin-glyph"></span>
                                    </a>
                                    </span>
                                    <span class="input-group-btn">
                                  <button type="submit" class="btn btn-default">
                                  <span class="glyphicon {{($action === 'edit') ? "glyphicon-edit" :
                                    "glyphicon-remove"}} admin-glyph"></span>
                                    </button>
                                    </span>
                                </div>
                              </div>
                            </form>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

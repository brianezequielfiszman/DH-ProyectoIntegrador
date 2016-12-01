@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Editar Usuario</div>
                  <div class="panel-body">
                      <form class="form-horizontal" role="form" method="POST" action="{{ route('user.update', $user->id) }}">
                        {{method_field('PATCH')}}
                        {{csrf_field()}}
                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="name" class="col-md-4 control-label">Nombre</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus>

                                  @if ($errors->has('name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                            <label for="lastName" class="col-md-4 control-label">Apellido</label>

                          <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control" name="lastName"   value="{{$user->lastName}}" required autofocus>

                                @if ($errors->has('lastName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>

                          <div class="form-group">
                              <label for="category" class="col-md-4 control-label">Category</label>

                              <div class="col-md-6">
                                  <select class="form-control" name="category">
                                    <option value="1" {{($user->category->description == 'admin') ? "selected=selected" : ""}}>Admin</option>
                                    <option value="2" {{($user->category->description == 'parent') ? "selected=selected" : ""}}>Padre</option>
                                    <option value="3" {{($user->category->description == 'teacher') ? "selected=selected" : ""}}>Docente</option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary">
                                      Register
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

@extends('home.index')
@section('home')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido docente!</div>
                <div class="panel-body">
                    <span>¿Qué tal si buscas un padre para ver su cuaderno?</span>
                </div>
            </div>

              <div class="panel panel-default">
                  <div class="panel-heading">Buscar usuario</div>
                  <div class="panel-body">
                      <form class="form-group" action="{{route('user.search')}}" method="get">
                          <div class="input-group">
                              <input type="text" class="form-control typeahead" name="user" placeholder="Ingresar nombre" autocomplete="off">
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

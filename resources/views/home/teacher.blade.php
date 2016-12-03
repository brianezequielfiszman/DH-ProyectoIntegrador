@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
<script type="text/javascript">
  var path = "{{  route('autocomplete') }}";
  $('input.typeahead').typeahead({
      minLength: 0,
      source:  function (query, process) {
      return $.get(path, { query: query }, function (data) {
              return process(data);
          });
      }
  });
</script>
@endsection

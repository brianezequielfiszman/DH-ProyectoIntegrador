  <div class="panel panel-default">
      <div class="panel-heading">Buscar usuario</div>
      <div class="panel-body">
          <form class="form-group" action="{{route('user.search')}}" method="get">
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

<div class="col-xs-6 col-sm-3 admin-container">
    <form class="form-group" action="{{route('user.create')}}" method="get">
        <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default btn-lg admin-btn-lg">
                <span class="glyphicon glyphicon-plus"></span>
              </button>
            </span>
        </div>
        <label for="create-user" class="control-label">Crear Usuario</label>
    </form>
</div>
<div class="col-xs-6 col-sm-3 admin-container">
    <div class="input-group">
        <span class="input-group-btn">
          <button type="submit"  class="btn btn-default btn-lg admin-btn-lg" data-toggle="modal" data-target="#myModalNorm" id='edit'>
            <span class="glyphicon glyphicon-edit admin-glyph"></span>
          </button>
        </span>
    </div>
    <label for="list-users" class="control-label">Editar Usuario</label>
</div>
<div class="clearfix visible-xs-block"></div>
<div class="col-xs-6 col-sm-3 admin-container">
    <div class="input-group">
        <span class="input-group-btn">
          <button type="submit"  class="btn btn-default btn-lg admin-btn-lg" data-toggle="modal" data-target="#myModalNorm" id='delete'>
            <span class="glyphicon glyphicon-remove admin-glyph"></span>
          </button>
        </span>
    </div>
    <label for="list-users" class="control-label">Borrar Usuario</label>
</div>
<div class="col-xs-6 col-sm-3 admin-container">
    <form class="form-group" action="{{route('user.index')}}" method="get">
        <div class="input-group">
            <span class="input-group-btn">
              <button type="submit"  class="btn btn-default btn-lg admin-btn-lg">
                <span class="glyphicon glyphicon-user admin-glyph"></span>
              </button>
            </span>
        </div>
        <label for="list-users" class="control-label">Listar Usuarios</label>
    </form>
</div>

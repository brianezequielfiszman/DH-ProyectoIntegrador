<div class="col-xs-6 col-sm-3 admin-container">
    <form class="form-group" action="{{route('faqs.create')}}" method="get">
        <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default btn-lg admin-btn-lg">
                <span class="glyphicon glyphicon-plus"></span>
              </button>
            </span>
        </div>
        <label for="create-user" class="control-label">Crear FAQ</label>
    </form>
</div>
<div class="col-xs-6 col-sm-3 admin-container">
  <form class="form-group" action="{{route('faqs.list.edit')}}" method="get">
      <div class="input-group">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-default btn-lg admin-btn-lg">
              <span class="glyphicon glyphicon-edit admin-glyph"></span>
            </button>
          </span>
      </div>
      <label for="list-users" class="control-label">Editar FAQ</label>
  </form>
</div>
<div class="clearfix visible-xs-block"></div>
<div class="col-xs-6 col-sm-3 admin-container">
  <form class="form-group" action="{{route('faqs.list.delete')}}" method="get">
      <div class="input-group">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-default btn-lg admin-btn-lg">
              <span class="glyphicon glyphicon-remove admin-glyph"></span>
            </button>
          </span>
      </div>
      <label for="list-users" class="control-label">Borrar FAQ</label>
  </form>
</div>
<div class="col-xs-6 col-sm-3 admin-container">
    <form class="form-group" action="{{route('admin.faqs.list')}}" method="get">
        <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default btn-lg admin-btn-lg">
                <span class="glyphicon glyphicon-list admin-glyph"></span>
              </button>
            </span>
        </div>
        <label for="list-users" class="control-label">Listar FAQ</label>
    </form>
</div>

<div class="col-md-1 col-sm-1 col-xs-1 col-md-offset-2">
  <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown">
    <span class="glyphicon glyphicon-menu-down"></span>
  </button>
  <ul class="dropdown-menu collapse">
    <li>
      <form action={{route('messages.destroy', $message->id)}} method="post">
        {{method_field('DELETE')}}
        {{csrf_field()}}
        <button class="btn btn-block" type="submit">Borrar</button>
      </form>
    </li>
    <li>
      <form action={{route('messages.edit', $message->id)}} method="get">
        <button class="btn btn-block" type="submit">Editar</button>
      </form>
    </li>
  </ul>
</div>

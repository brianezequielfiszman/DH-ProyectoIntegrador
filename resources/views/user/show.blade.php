@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-info">
        <div class="panel-heading">Usuario</div>
          <ul class="list-group">
            @foreach ($user->getAttributes() as $key => $value)
              @if ($key == 'name' || $key == 'email' || $key == 'category_id' || $key == 'lastName')
                <li class="list-group-item">
                  @if ($key == 'category_id')
                    {{"Categoria: ".$user->category->description}}
                  @elseif ($key == 'lastName')
                    {{"Apellido: ".$user->lastName}}
                  @else
                    {{ucfirst($key).': '.$value}}
                  @endif
                </li>
              @endif
            @endforeach
          </ul>
        </div>
    </div>
  </div>
</div>
@endsection

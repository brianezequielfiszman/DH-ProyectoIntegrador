@extends('layouts.app')
@section('content')
<div class="container">
        <div class="col-sm-8">
            <div class="panel panel-info">
                <div class="panel-heading">Panel de administrador</div>
                <div class="panel-body">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="panel-heading">
                        <button class="btn btn-block btn-lg btn-default" data-toggle="collapse" data-target="#users">
                          Administracion de usuarios
                        </button>
                      </div>
                      <div id="users" class="panel-collapse collapse">
                        <li class="list-group-item container-fluid">
                          @include('admin.layouts.users')
                        </li>
                      </div>
                    </div>
                    <div class="row">
                      <div class="panel-heading">
                        <button class="btn btn-block btn-lg btn-default" data-toggle="collapse" data-target="#faqs">
                          Administracion de FAQS
                        </button>
                      </div>
                      <div id="faqs" class="panel-collapse collapse">
                        <li class="list-group-item container-fluid">
                          @include('admin.layouts.faqs')
                        </li>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
      </div>
</div>
@include('admin.search-form-modal')
@include('misc.autocomplete')
@endsection

@extends('layouts.app')
@section('content')
  <div class="flex-center position-ref full-height">
      <div class="content">
          <div class="title m-b-md">
              PORTAL
          </div>

          <div class="links">
              @if (Auth::check())
                  @if (Auth::user()->category_id == 1)
                      <a href="{{ url('/admin/register') }}">Register an user</a>
                      <a href="{{ route('listUsers') }}">List users</a>
                  @endif
              @endif
          </div>
      </div>
  </div>
@endsection

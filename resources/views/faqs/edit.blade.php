@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="row">
          <div class="col-sm-8">
            <div class="panel panel-primary">
                @include('faqs.layouts.edit-form')
            </div>
          </div>
      </div>
  </div>
@endsection

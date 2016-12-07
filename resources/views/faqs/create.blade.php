@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8">
            <div class="panel panel-primary">
                @include('faqs.layouts.create-form')
            </div>
          </div>
      </div>
  </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container-fluid col-xs-12 col-md-8">
      <section class="panel panel-info">
        <article class="panel-heading">
          <h3 class="panel-title">Listado de FAQS</h3>
        </article>
          <ul class="list-group container-fluid">
            @foreach ($faqs as $faq)
              <li class="list-group-item container-fluid col-lg-12">
                <div class="centered-row container-fluid">
                  <span class="col-xs-9 col-sm-11 col-md-10 col-lg-11">{{$faq->title}}</span>
                  <span class="col-xs-1">@include('admin.faqs.layouts.btn-group')</span>
                </div>
              </li>
            @endforeach
          </ul>
    </div>
@endsection

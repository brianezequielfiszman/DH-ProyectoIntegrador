@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-info">
                <div class="panel-heading">FAQS</div>
                <div class="panel-body">
                  <div class="container-fluid">
                    @foreach ($faqs as $faq)
                      <div class="row">
                        <div class="panel-heading">
                          <button class="btn btn-block btn-sm btn-default" data-toggle="collapse" data-target="#faq-{{ $faq->id }}">
                            {{$faq->title}}
                          </button>
                        </div>
                        <div id="faq-{{ $faq->id }}" class="panel-collapse collapse">
                          <li class="list-group-item container-fluid">
                            <span class="text-info">{{ $faq->content }}</span>
                          </li>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

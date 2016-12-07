<div class="panel-heading">Cree un FAQ</div>
<div class="panel-body">
    <form class="form-group" action="{{route('faqs.store')}}" method="post">
        {{ csrf_field() }}

        @if ($errors->has('faq'))
            <span class="help-block">
                <strong style="text-danger">{{ $errors->first('faq') }}</strong>
            </span>
        @endif
        @include('faqs.layouts.form')
    </form>
</div>

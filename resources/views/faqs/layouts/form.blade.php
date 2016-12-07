@if ($errors->has('title'))
    <span class="help-block">
        <strong class="text-danger">{{ $errors->first('title') }}</strong>
    </span>
@endif
<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <input type='text' name="title" class="form-control" placeholder="Titulo del FAQ" value="{{ (isset($faq)) ? $faq->title : '' }}">
</div>
@if ($errors->has('content'))
    <span class="help-block">
        <strong class="text-danger">{{ $errors->first('content') }}</strong>
    </span>
@endif
<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
    <textarea name="content" class="form-control" rows="5" placeholder="Dime! Que quieres poner en tu FAQ?" style="resize: none;">
      {{ (isset($faq)) ? $faq->content : '' }}
    </textarea>
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Enviar">
</div>

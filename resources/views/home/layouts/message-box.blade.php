<div class="panel-heading">Envía un mensaje{{(isset($user) ? ' a '.$user->name.' '.$user->lastName : '')}}</div>
<div class="panel-body">
    <form class="form-group" action="{{route('messages.store')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="user_origin" value="{{Auth::user()->id}}">
        @if (Auth::user()->category->description === 'teacher')
          <input type="hidden" name="user_recipient" value="{{$user->name}}">
        @else
          @if ($errors->has('user_recipient'))
              <span class="help-block">
                  <strong style="text-danger">{{ $errors->first('user_recipient') }}</strong>
              </span>
          @endif
          <div class="form-group{{ $errors->has('user_recipient') ? ' has-error' : '' }}">
              <input type="text" name="user_recipient" class="typeahead form-control" placeholder="Destinatario" autocomplete="off">
          </div>
        @endif

        @if ($errors->has('message'))
            <span class="help-block">
                <strong style="text-danger">{{ $errors->first('message') }}</strong>
            </span>
        @endif
        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
            <textarea name="message" class="form-control" rows="5" placeholder="Dime! ¿Qué mensaje quieres enviar?" style="resize: none;"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Enviar">
        </div>
    </form>
</div>

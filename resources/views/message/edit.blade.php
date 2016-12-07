@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">Envía un mensaje</div>

            <div class="panel-body">
                <form class="form-group" action="{{route('messages.update', $message->id)}}" method="post">
                    {{ csrf_field() }}
                    {{method_field('PATCH')}}
                    <input type="hidden" name="user_origin" value="{{Auth::user()->id}}">
                    @if ($errors->has('user_recipient'))
                    <span class="help-block">
                        <strong style="text-danger">{{ $errors->first('user_recipient') }}</strong>
                    </span>
                    @endif
                    <div class="form-group{{ $errors->has('user_recipient') ? ' has-error' : '' }}">
                        <input type="text" name="user_recipient" class="form-control" placeholder="Destinatario" value="{{Manija\User::find($message->user_recipient_id)->name}}" readonly>
                    </div>
                    @if ($errors->has('message'))
                    <span class="help-block">
                                <strong style="text-danger">{{ $errors->first('message') }}</strong>
                            </span> @endif
                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        <textarea name="message" class="form-control" rows="5" placeholder="Dime! ¿Qué mensaje quieres enviar?" style="resize: none;">{{$message->message}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

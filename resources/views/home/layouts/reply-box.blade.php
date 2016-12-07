@if (Auth::user()->id === $message->user_recipient_id)
  <form class="form-horizontal" action="{{route('reply.store')}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="message_id" value="{{$message->id}}">
    <input type="hidden" name="origin_id" value="{{Auth::user()->id}}">
    <input type="text" class="form-control" name="content" placeholder="Escriba una respuesta">
  </form>
@else
  <span class="text-info">Esperando respuesta de {{$message->recipient->fullName()}}...</span>  
@endif

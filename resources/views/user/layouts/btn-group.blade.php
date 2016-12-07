@if (Auth::user()->category->description === 'admin' and ($action === 'delete' or $action === 'edit'))
    @if ($action === 'delete')
        <form action={{route( 'user.destroy', $value->id)}} method="post">
            {{method_field('DELETE')}}
            {{csrf_field()}}
    @elseif ($action === 'edit')
        <form action={{route( 'user.edit', $value->id)}} method="get">
    @endif
                <div class="input-group">
                    <span class="input-group-btn">
                        <a class="btn btn-default" href="{{route('user.show', $value->id)}}">
                            <span class="glyphicon {{ " glyphicon-user" }} admin-glyph"></span>
                        </a>
                    </span>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon {{($action === 'edit') ? " glyphicon-edit" : " glyphicon-remove"}} admin-glyph"></span>
                        </button>
                    </span>
                </div>
        </form>
@else
    <div class="col-xs-1">
        <a class="btn btn-default" href="{{route('user.show', $value->id)}}">
            <span class="glyphicon {{ " glyphicon-user" }} admin-glyph"></span>
        </a>
    </div>
@endif

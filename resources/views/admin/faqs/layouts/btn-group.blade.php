@if (Auth::user()->category->description === 'admin' and ($action === 'delete' or $action === 'edit'))
    @if ($action === 'delete')
        <form action={{route( 'faqs.destroy', $faq->id)}} method="post">
            {{method_field('DELETE')}}
            {{csrf_field()}}
    @elseif ($action === 'edit')
        <form action={{route( 'faqs.edit', $faq->id)}} method="get">
    @endif
      @if ($action)
        <button type="submit" class="btn btn-default">
            <span class="glyphicon {{($action === 'edit') ? " glyphicon-edit" : " glyphicon-remove"}} admin-glyph">
            </span>
        </button>
      @endif
        </form>
@endif

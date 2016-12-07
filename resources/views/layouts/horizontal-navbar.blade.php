<ul class="nav nav-pills nav-stacked">
    <li role="presentation" class="active">
      <a href="{{route('home')}}">
        {{(Auth::user()->category->description === 'admin') ? 'Admin Panel' : 'Home' }}
      </a>
    </li>
    <li role="presentation">
      <a href="{{ route('user.show', Auth::user()->id) }}">
        Profile
      </a>
    </li>
    <li role="presentation">
      <a href="{{ route('faqs.index') }}">
        FAQS
      </a>
    </li>
</ul>

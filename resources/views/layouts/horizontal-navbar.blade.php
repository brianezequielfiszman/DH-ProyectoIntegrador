@if (Auth::check())
  <ul class="nav nav-pills nav-stacked">
      <li role="presentation" >
        <li class="{{(\Request::url() == route('home') or \Request::url() == route('admin.index')) ? 'active' : ''}}">
        <a href="{{route('home')}}">
          {{(Auth::user()->category->description === 'admin') ? 'Admin Panel' : 'Home' }}
        </a>
      </li>
      <li class="{{\Request::url() == route('user.show', Auth::user()->id) ? 'active' : ''}}">
        <a href="{{ route('user.show', Auth::user()->id) }}">
          Profile
        </a>
      </li>
      <li class="{{\Request::url() == route('faqs.index') ? 'active' : ''}}">
        <a href="{{ route('faqs.index') }}">
          FAQS
        </a>
      </li>
  </ul>
@endif

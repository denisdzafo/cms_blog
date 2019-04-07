<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container"><a href="{{route('index.page')}}" class="navbar-brand scrollTo">CMS Blog</a>
    <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><span class="fa fa-bars"></span></button>
    <div id="navbarcollapse" class="collapse navbar-collapse">
      @php $user=Auth::guard('web')->user(); @endphp
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="{{route('index.page')}}" class="nav-link link-scroll">Homepage</a></li>
        <li class="nav-item"><a href="{{route('blog.page')}}" class="nav-link link-scroll">Blog</a></li>
        <li class="nav-item"><a href="{{route('about.page')}}" class="nav-link link-scroll">About</a></li>
        <li class="nav-item"><a href="{{route('author.page')}}" class="nav-link link-scroll">Author</a></li>
        @if($user)
          <li class="nav-item"><a href="{{route('user.dashboard')}}" class="nav-link link-scroll">Profile</a></li>
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link link-scroll" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              Logout
            </a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        @else
          <li class="nav-item"><a href="{{route('login')}}" class="nav-link link-scroll">Login</a></li>
          <li class="nav-item"><a href="{{route('register')}}" class="nav-link link-scroll">Register</a></li>
          <li class="nav-item"><a href="{{route('contact.page')}}" class="nav-link link-scroll">Contact</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>

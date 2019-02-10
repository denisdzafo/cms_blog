<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container"><a href="{{route('index.page')}}" class="navbar-brand scrollTo">CMS Blog</a>
    <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><span class="fa fa-bars"></span></button>
    <div id="navbarcollapse" class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="{{route('index.page')}}" class="nav-link link-scroll">Homepage</a></li>
        <li class="nav-item"><a href="{{route('blog.page')}}" class="nav-link link-scroll">Blog</a></li>
        <li class="nav-item"><a href="{{route('about.page')}}" class="nav-link link-scroll">About</a></li>
        <li class="nav-item"><a href="{{route('author.page')}}" class="nav-link link-scroll">Author</a></li>
        <li class="nav-item"><a href="{{route('login')}}" class="nav-link link-scroll">Login</a></li>
        <li class="nav-item"><a href="{{route('register')}}" class="nav-link link-scroll">Register</a></li>
        <li class="nav-item"><a href="{{route('contact.page')}}" class="nav-link link-scroll">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

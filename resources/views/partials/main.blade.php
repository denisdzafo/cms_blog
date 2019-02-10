<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials.header')
  </head>
  <body>

    <header class="header">
      @include('partials.nav')
    </header>

  
    <section id="content">
      @yield('content')
    </section>

    <footer id="footer">
      @include('partials.footer')
    </footer>

  </body>
</html>

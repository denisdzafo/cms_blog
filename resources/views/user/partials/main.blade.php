<!DOCTYPE html>
<html lang="en">
  <head>
    @include('user.partials.header')
  </head>
  <body>

    <header class="header">
      @include('partials.nav')
    </header>


    <section id="content" class="@yield('body_class')">
      @yield('content')
    </section>

    <footer id="footer">
      @include('user.partials.footer')
    </footer>

  </body>
</html>

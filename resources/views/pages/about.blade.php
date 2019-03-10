@extends('partials.main')
@section('title','About')
@section('content')
@section('body_class', 'about ')

<section id="header" style="background: url({{asset('images/about.jpg')}}) center center no-repeat; background-size: cover;">
   <div class="container text-center">
      <h1 class="page-title">ABOUT</h1>
   </div>
</section>

<section class="intro">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <div class="page-link">
          <h2>All code you can download on GitHub:</h2>
          <a href="https://github.com/denisdzafo/cms_blog" target="_blank">Download</a>
        </div>
      </div>
    </div>
  </div>
</section>



@endsection

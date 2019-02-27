@extends('partials.main')
@section('title','Homepage')
@section('content')
<section id="header" style="background: url({{asset('images/home.jpg')}}) center center no-repeat; background-size: cover;" class="intro-section pb-2">
   <div class="container text-center">
      <div data-animate="fadeInDown" class="logo"><img src="img/logo-big.png" alt="logo" width="130"></div>
      <h1 data-animate="fadeInDown" class="text-shadow mb-5">Hello, hola, नमस्ते !</h1>
      <p data-animate="slideInUp" class="h3 text-shadow text-400">I grind HTML and CSS and then weld them with PHP into beautiful and efficient websites.</p>
   </div>
</section>
<section>
   <div class="container">
      <div class="text-center">
         <h2>Lorem Ipsum</h2>
      </div>
      <div class="row">
         <p>
            Lorem ipsum dolor sit amet, cu aperiri habemus reprimique est, nobis inciderint cu vix, eum prompta persecuti id. Rebum brute tamquam te qui. Id errem quaeque menandri eos. Ei cum omnis prima laboramus, ne sit nemore contentiones, ceteros mentitum periculis at pro. Ei sit nullam fastidii, eu dictas impetus perfecto sed. Ei cum ferri vivendum, ei nam debet placerat, sint docendi appetere sit ex.
            Magna petentium id nam. Mei error zril eu, eum te quaeque perpetua. Nec id mundi admodum laboramus, eu vix principes prodesset. No vim ocurreret scribentur. Ne movet consetetur nec, impedit assentior intellegat in quo.
            Vel agam an imal insolens at, mea porro saperet principes at. Ea has brute graece prompta, eu nec eros concludaturque. Viderer labores feugait eu has, has fugit intellegat ut. Per cu gubergren tincidunt consectetuer, vis in amet dicat propriae, te quo utinam facete imperdiet. An vel ubique deleniti abhorreant.
         </p>
      </div>
   </div>
</section>

<section id="blog">
   <div class="container">
      <div class="row">
         @foreach($blogs as $blog)
         <div class="col-md-4">
            @php $image='storage'.'/'.$blog->picture; @endphp
            <a href="#" style="background:url({{$image}})  center no-repeat" class="blog-image"> </a>
            <div class="blog-post">
               <div class="post-meta">
                  <h5>{{$blog->title}}</h5>
                  <i>{{$blog->created_at}}</i>
                  <p>
                     @php
                     $text=substr($blog->content, 0, 100)
                     @endphp
                     {{$text}}
                  </p>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>

<section id="image" style="background: url({{asset('images/homepage-image-section.jpg')}}) center center no-repeat; background-size: cover;">

</section>

  <section class="testimonials ">
    <div class="container">
      <div class="row">
          <div class="col-md-offset-2 col-md-8">
              <div id="testimonial-slider" class="owl-carousel">

                @foreach($testimonials as $testimonial)
                  <div class="testimonial">

                      <p class="description">
                          {{$testimonial->quote}}
                      </p>
                      <h3 class="title">{{$testimonial->author}}
                          <span class="post"> - {{$testimonial->position}}</span>
                      </h3>
                  </div>
                @endforeach

              </div>
          </div>
      </div>
    </div>
  </section>


  <section id="about">
          <div class="row row-eq-height">

            <div  class="col-md-6">
              <header class="text-center">
                <h2  class="title">About me</h2>
              </header>
              <p>An sincerity so extremity he additions. Her yet <strong>there truth merit</strong>. Mrs all projecting favourable now unpleasing. Son law garden chatty temper. Oh children provided to mr elegance marriage strongly. Off can admiration prosperous now devonshire diminution law.</p>
              <p>Received overcame oh sensible so at an. Formed do change merely to county it. <strong>Am separate contempt</strong> domestic to to oh. On relation my so addition branched. Put hearing cottage she norland letters equally prepare too. Replied exposed savings he no viewing as up. Soon body add him hill. No father living really people estate if. Mistake do produce beloved demesne if am pursuit.</p>
              <p>An sincerity so extremity he additions. Her yet <strong>there truth merit</strong>. Mrs all projecting favourable now unpleasing. Son law garden chatty temper. Oh children provided to mr elegance marriage strongly. Off can admiration prosperous now devonshire diminution law.</p>
            </div>
            <div class="col-md-6"  style="background: url({{asset('images/mill.jpg')}}) center center no-repeat; background-size: cover;">




          </div>





            <div class="col-md-6"  style="background: url({{asset('images/mill.jpg')}}) center center no-repeat; background-size: cover;">




          </div>
            <div  class="col-md-6">
              <header class="text-center">
                <h2  class="title">About me</h2>
              </header>
              <p>An sincerity so extremity he additions. Her yet <strong>there truth merit</strong>. Mrs all projecting favourable now unpleasing. Son law garden chatty temper. Oh children provided to mr elegance marriage strongly. Off can admiration prosperous now devonshire diminution law.</p>
              <p>Received overcame oh sensible so at an. Formed do change merely to county it. <strong>Am separate contempt</strong> domestic to to oh. On relation my so addition branched. Put hearing cottage she norland letters equally prepare too. Replied exposed savings he no viewing as up. Soon body add him hill. No father living really people estate if. Mistake do produce beloved demesne if am pursuit.</p>
              <p>An sincerity so extremity he additions. Her yet <strong>there truth merit</strong>. Mrs all projecting favourable now unpleasing. Son law garden chatty temper. Oh children provided to mr elegance marriage strongly. Off can admiration prosperous now devonshire diminution law.</p>
            </div>

        </div>
      </section>


@endsection

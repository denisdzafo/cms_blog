@extends('partials.main')
@section('title','Homepage')
@section('content')
@section('body_class','homepage')

<section id="header" style="background: url({{asset('images/home.jpg')}}) center center no-repeat; background-size: cover;" class="intro-section pb-2">
   <div class="container text-center">
      <h1 class="text-shadow mb-5">CMS BLOG</h1>
      <p class="h3 text-shadow text-400">Lorem ipsum dolor sit amet, cu aperiri habemus reprimique est, nobis inciderint cu vix.</p>
   </div>
</section>

<section class="intro">
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

<section class="blog-section">
   <div class="container">
      <div class="row">
        @foreach($blogs as $blog)
        <div class="col-md-4">
           @php $image='storage'.'/'.$blog->picture; @endphp

           <div class="blog-post">
             <img src="{{asset($image)}}" alt="" class="blog-image">

                 <h5 class="blog-title"><a href="{{route('admin.single.blog',$blog->id)}}">{{$blog->title}}</a></h5>
                 <i class="date">{{$blog->created_at->format('d/m/Y') }}</i>
                 <p>
                    @php
                    $text=substr($blog->content, 0, 50)
                    @endphp
                    {{$text}}...
                 </p>

           </div>
        </div>
          @endforeach
      </div>
   </div>
</section>

<section id="statistics" data-dir="up" style="background: url({{asset('images/homepage-image-section.jpg')}});" class="statistics-section text-white parallax parallax">
      <div class="container">
        <div class="row showcase text-center">
          <div class="col-lg-3 col-md-6">
            <div class="item">
              <div class="icon"><i class="fa fa-align-justify"></i></div>
              <h5 class="text-400 mt-4 text-uppercase"><span class="counter">140</span><br>Lorem Ipsum</h5>
            </div>
          </div>
          <div  class="col-lg-3 col-md-6">
            <div class="item">
              <div class="icon"><i class="fa fa-users"></i></div>
              <h5 class="text-400 mt-4 text-uppercase"><span class="counter">70</span><br>Lorem Ipsum</h5>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="item">
              <div class="icon"><i class="fa fa-copy"></i></div>
              <h5 class="text-400 mt-4 text-uppercase"><span class="counter">220</span><br>Lorem Ipsum</h5>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="item">
              <div class="icon"><i class="fa fa-font"></i></div>
              <h5 class="text-400 mt-4 text-uppercase"><span class="counter">444</span><br>Lorem Ipsum</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="dark-mask"></div>
    </section>

  <section class="testimonials ">
    <div class="demo">
    <div class="container text-center">
        <div class="row text-center">
            <div class="col-md-12">
              <h2 class="title">Testimonials</h2>
                <div id="testimonial-slider" class="owl-carousel">
                  @foreach($testimonials as $testimonial)
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <div class="testimonial-icon">
                                <i class="fa fa-quote-left"></i>
                            </div>
                            <p class="description">
                                {{$testimonial->quote}}
                            </p>
                        </div>
                        <h3 class="title">{{$testimonial->author}}</h3>
                        <span class="post">{{$testimonial->position}}</span>
                    </div>
                  @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
  </section>


  <section id="about" class="about">
          <div class="row row-eq-height">

            <div  class="col-md-6">
              <header class="text-center">
                <h2  class="title">Lorem Ipsum</h2>
              </header>
              <p class="paragraph">
                Lorem ipsum dolor sit amet, ea ipsum idque doming has, ad has probo maluisset. Esse novum vivendo mel at. Dicunt verterem nominati ei nam. Libris petentium his cu, ne nec tota graecis mediocrem, odio case cibo vix ea. Viderer iudicabit dissentiet sit id, impedit tibique phaedrum usu eu.

Cu eum voluptaria adipiscing, has tota dissentiet an, in quo blandit principes. Illud voluptaria eu sed, duo duis aliquip et. Ea duo nihil vulputate, mea in eirmod interpretaris. Has nobis propriae appetere in, voluptua conceptam ius an.

Iriure minimum suscipiantur an pri, nec zril consul ne, usu in quod soleat voluptatibus. Vix dictas facilis cu, utroque fierent mei in. Qui ea magna consul, an laudem malorum has. Ex odio posse sed, eu quo soleat altera. Inani deserunt dissentiet quo ut, malorum fierent constituto ea ius, dicta audire vis ad. Qui vitae sadipscing id, ceteros euripidis vim et. Sea in simul concludaturque, brute augue errem ex quo.

Nec lorem omittam scriptorem in, virtute appareat ex cum, ex nibh possim reprimique sit. Ad posse mollis voluptatum eum. Vis ad error alienum praesent, nihil latine urbanitas vel ne, graecis eloquentiam ei eos. Sea ut possim laoreet periculis, eum eu simul nullam semper.

Nam denique periculis maluisset at, dictas pertinacia qui id. Has viris soluta vocent cu, sea id simul incorrupte quaerendum. At alii soluta nostro qui, modus tacimates reprehendunt eum te. Et quas congue duo, hinc autem reformidans ne ius.
              </p>
            </div>
            <div class="col-md-6"  style="background: url({{asset('images/image-sidebar-first.jpg')}}) center center no-repeat; background-size: cover;">




          </div>





            <div class="col-md-6"  style="background: url({{asset('images/image-sidebar-second.jpg')}}) center center no-repeat; background-size: cover;">




          </div>
            <div  class="col-md-6">
              <header class="text-center">
                <h2  class="title">Lorem Ipsum</h2>
              </header>
              <p class="paragraph">
                Lorem ipsum dolor sit amet, ea ipsum idque doming has, ad has probo maluisset. Esse novum vivendo mel at. Dicunt verterem nominati ei nam. Libris petentium his cu, ne nec tota graecis mediocrem, odio case cibo vix ea. Viderer iudicabit dissentiet sit id, impedit tibique phaedrum usu eu.

<br>Cu eum voluptaria adipiscing, has tota dissentiet an, in quo blandit principes. Illud voluptaria eu sed, duo duis aliquip et. Ea duo nihil vulputate, mea in eirmod interpretaris. Has nobis propriae appetere in, voluptua conceptam ius an.

Iriure minimum suscipiantur an pri, nec zril consul ne, usu in quod soleat voluptatibus. Vix dictas facilis cu, utroque fierent mei in. Qui ea magna consul, an laudem malorum has. Ex odio posse sed, eu quo soleat altera. Inani deserunt dissentiet quo ut, malorum fierent constituto ea ius, dicta audire vis ad. Qui vitae sadipscing id, ceteros euripidis vim et. Sea in simul concludaturque, brute augue errem ex quo.

Nec lorem omittam scriptorem in, virtute appareat ex cum, ex nibh possim reprimique sit. Ad posse mollis voluptatum eum. Vis ad error alienum praesent, nihil latine urbanitas vel ne, graecis eloquentiam ei eos. Sea ut possim laoreet periculis, eum eu simul nullam semper.

Nam denique periculis maluisset at, dictas pertinacia qui id. Has viris soluta vocent cu, sea id simul incorrupte quaerendum. At alii soluta nostro qui, modus tacimates reprehendunt eum te. Et quas congue duo, hinc autem reformidans ne ius.
              </p>
        </div>
      </section>


@endsection

@extends('partials.main')
@section('title', 'Blog')
@section('content')
@section('body_class', 'blog')
<section id="header" style="background: url({{asset('images/blog.jpg')}}) center center no-repeat; background-size: cover;">
   <div class="container text-center">
      <h1 class="page-title">BLOG</h1>
   </div>
</section>

<section>
   <div class="container">
      <div class="row">
        @foreach($blogs as $blog)
        <div class="col-md-4">
           @php $image='storage'.'/'.$blog->picture; @endphp




           <div class="blog-post">
             <img src="{{asset($image)}}" alt="" class="blog-image">

                 <h5 class="blog-title"><a href="{{route('single.blog.page',$blog->id)}}">{{$blog->title}}</a></h5>
                 <i class="date">{{$blog->created_at->format('d/m/Y') }}</i>
                 <p>
                    @php
                    $text=substr($blog->content, 0, 50)
                    @endphp
                    {{$text}}...
                 </p>
                 <p class="category"><strong>Category:</strong> <span>{{$blog->blogCategories->category}}</span></p>


           </div>
        </div>
          @endforeach
      </div>
   </div>
</section>

@endsection

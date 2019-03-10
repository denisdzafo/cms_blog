@extends('partials.main')
@section('title', 'Single Blog')
@section('content')
@section('body_class', 'admin-single-blog')


<section class="content">
   <div class="container">
      <div class="row">

        <div class="col-md-8">
           @php $image='storage'.'/'.$blog->picture; @endphp

           <div class="blog-post">
             <img src="{{asset($image)}}" alt="" class="blog-image">
                 <h2 class="title">{{$blog->title}}</h2>
                <p class="meta"><i class="date">{{$blog->created_at->format('d/m/Y') }}</i><span class="author"> Admin</span></p>
                 <p>

                    {{$blog->content}}
                 </p>

           </div>

    </div>

    <div class="col-md-4">
      <h3>Other admin blogs:</h3>
      @foreach($blogs as $blo)
        <h5>
          <a href="{{route('admin.single.blog',$blog->id)}}">{{$blo->title}}</a>

        </h5>
      @endforeach
    </div>

  </div>
   </div>
</section>

@endsection

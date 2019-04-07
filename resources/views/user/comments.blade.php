
@extends('user.partials.main')

@section('title','User Comments')

@section('content')
@section('body_class','user-comments')

<section id="header" style="background: url({{asset('images/contact.jpg')}}) center center no-repeat; background-size: cover;">
   <div class="container text-center">
      <h1 class="page-title">My Comments On Blogs</h1>
   </div>
</section>

<section id="user-comments"  class="content">
      <div class="container">

        <div class="row">
          <div class="col-lg-8 mx-auto">
            @foreach (['danger', 'warning', 'success', 'info','error'] as $key)
               @if ( Session::has($key) )
               <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
               @endif
            @endforeach

              @foreach($comments as $comment)
                <div class="col-md-12 comment">
                    <p> {{ $comment->text }}</p>
                    <p>Created: <i>{{$comment->created_at}}</i> </p>
                    <p>Comment on blog: <a href="{{route('single.blog.page',$comment->blog_id)}}">{{$comment->blogs->title}}</a> </p>


                </div>
                @endforeach

                  {{$comments->links()}}
              
          </div>
        </div>
      </div>
    </section>
@endsection

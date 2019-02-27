@extends('partials.main')
@section('title', 'Single Blog')
@section('content')
@section('body_class', 'single-blog')


<section class="content">
   <div class="container">
      <div class="row">

        <div class="col-md-8">
           @php $image='storage'.'/'.$blog->picture; @endphp




           <div class="blog-post">
             <img src="{{asset($image)}}" alt="" class="blog-image">

                 <h2 class="title">{{$blog->title}}</h2>
                <p class="meta"><i class="date">{{$blog->created_at->format('d/m/Y') }}</i><span class="author">{{$blog->users->username}}</span></p>
                 <p>

                    {{$blog->content}}
                 </p>
                 <p class="category"><strong>Category:</strong> <span>{{$blog->blogCategories->category}}</span></p>

                 <p>
                   @foreach($blog->tags as $tag)
                      <span class="tag">#{{str_replace(' ', '',$tag->name)}}</span>
                   @endforeach
                 </p>
           </div>
        </div>

      </div>

      <div class="row">
        <div class="col-md-5">
          <div class="comment-form">
            <h3 class="title">Leave Comment</h3>
            <form  action="{{route('comments.store')}}" method="post">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" name="blog_id" value="{{$blog->id}}">
              <div class="form-row">

                <input type="text" name="username" class="form-control" placeholder="Username">
              </div>
              <div class="form-row">
                <textarea name="text" rows="8" class="form-control" placeholder="Comment"></textarea>
              </div>
            </form>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-md-5">
          <div class="comments">
            <h4 class="title">Comments <i class="fa fa-plus"></i> </h4> 
          </div>
        </div>
      </div>
   </div>
</section>

@endsection

@extends('user.partials.main')

@section('title','User Blogs')

@section('content')
@section('body_class','user-blog')

<section id="header" style="background: url({{asset('images/blog.jpg')}}) center center no-repeat; background-size: cover;">
   <div class="container text-center">
      <h1 class="page-title">MY BLOGS</h1>
   </div>
</section>

<section class="content">
   <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('blogs.create')}}" class="btn btn-primary create-blog">Create Blog</a>
        </div>

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
                 <div class="row setings-buttons">
                   <div class="col-md-4">
                     <a href="{{route('blogs.edit',$blog->id)}}" class="btn btn-info">Edit</a>
                   </div>
                   <div class="col-md-4">
                     <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $blog->id }}" data-url="{{ url('/user/blogs/'.$blog->id) }}">Delete</a>


                   </div>

                   </div>

           </div>
        </div>
          @endforeach
      </div>
   </div>
</section>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Delete Blog</h4>
                      </div>
                      <div class="modal-body">
                              Are you sure you want to delete blog?
                      </div>
                      <div class="modal-footer">
                          <form id="deleteMessageForm" action="" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="DELETE"/>
                              <input type="hidden" name="id">
                              <button type="submit" class="btn btn-danger">Delete</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                          </form>
                      </div>
                  </div>
              </div>
                    </div>

@endsection

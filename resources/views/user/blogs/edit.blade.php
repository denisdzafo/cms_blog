

@extends('user.partials.main')

@section('title','User Edit Blog')

@section('content')
@section('body_class','user-edit-blog')
<section id="header" style="background: url({{asset('images/contact.jpg')}}) center center no-repeat; background-size: cover;">
   <div class="container text-center">
      <h1 class="page-title">Edit Blog</h1>
   </div>
</section>

<section id="create-blog"  class="content">
      <div class="container">

        <div class="row">
          <div class="col-lg-8 mx-auto">
            @foreach (['danger', 'warning', 'success', 'info','error'] as $key)
               @if ( Session::has($key) )
               <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
               @endif
            @endforeach
            <form class="form-horizontal" role="form"  method="post" action="{{route ('blogs.update',$blog->id)}}" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{csrf_token()}}">
               <input type="hidden" name="_method" value="PUT"/>
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label class="form-label">Title</label>
                     <input type="text" name="title" class="form-control" value="{{$blog->title}}">
                  </div>
               </div>

               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label class="form-label">File: </label>
                     @if($blog->picture)
                      <a href="{{route('blog.get.picture',$blog->picture)}}" download> Download Picture</a>
                      @endif
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label class="form-label">Picture</label>
                     <input type="file" name="picture" class="form-control">
                  </div>
               </div>
               <div class="form-row">
                 <div class="form-group col-md-12">
                     <label class="form-label">Category </label>
                     <select class="form-control" name="blogCategory_id">
                       @foreach($blogCategories as $blogCategory)
                               <option value='{{ $blogCategory->id }}' {{ $blog->blogCategory_id == $blogCategory->id ? 'selected="selected"' : '' }}>{{ $blogCategory->category }}</option>
                       @endforeach
                     </select>
                  </div>
                </div>

                <div class="form-row">
                 <div class="form-group col-md-12">
                    <label class="form-label">Tags </label>
                    <br>
                    @foreach($tags as $tag)
                      <input type="checkbox" value='{{ $tag->id }}' @foreach($blog->tags as $p) {{ $tag->id == $p->id ? 'checked' : '' }} @endforeach  name="tags[]" class="tags-checkbox"> <span class="tag-name">{{ $tag->name }}</span>
                    @endforeach

                 </div>
              </div>


               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label class="form-label">Content</label>
                       <textarea  type="text" class="form-control" name="content" rows="10">{{$blog->content}}</textarea>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary">Update Blog</button>
            </form>
          </div>
        </div>
      </div>
    </section>


@endsection

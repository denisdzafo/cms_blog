@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Edit Blog
                    <br>
                    <div class="row">
                      <form class="form-horizontal" role="form"  method="post" action="{{route ('adminBlogs.update',$blog->id)}}" enctype="multipart/form-data">
                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                         <input type="hidden" name="_method" value="PUT"/>
                         <div class="form-row">
                            <div class="form-group col-md-6">
                               <label class="form-label">Title</label>
                               <input type="text" name="title" class="form-control" value="{{$blog->title}}">
                            </div>
                         </div>

                         <div class="form-row">
                            <div class="form-group col-md-6">
                               <label class="form-label">File: </label>
                               @if($blog->picture)
                                <a href="{{route('blog.get.picture',$blog->picture)}}" download> Download Picture</a>
                                @endif
                            </div>
                         </div>
                         <div class="form-row">
                            <div class="form-group col-md-6">
                               <label class="form-label">Picture</label>
                               <input type="file" name="picture" class="form-control">
                            </div>
                         </div>
                         <div class="form-group col-md-6">
                             <label class="form-label">Category </label>
                             <select class="form-control" name="blogCategory_id">
                               @foreach($blogCategories as $blogCategory)
                                       <option value='{{ $blogCategory->id }}' {{ $blog->blogCategory_id == $blogCategory->id ? 'selected="selected"' : '' }}>{{ $blogCategory->category }}</option>
                               @endforeach
                             </select>
                          </div>

                         <div class="form-row">
                            <div class="form-group col-md-6">
                               <label class="form-label">Content</label>
                                 <textarea  type="text" class="form-control" name="content" rows="10">{{$blog->content}}</textarea>
                            </div>
                         </div>
                         <button type="submit" class="btn btn-primary">Update Blog</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

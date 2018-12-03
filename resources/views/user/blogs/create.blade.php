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

                    Blog Create
                    <br>
                    <form method="post" action="{{route ('blogs.store')}}" enctype="multipart/form-data">
                       <input type="hidden" name="_token" value="{{csrf_token()}}">
                       <div class="form-row">
                          <div class="form-group col-md-6">
                             <label class="form-label">Title</label>
                             <input type="text" name="title" class="form-control">
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
                                     <option value='{{ $blogCategory->id }}'>{{ $blogCategory->category }}</option>
                             @endforeach
                           </select>
                        </div>

                       <div class="form-row">
                          <div class="form-group col-md-6">
                             <label class="form-label">Content</label>
                               <textarea  type="text" class="form-control" name="content" rows="10"></textarea>
                          </div>
                       </div>

                       <div class="form-row">
                        <div class="form-group col-md-6">
                           <label class="form-label">Tags </label>
                           <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                           @foreach($tags as $tag)
                             <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                           @endforeach
                         </select>
                        </div>
                     </div>

                       <button type="submit" class="btn btn-primary">Add Blog</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

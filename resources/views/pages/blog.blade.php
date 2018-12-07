@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @foreach (['danger', 'warning', 'success', 'info','error'] as $key)
                   @if ( Session::has($key) )
                   <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
                   @endif
                @endforeach

                 @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Blogs
                    <br>
                    <div class="row">
                      @foreach($blogs as $blog)
                        <div class="col-md-12">
                          @php $imageLink='storage'.'/'.$blog->picture;@endphp
                                <img src="{{$imageLink}}" alt="" style="width:50%;height:70%">
                          <h2>{{$blog->title}}</h2>
                          <p>{{$blog->content}}</p>
                          <form method="post" action="{{route ('comments.store')}}" enctype="multipart/form-data">
                             <input type="hidden" name="_token" value="{{csrf_token()}}">
                             <input type="hidden" name="blog_id" value="{{$blog->id}}">
                             <div class="form-row">
                                <div class="form-group col-md-6">
                                   <label class="form-label">Username</label>
                                   <input type="text" name="username" class="form-control">
                                </div>
                             </div>
                             <div class="form-row">
                                <div class="form-group col-md-6">
                                   <label class="form-label">Comment</label>
                                   <input type="text" name="comment" class="form-control">
                                </div>
                             </div>



                             <button type="submit" class="btn btn-primary">Add Comment</button>
                          </form>
                          <br>
                        </div>
                        <br>
                      @endforeach
                    </div>
                    <br>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
                          <h2>{{$blog->title}}</h2>
                          @foreach($blog->comments as $comment)
                            <p><span class="bold">{{ $comment->username }}</span><br> {{ $comment->text }}</p>
                            <form class="form-horizontal" role="form"  method="post" action="{{route ('comments.destroy',$comment->id)}}">
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                              <input type="hidden" name="_method" value="DELETE"/>
                              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                             </form>
                          @endforeach
                        <p><a href="{{route('moderator.blog.edit',$blog->id)}}" class="btn btn-info">Edit</a></p>
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

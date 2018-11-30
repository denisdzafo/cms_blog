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

                    Blog Categories
                    <br>
                    <div class="row">
                      @foreach($blogCategories as $blogCategory)
                        <div class="col-md-12">
                          <h2>{{$blogCategory->category}}</h2>
                          <p>{{$blogCategory->description}}</p>
                          <p><a href="{{route('categories.edit',$blogCategory->id)}}" class="btn btn-info">Edit</a></p>
                          <p>
                            <form class="form-horizontal" role="form"  method="post" action="{{route ('categories.destroy',$blogCategory->id)}}">
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                              <input type="hidden" name="_method" value="DELETE"/>
                              <button type="submit" class="btn btn-danger">Delete</button>
                             </form>
                          </p>

                        </div>
                        <br>
                      @endforeach
                    </div>
                    <br>
                    <a href="{{route('categories.create')}}" class="btn btn-primary">Create Blog Category</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

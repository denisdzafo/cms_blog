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

                    Comments
                    <br>
                    <div class="row">
                      @foreach($comments as $comment)
                        <div class="col-md-12">
                          @php $blog=App\Blog::find($comment->blog_id);@endphp
                          <h2>{{$blog->title}}</h2>

                            <p> {{ $comment->text }}</p>

                          @endforeach

                        </div>

                    </div>
                    <br>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

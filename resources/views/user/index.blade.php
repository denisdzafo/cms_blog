@extends('user.partials.main')

@section('title','User Dashboard')

@section('content')
@section('body_class','user-dashboard')
<section class="content">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-6">
            @php $image='storage'.'/'.$user->picture; @endphp
            <img src="{{asset($image)}}" alt="" class="profile-image">

          </div>

          <div class="col-md-6">
            <h3>{{$user->username}}</h3>
            <p>Email: <i>{{$user->email}}</i>  </p>
            <p>Registred: <i>{{$user->created_at->format('d/m/Y')}}</i>  </p>
            <hr>
            <p>
              {{$user->info}}
            </p>
            <br>
            <div class="row">
              <div class="col-md-4">
                <a href="{{route('blogs.index')}}" class="btn btn-primary">My Blogs</a>
              </div>
              <div class="col-md-4">
                <a href="{{route('user.get.comments')}}" class="btn btn-primary">My Comments</a>
              </div>
              <div class="col-md-4">
                <a href="{{route('user.edit.profile')}}" class="btn btn-primary">Edit Profile</a>
              </div>
            </div>

            <br>

            <br>

          </div>
      </div>
  </div>
</section>

@endsection

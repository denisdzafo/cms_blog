@extends('user.partials.main')

@section('title','User Edit Profile')

@section('content')
@section('body_class','user-edit-profile')
<section id="header" style="background: url({{asset('images/contact.jpg')}}) center center no-repeat; background-size: cover;">
   <div class="container text-center">
      <h1 class="page-title">Edit Profile</h1>
   </div>
</section>

<section id="edit-profile"  class="content">
      <div class="container">

        <div class="row">
          <div class="col-lg-8 mx-auto">
            @foreach (['danger', 'warning', 'success', 'info','error'] as $key)
               @if ( Session::has($key) )
               <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
               @endif
            @endforeach
            <form class="form-horizontal" role="form"  method="post" action="{{route ('user.edit.profile.submit',$user->id)}}" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{csrf_token()}}">
               <input type="hidden" name="_method" value="PUT"/>
               <div class="form-row">
                  <div class="form-group col-md-8">
                     <label class="form-label">Username</label>
                     <input type="text" name="username" class="form-control" value="{{$user->username}}">
                  </div>
               </div>

               <div class="form-row">
                  <div class="form-group col-md-8">
                     <label class="form-label">Old Picture: </label>
                     @if($user->picture)
                      <a href="{{route('blog.get.picture',$user->picture)}}" download> Download Picture</a>
                      @endif
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-8">
                     <label class="form-label">Picture</label>
                     <input type="file" name="picture" class="form-control">
                  </div>
               </div>


                <div class="form-row">
                  <div class="form-group col-md-8">
                      <label class="form-label">Info </label>
                      <textarea name="info" rows="8" class="form-control">{{$user->info}}</textarea>
                   </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-8">
                   <label class="form-label">Password </label>
                   <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group col-md-8">
                   <label class="form-label">Confirm Password </label>
                   <input type="password" name="password_confirmation" class="form-control">
                </div>
             </div>
               <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
          </div>
        </div>
      </div>
    </section>


@endsection

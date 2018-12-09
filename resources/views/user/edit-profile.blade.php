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

                    Edit Profile
                    <br>
                    <div class="row">
                      <form class="form-horizontal" role="form"  method="post" action="{{route ('user.edit.profile.submit',$user->id)}}" enctype="multipart/form-data">
                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                         <input type="hidden" name="_method" value="PUT"/>
                         <div class="form-row">
                            <div class="form-group col-md-6">
                               <label class="form-label">Username</label>
                               <input type="text" name="username" class="form-control" value="{{$user->username}}">
                            </div>
                         </div>

                         <div class="form-row">
                            <div class="form-group col-md-6">
                               <label class="form-label">Picture: </label>
                               @if($user->picture)
                                <a href="{{route('blog.get.picture',$user->picture)}}" download> Download Picture</a>
                                @endif
                            </div>
                         </div>
                         <div class="form-row">
                            <div class="form-group col-md-6">
                               <label class="form-label">Picture</label>
                               <input type="file" name="picture" class="form-control">
                            </div>
                         </div>


                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-label">Info </label>
                                <textarea name="info" rows="8" cols="80">{{$user->info}}</textarea>
                             </div>
                        </div>

                        <div class="form-row">
                          <div class="form-group col-md-6">
                             <label class="form-label">Password </label>
                             <input type="password" name="password" class="form-control">
                          </div>

                          <div class="form-group col-md-6">
                             <label class="form-label">Confirm Password </label>
                             <input type="password" name="password_confirmation">
                          </div>
                       </div>
                         <button type="submit" class="btn btn-primary">Update Profile</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

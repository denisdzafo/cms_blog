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
                    Moderator Dashboard
                    <div class="row">
                      @foreach($moderators as $moderator)
                      <div class="col-md-12">
                        <h1>{{$moderator->username}}</h1>
                        <form class="form-horizontal" role="form"  method="post" action="{{route ('admin.modertors.remove.privilege',$moderator->id)}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="DELETE"/>
                            <button type="submit" class="btn btn-primary">Remove Moderator Privilege </button>
                          </form>
                      </div>
                      @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

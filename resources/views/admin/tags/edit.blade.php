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

                    Edit Tag
                    <br>
                    <div class="row">
                      <form class="form-horizontal" role="form"  method="post" action="{{route ('tags.update',$tag->id)}}">
                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                         <input type="hidden" name="_method" value="PUT"/>
                         <div class="form-row">
                            <div class="form-group col-md-12">
                               <label class="form-label">Name </label>
                               <input type="text" name="name" class="form-control"  value="{{$tag->name}}">
                            </div>
                         </div>

            
                         <button type="submit" class="btn btn-primary">Update Tag</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

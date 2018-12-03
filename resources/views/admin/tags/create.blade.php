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

                    Tags Create
                    <br>
                    <form method="post" action="{{route ('tags.store')}}">
                       <input type="hidden" name="_token" value="{{csrf_token()}}">
                       <div class="form-row">
                          <div class="form-group col-md-6">
                             <label class="form-label">Name</label>
                             <input type="text" name="name" class="form-control">
                          </div>
                       </div>


                       <button type="submit" class="btn btn-primary">Add Tag</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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

                    Edit Blog Category
                    <br>
                    <div class="row">
                      <form class="form-horizontal" role="form"  method="post" action="{{route ('categories.update',$blogCategory->id)}}">
                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                         <input type="hidden" name="_method" value="PUT"/>
                         <div class="form-row">
                            <div class="form-group col-md-12">
                               <label class="form-label">Category Name </label>
                               <input type="text" name="category" class="form-control"  value="{{$blogCategory->category}}">
                            </div>
                         </div>

                         <div class="form-row">
                            <div class="form-group col-md-12">
                               <label class="form-label">Description </label>
                               <textarea type="text" class="form-control" name="description" rows="10">{{$blogCategory->description}}</textarea>
                            </div>
                         </div>
                         <button type="submit" class="btn btn-primary">Update Category</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

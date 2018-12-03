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

                    Testimonials Create
                    <br>
                    <form method="post" action="{{route ('testimonials.store')}}">
                       <input type="hidden" name="_token" value="{{csrf_token()}}">
                       <div class="form-row">
                          <div class="form-group col-md-6">
                             <label class="form-label">Author</label>
                             <input type="text" name="author" class="form-control">
                          </div>
                       </div>

                       <div class="form-row">
                          <div class="form-group col-md-6">
                             <label class="form-label">Position</label>
                             <input type="text" name="position" class="form-control">
                          </div>
                       </div>

                       <div class="form-row">
                          <div class="form-group col-md-6">
                             <label class="form-label">Quote</label>
                               <textarea  type="text" class="form-control" name="quote" rows="10"></textarea>
                          </div>
                       </div>

                       <button type="submit" class="btn btn-primary">Add Testimonial</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

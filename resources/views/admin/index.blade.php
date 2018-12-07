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

                    You are logged in 2!
                    <br>
                    <a href="{{route('admin.users.get')}}">All Users</a>
                    <br>
                    <a href="{{route('admin.moderators.index')}}">Moderators</a>
                    <br>
                    <a href="{{route('categories.index')}}">Blog Categories</a>
                    <br>
                    <a href="{{route('testimonials.index')}}">Testimonials </a>
                    <br>
                    <a href="{{route('tags.index')}}">Tags</a>
                    <br>
                    <a href="{{route('adminBlogs.index')}}">Blog</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('partials.main')
@section('title','Contact')

@section('content')
@section('body_class','contact')

<section id="header" style="background: url({{asset('images/contact.jpg')}}) center center no-repeat; background-size: cover;">
   <div class="container text-center">
      <h1 class="page-title">Contact</h1>
   </div>
</section>

<section id="contact"  class="content">
      <div class="container">

        <div class="row">
          <div class="col-lg-8 mx-auto">
            @foreach (['danger', 'warning', 'success', 'info','error'] as $key)
               @if ( Session::has($key) )
               <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
               @endif
            @endforeach
            <form id="contact-form" method="post" action="{{route('contacts.store')}}">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="messages"></div>
              <div class="controls">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" name="first_name" placeholder="Your firstname *" required="required" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="last_name" placeholder="Your lastname *" required="required" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="email" placeholder="Your email *" required="required" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="phone" placeholder="Your phone" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <textarea name="message" placeholder="Message for me *" rows="4" required="required" class="form-control"></textarea>
                  </div>
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-outline-primary">Send message</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection

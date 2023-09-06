@extends('layouts.app')

@section('title', 'Contact_us')

@section('content')

<div class="container mt-5 shadow ">
    <div class="row ">
        <div class="col-md-4 bg-primary p-5 text-white order-sm-first order-last">
            <h2>Let's get in touch</h2>
            <p>We're open for any suggestion or just to have a chat</p>
            <div class="d-flex mt-2">
                <i class="bi bi-geo-alt"></i>
                <p class="mt-3 ms-3">Address : No:234, Aqua Cool Water, Kurunegala road, Galewela, Sri Lanka-21200</p>
            </div>
            <div class="d-flex mt-2">
                <i class="bi bi-telephone-forward"></i>
                <p class="mt-4 ms-3">Phone : +94 70-276-6389</p>
            </div>
            <div class="d-flex mt-2">
                <i class="bi bi-envelope"></i>
                <p class="mt-4 ms-3">Email : chinthig2@gmail.com</p>
            </div>
            {{-- <div class="d-flex mt-2">
                <i class="bi bi-youtube"></i>
                <p class="mt-4 ms-3">Channel : www.contactform.com/</p>
            </div> --}}
        </div>

        <div class="col-md-8 p-5 ">
            <h2>Contact Us</h2>

            @if(Session::has('message_sent'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message_sent') }}
                </div>
            @endif
            <form class="row g-3 contactForm mt-4" method="POST" action="{{ route('contact.send') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                  <label for="inputEmail4" class="form-label">First Name</label>
                  <input type="text" name="f_name" class="form-control" id="inputEmail4" required>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword4" class="form-label">Last Name</label>
                  <input type="text" name="l_name" class="form-control" id="inputPassword4" required>
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Subject</label>
                  <input type="text" name="subject" class="form-control" id="inputAddress" required>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="inputAddress" required>
                  </div>
                <div class="col-md-6">
                  <label for="inputCity" class="form-label">City</label>
                  <input type="text" name="city" class="form-control" id="inputCity">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Contact Number</label>
                    <input type="text" name="phone" class="form-control" id="inputCity" required>
                  </div>
                  <div class="col-md-6">
                    <label for="inputmessage" class="form-label">message</label>
                    <textarea name="msg" class="form-control" id="inputmsg" required></textarea>
                  </div>

                <div class="col-12">
                  <button type="submit" name="send_btn" class="btn btn-primary mt-3">Send</button>
                </div>
              </form>

        </div>
    </div>
</div>

@endsection

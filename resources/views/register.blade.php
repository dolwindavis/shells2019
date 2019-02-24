@extends('layouts.main')
@section('title','SHELLS2k19 | REGISTRATION')



@section('content')

@if (session('failed'))
  <script>
  Swal.fire(
  'Check Your Details!',
  'Try Again!',
  'error'
)
  </script>
@endif
<div class="container-fluid" style="padding: 0px;">
    <div style=" height:400px; width: 100%; " >
     <img src="https://s3.ap-south-1.amazonaws.com/shells2k19/website/images/80910.jpg" style="object-fit: cover; object-position: bottom;" height="100%" width="100%">
    </div>
  </div>
  <div class="container text-center p-2 card-3 border-r-sm drop-shadow" id="card-register-in">
    <div class="row text-center p-2" >
        <div class="col-md-12">
      <h3 style="letter-spacing: 1px;" ><strong>COLLEGE REGISTRATION</strong></h3>
    </div>
    </div>

  <!-- College Registration Form Starts -->

  <form method="POST" action= "{{ url('/register') }}" onsubmit="return validateform()" name="myform">
  @csrf
  <div class="row p-4">
    <div class="col-md-12 col-xs-12">
    <input type="text" class="form-control wt-h ht-f" placeholder="College Name With Location" name="name">
    </div>
  </div>
  <div class="row p-4">
    <div class="col-md-12 col-xs-12"> 
    <input type="Email" class="form-control wt-h ht-f" placeholder="Email" name="email">
    </div>
  </div>
  <div class="row p-4">
    <div class="col-md-12 col-xs-12"> 
    <input type="text" class="form-control wt-h ht-f" placeholder="Phone Number" name="phoneno">
    </div>
  </div>
  <div class="row p-4">
    <div class="col-md-12 col-xs-12"> 
    <input type="Password" class="form-control wt-h ht-f" placeholder="Password" name="password">
    </div>
  </div>
    <div class="form-check">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox" value="1" name="stay">
            Do You Require Stay?
            <span class="form-check-sign">
                <span class="check"></span>
            </span>
        </label>
    </div> 
  <div class="row p-4">
    <div class="col-md-12 col-xs-12"> 
    <button type="submit" class="btn gra-blue wt-h" style="letter-spacing: 2px; ">Register</button>
    <br>
   </form>
   <!-- form ends -->


  </div>
  </div>
  </div>
@endsection

@section('sweetalert')
<script src="{{asset('js/regesteration.js')}}"></script>
<script src="{{asset('js/sweetall.js')}}"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="{{asset('js/sweetalert2.min.js')}}"></script>


@endsection


@extends('layouts.main')
@section('title','SHELLS2k19 | LOGIN')

@section('content')

@if (session('failed'))
  <script>
  Swal.fire(
  'Check Your Credentials!',
  'Please try Again!',
  'error'
)
  </script>
@endif
<div class="container-fluid" style="padding: 0px;">
  <div style=" height:400px; width: 100%; background-color: #03a9f4; object-fit: cover; object-position: center;" >
    <img src="https://s3.ap-south-1.amazonaws.com/shells2k19/website/images/bg.jpg" width="100%" height="100%" style="object-fit: cover;">
  </div>
</div>
<div class="container text-center card-3 border-r-sm" id="card-sign-in">
  <div class="row text-center p-3" >
      <div class="col-md-12 p-2">
    <h3><strong >SIGN IN</strong></h3>
  </div>
  </div>

<!-- Starting a login form-->

<form method="POST" action="{{ url('/login') }}">
@csrf
<div class="row p-4">
  <div class="col-md-12 col-xs-12">
  <input type="text" class="form-control wt-h ht-f" placeholder="Username" name="email">
  </div>
</div>
<div class="row p-4">
  <div class="col-md-12 col-xs-12"> 
  <input type="password" class="form-control wt-h ht-f" placeholder="password" name="password">
  </div>
</div>
<div class="row p-4">
  <div class="col-md-12 col-xs-12"> 
  <button type="submit" class="btn btn-info wt-h" style="letter-spacing: 2px;""><i class="fas fa-sign-in-alt" ="font-sizestyle: 10px;letter-spacing: 5px; margin-right:5px;"></i> Login</button>
  <br>
  <a href="{{ url('/register') }}" class="d-block p-3" style="font-size: 15px;">Register here....</a>
  </div>
</div>
</form>

<!--end of the form -->
</div>

@endsection
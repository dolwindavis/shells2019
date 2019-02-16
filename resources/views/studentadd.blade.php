@extends('layouts.main')
@section('title','SHELLS2k19 | Students Add')

@section('content')

<!-- Sign in page -->
 
<!-- Sign in page -->
<div class="container-fluid" style="padding: 0px;">
  <div style=" height:400px; width: 100%; background-color: #03a9f4; object-fit: cover; object-position: center;"  >
    <img src="https://s3.ap-south-1.amazonaws.com/shells2k19/website/images/signin/bg8.jpeg" width="100%" height="100%" style="object-fit: cover; object-position: top;">
  </div>
</div>
<div class="container text-center card-2 border-r-sm" id="card-register-in">
  <div class="row text-center p-2" >
      <div class="col-md-12 p-3">
    <h3 style="letter-spacing: 1px;"><strong>ADD PARTICIPANT</strong></h3>
  </div>
  </div>

  <!-- student Registration form -->
  @if($student->name != null)
  <form method="POST" action="{{ url('/student/edit/'.$student->id) }}">
  @else
  <form method="POST" action="{{ url('/student/register') }}">
  @endif
  
  @csrf
  <!--Name details -->
<div class="row p-4">
  <div class="col-md-12 col-xs-12">
  <input type="text" class="form-control wt-h ht-f" placeholder="Participant Name" name="name" value="{{ $student->name }}">
  </div>
</div>

<!-- Gender details-->
<div class="row p-4">
  <div class="col text-left">
  <label class="" style="">Gender</label>
  </div>
  <div class="col">
    <div class="form-check form-check-radio form-check-inline">
    <label class="form-check-label">
    @if(!$student || $student->gender !='male')
    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male"> Male
    @else
    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" checked> Male
    @endif
    <span class="circle">
        <span class="check"></span>
    </span>
    </label>
   </div>
    <div class="form-check form-check-radio form-check-inline">
  <label class="form-check-label">
  @if(!$student || $student->gender !='famale')
    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" > Female
  @else
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" checked> Female
  @endif
    <span class="circle">
        <span class="check"></span>
    </span>
  </label>
    </div>
    </div>
  </div>
 
<!--Phone Number Details-->
<div class="row p-4">
  <div class="col-md-12 col-xs-12"> 
  <input type="text" class="form-control wt-h ht-f" placeholder="Phone Number" name="phone" value={{ $student->phone }}>
  </div>
</div>

<!-- course details -->
<div class="row p-4">
  <div class="col-md-12 col-xs-12"> 
  <input type="text" class="form-control wt-h ht-f" placeholder="course" name="course" value={{$student->course}}>
  </div>
</div>

<!-- Register Number details -->
<div class="row p-4">
  <div class="col-md-12 col-xs-12"> 
  <input type="text" class="form-control wt-h ht-f" placeholder="reg_no" name="reg_no" value={{$student->reg_no}}>
  </div>
</div>

<!-- Email id-->
<div class="row p-4">
  <div class="col-md-12 col-xs-12"> 
  <input type="email" class="form-control wt-h ht-f" placeholder="Email" name="email" value={{$student->email}}>
  </div>
</div>

<div class="row pt-4">
  <div class="col-md-12 col-xs-12" style="padding-left: 0;padding-right: 0;"> 
  <button type="submit" class="btn btn-success wt-h btn-rm-d p-3" style="letter-spacing: 1px;font-size: 1em;">Add</button>
  <br>
</div>
</div>

</form> 

<!-- end of form -->

</div>
@endsection
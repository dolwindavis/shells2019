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
 
  <form method="POST" action="{{ url('/event/add') }}" enctype="multipart/form-data">
  @csrf
  <!--Name details -->
<div class="row p-4">
  <div class="col-md-12 col-xs-12">
  <input type="text" class="form-control wt-h ht-f" placeholder="Event Name" name="name" value="">
  </div>
</div>

<div class="row p-4">
  <div class="col-md-12 col-xs-12">
  <input type="file" class="form-control wt-h ht-f" placeholder="Event Image" name="logo" value="">
  </div>
</div>

<div class="row p-4">
  <div class="col-md-12 col-xs-12">
  <input type="text" class="form-control wt-h ht-f" placeholder="Event Head Name" name="headname" value="">
  </div>
</div>

<div class="row p-4">
  <div class="col-md-12 col-xs-12">
  <input type="file" class="form-control wt-h ht-f" placeholder="Event Head Image" name="headimage" value="">
  </div>
</div>

<div class="row p-4">
  <div class="col-md-12 col-xs-12">
  <input type="text" class="form-control wt-h ht-f" placeholder="Event Head Email" name="heademail" value="">
  </div>
</div>

<div class="row p-4">
  <div class="col-md-12 col-xs-12">
  <input type="text" class="form-control wt-h ht-f" placeholder="Event Head Phone" name="headphone" value="">
  </div>
</div>

<div class="row p-4">
  <div class="col-md-12 col-xs-12">
  <input type="textarea" class="form-control wt-h ht-f" placeholder="Event Info" name="info" value="">
  </div>
</div>

<div class="row p-4">
  <div class="col-md-12 col-xs-12">
  <input type="textarea" class="form-control wt-h ht-f" placeholder="Event rules" name="rules" value="">
  </div>
</div>

<div class="row p-4">
  <div class="col text-left">
  <label class="" style="">Exclusive Event</label>
  </div>
  <div class="col">
    <div class="form-check form-check-radio form-check-inline">
    <label class="form-check-label">
    <input class="form-check-input" type="radio" name="exclusive" id="inlineRadio1" value="1"> Yes
    <span class="circle">
        <span class="check"></span>
    </span>
    </label>
   </div>
    <div class="form-check form-check-radio form-check-inline">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="exclusive" id="inlineRadio2" value="0"> No
    <span class="circle">
        <span class="check"></span>
    </span>
  </label>
    </div>
    </div>
  </div>


<!-- Gender details-->
<div class="row p-4">
  <div class="col text-left">
  <label class="" style="">Group Event</label>
  </div>
  <div class="col">
    <div class="form-check form-check-radio form-check-inline">
    <label class="form-check-label">
    <input class="form-check-input" type="radio" name="groupevent" id="inlineRadio1" value="1"> Yes
    <span class="circle">
        <span class="check"></span>
    </span>
    </label>
   </div>
    <div class="form-check form-check-radio form-check-inline">
  <label class="form-check-label">
    <input class="form-check-input" type="radio" name="groupevent" id="inlineRadio2" value="0"> No
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
  <input type="text" class="form-control wt-h ht-f" placeholder="Group Member Count" name="groupnumber">
  </div>
</div>

<!-- course details -->
<div class="row p-4">
  <div class="col-md-12 col-xs-12"> 
  <input type="text" class="form-control wt-h ht-f" placeholder="Maximum Number Of participant" name="maxnumber">
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
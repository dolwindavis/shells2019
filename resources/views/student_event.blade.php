@extends('layouts.main')
@section('title','SHELLS2k19 | Students Event')

@section('content')

<!-- Sign in page -->
 
<!-- Sign in page -->
<div class="container-fluid" style="padding: 0px;">
  <div style=" height:400px; width: 100%; background-color: #03a9f4; object-fit: cover; object-position: center;"  >
    <img src="https://s3.ap-south-1.amazonaws.com/shells2k19/website/images/80910.jpg" width="100%" height="100%" style="object-fit: cover; object-position: bottom;">
  </div>
</div>
<div class="container text-center card-2 border-r-sm" id="card-register-in">


  <!-- student Registration form -->

  <form method="POST" action="">
  @csrf
  <!--Name details -->
<div class="row p-4" style="background-image: linear-gradient(to top, #4481eb 0%, #04befe 100%);position: relative;top:-20px;">
                   
        <div class="bg-dark text-light pt-5" style="position: relative;top: 40px;width: 50%;margin: 10px auto;border-radius: 5px;">
            <img src="" height="100px" id="logo"  width="100px">
                <h5 class="pt-2" >
                    <strong id="eventname">Event Name</strong>
                </h5>
                <p>result info</p>
        </div>
</div>

<div class="row p-4">

        <div class="row mx-auto" id="student_no"> 
                <div class="selectdiv" >
                        <label>
                            <select id="sudentselect">
                                <option selected value="">Select Event </option>
                                <option value="1">student 1</option>
                                <option value="2">student 2</option>
                                
                            </select>
                        </label>
                </div>
        </div>

</div>

<div class="row pt-4" style="padding: 1.5rem;">
  <div class="col-md-12 col-sm-12" style="padding-left: 0;padding-right: 0; margin: 0px auto;"> 
  <button type="submit" class="btn btn-success wt-h btn-rm-d p-3" style="letter-spacing: 1px;font-size: 1em; border-radius: 4px;">Add</button>
  <br>
</div>
</div>

</form> 

<!-- end of form -->

</div>
@endsection
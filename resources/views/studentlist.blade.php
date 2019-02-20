@extends('layouts.main')
@section('title','SHELLS2k19 | STUDENTLIST')

@section('content')

<div class="container mb-5 " style="margin-top: 120px;">
  <h3>Student's Registered</h3>
  <div class="container " style="box-sizing: border-box; margin-top: 40px;">
  <div class="row text-center text-light" style="box-sizing: border-box;">

  <!--Student Card Start -->

    @foreach ($students as $student)
    <div class="col-md-6 mx-1 mt-2 col-12  col-sm-12 card-1 border-r-sm bg-st-li " style="max-width:360px !important;" >
       <!--name details--> 
       <div class="row mt-2 p-3">
         <div class="col pt-5 ">
            <i class="fas fa-user-circle" style="font-size: 110px;"></i>
           <h5 class="pt-2" ><strong >{{ $student->name }}</strong></h5>
         </div>
       </div>
       <!--gender-->
       <div class="row">
         
         <div class="col ">
           <strong><p style="text-transform: capitalize;">{{ $student->gender }}</p></strong>
         </div>
         <div class="col">
           <strong><p>{{ $student->course }}</p></strong>
         </div>
       </div>
       <!--Mail details -->
        <div class="row">
         <div class="col">
           <p style="text-transform: uppercase; letter-spacing: 1px;">{{ $student->email }}</p>
         </div>
       </div>
       <!-- phone no -->
       <div class="row">
         
         <div class="col">
           <strong><p>{{ $student->phone }}</p></strong>
         </div>
       </div>
       <!-- Gender-->

       <div class="row ">         
       </div>
       <!--Add or Edit Button -->
        <div class="row">
        <a href="{{ url('student/edit/'.$student->id)}}" style="width: 50%;">
         <div class="col" style="padding-left: 0;padding-right: 0;">
            <button type="button" class="btn btn-success" style="width: 100%;margin: 0px;border-radius: 0;background-image: linear-gradient(to top, #4481eb 0%, #04befe 100%);"><i class="fa fa-pencil-square-o" aria-hidden="true" style="
           font-size: 12px"></i> Edit</button>
         </div>
        </a>
        <a href="{{ url('student/delete/'.$student->id)}}" style="width: 50%;">
         <div class="col" style="padding-right:  0;padding-left: 0;">
           <button type="button" class="btn btn-danger" style="width: 100%;margin: 0px;border-radius: 0;background-image: linear-gradient(-20deg, #fc6076 0%, #ff9a44 100%);"><i class="fa fa-trash" aria-hidden="true" style="
           font-size: 12px" style=""></i> Delete</button>
         </div>
        </a>
       </div>
    </div>
  @endforeach
<!-- Student Card End -->
   
    <!-- student list add-->
    
    <div class="col-md-4 mt-2 card-1 border-r-sm bg-st-li" style="max-width:360px !important; color: #565656;">
      <div class="text-center p-5">
        <a href="{{ url('student/register')}}">
          <i class="fas fa-plus-circle" style="font-size: 80px; color: #565656;"></i><br>
          <h2 style="color: #565656;">Add</h2>
        </a>
      </div>
    </div>


  </div>
  </div>
  <a href="">Go </a>
</div>
@endsection
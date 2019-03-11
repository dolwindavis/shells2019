@extends('layouts.main')
@section('title','SHELLS2k19 |Newsfeed')



@section('content')
<div class="container-fluid text-center bg-info text-light">
      <h2 class="p-2">New's  Update</h2>
   
</div>

<div class="container-fluid">
  <div class="container card">
    <div class="row ">
      <div class="col-md-12">
        <div class="container"> 
          <h2 style="padding-top: 10px;"><strong>{{$news->title}}</strong>
          </h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="container">
        <p class="" style="color:gray;">{{$news->date}}</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="container">
       <!-- <img src="https://s3.ap-south-1.amazonaws.com/shells2k19/website/images/home/slide1.jpg" width="100%" height="400px">-->
        </div>
      </div>
    </div>
       <div class="row mt-3">
      <div class="col-md-12">
        <div class="container" style="line-height: 32px;">
        <p style="font-size: 20px;">{{$news->body}} </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
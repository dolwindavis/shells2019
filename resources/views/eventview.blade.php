@extends('layouts.main')
@section('title','SHELLS2k19 | Event Details')

@section('content')

<style>
  .event-card {
    padding: 25px;
  }
  .event-logo {
    height: 120px;
    width: 120px;
    border-radius: 250px;
  }
  .card-1 h3 {
    color: black;
    font-size: 1.1rem;
    font-weight: 600;
  }
  .card-1 h5 {
    margin-top: -18px;
    margin-bottom: 20px;
    font-size: 1rem;
    color: #404142;
  }
</style>
<!-- Event details  page -->
<div class="container-fluid mt-5" style="padding: 0px; color: white; background: url('https://s3.ap-south-1.amazonaws.com/shells2k19/website/images/bg2.jpg'); background-size: 100%;">
  <div class="container content">
    <div class="row" style="padding: 100px 0px;">
      <!-- three columns -->
    @foreach($events as $event)
     <div class="col-md-3 event-card">
      
        <div class="container border-r-sm text-center card-1"  style="background: rgba(255,255,255,.8);">
          <img class="p-2 mt-3 event-logo" src="{{ $event->logo }}" height="200px" width="200px" ">
          <h3 class="p-2"><strong>{{$event->name}}</strong></h3>
          <h5 class="p-2">{{$event->info}}</h5>
          <a href="{{ url('/event/'.$event->slug)}}" style="margin: 0px auto 23px auto; border-radius: 20px; display: block;padding: 6px 5px;color: white;background-color: #e74c3c; width: 120px; font-size: .9rem; letter-spacing: 1px;">Know more</a>
        </div>
    
    </div>
    @endforeach
    <!-- <div class="col-md-4" style="">
      
        <div class="container border-r-sm text-center card-1"  style="background-image: radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%);padding-left: 0;padding-right: 0;color: darkblue;">
          <img class="p-2 mt-3" src="http://shells.kristujayanti.edu.in/images/event%20logos/QUIZLOGO1.png" height="200px" width="200px" ">
          <h3 class="p-2"><strong>Deep Web</strong></h3>
          <h5 class="p-2">Web Desiging</h5>
          <a href="" style="margin-top: 10px;display: block;padding:10px;color: white;background-color: #e74c3c;"><b>Know more....</b></a>
        </div>
    
      </div>
      <div class="col-md-4" style="">
      
        <div class="container border-r-sm text-center card-1"  style="background-image: radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%);padding-left: 0;padding-right: 0;color: darkblue;">
          <img class="p-2 mt-3" src="http://shells.kristujayanti.edu.in/images/event%20logos/QUIZLOGO1.png" height="200px" width="200px" ">
          <h3 class="p-2"><strong>Deep Web</strong></h3>
          <h5 class="p-2">Web Desiging</h5>
          <a href="" style="margin-top: 10px;display: block;padding:10px;color: white;background-color: #e74c3c;"><b>Know more....</b></a>
        </div>
    
      </div> -->
   
    </div>
  </div>
</div>

@endsection
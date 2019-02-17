@extends('layouts.main')
@section('title','SHELLS2k19 | Event Details')

@section('content')


<!-- Event details  page -->
<div class="container-fluid mt-5" style="padding: 0px; color: white;">
  <div class="container ">
    <div class="row">
      <!-- three columns -->
    @foreach($events as $event)
     <div class="col-md-4" style="">
      
        <div class="container border-r-sm text-center card-1"  style="background-image: radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%);padding-left: 0;padding-right: 0;color: darkblue;">
          <img class="p-2 mt-3" src="{{ $event->logo }}" height="200px" width="200px" ">
          <h3 class="p-2"><strong>{{$event->name}}</strong></h3>
          <h5 class="p-2">{{$event->info}}</h5>
          <a href="{{ url('/event/'.$event->slug)}}" style="margin-top: 10px;display: block;padding:10px;color: white;background-color: #e74c3c;"><b>Know more....</b></a>
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
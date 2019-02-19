@extends('layouts.main')
@section('title','SHELLS2k19 | Event Details')

@section('content')

<style>
.event-header {
  background: url("https://s3.ap-south-1.amazonaws.com/shells2k19/website/images/bg2.jpg");
  background-size: 100%;
}
.event-icon {
  border-radius: 200px;
}
.card-1 h3{
  text-transform: uppercase;
  padding: 0px;
  margin-bottom: -8px;
  font-size: 1.2rem;
  font-weight: 600;
  letter-spacing: 1px;
}
.card-1 h5 {
  font-size: 1rem;
}
</style>

<div class="container-fluid" style="padding: 0px;">
    <div class="bg-in-evt-det bg-light event-header"  >
    @foreach($events as $event)
      <div class="container text-dark border-r-sm text-center card-1" id="evt-icons" style="background-color: rgba(255,255,255,1); width: 300px; "> 
      <img class="p-4 mt-3 event-icon" src="{{ $event->logo  }}" >
      <h3 class="p-2">{{$event->name}}</h3>
      <h5 class="">{{$event->info}}</h5>
    </div>
    </div>
    
  </div>
  
    <div class="container-fluid" style="background-color: #f4f4f4; padding-top: 30px;">
      <div class="container">
        <div class="row ">
          <!--Event rules and details -->
          <div class="col-md-8 card-3 text-left text-dark p-5 border-r-sm"  style="border-radius: 0px;margin-top:120px; margin-bottom: 50px; background: linear-gradient(to bottom, #D5DEE7 0%, #E8EBF2 50%, #E2E7ED 100%), linear-gradient(to bottom, rgba(0,0,0,0.02) 50%, rgba(255,255,255,0.02) 61%, rgba(0,0,0,0.02) 73%), linear-gradient(33deg, rgba(255,255,255,0.20) 0%, rgba(0,0,0,0.20) 100%);
            background-blend-mode: normal,color-burn; ">
  
          <div class="row">
          <h4>Rules:</h4><br>
           {{$event->rules}}
          </div>
          </div>
        <!-- event head name pic and number -->
          <div class="col-md-4 card-3 text-light text-center p-5" style="border-radius: 0px; margin-top:120px; margin-bottom: 50px;background-image: linear-gradient(to right, #243949 0%, #517fa4 100%);">
            <h4 style="margin-bottom: 5px;">Student Coordinator</h4>
            <div class="" style="margin: auto; border-radius: 0px;">
              <img src="{{ $event->head_image  }}" style="border-radius: 5px; object-fit: cover;object-position: left; margin-bottom: 5px;"  width="140px" height="150px">
              <h4>{{$event->head_name}}</h4>
              <h6> {{$event->head_phone}}</h6>  
            </div>
          </div>
      </div>
      </div>
    </div>
@endforeach
@endsection
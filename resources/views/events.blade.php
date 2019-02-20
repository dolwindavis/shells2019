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
      <div class="container text-dark border-r-sm text-center card-1" id="evt-icons" style="background: rgba(255,255,255,1); width: 300px; "> 
      <img class="p-4 mt-3 event-icon" src="{{ $event->logo  }}" >
      <h3 class="p-2">{{$event->name}}</h3>
      <h5 class="">{{$event->info}}</h5>
    </div>
    </div>
    
  </div>
  
    <div class="container-fluid" style="background-color: #f4f4f4; padding-top: 150px;">
      <div class="container">
        <div class="row" >
          <!--Event rules and details -->
          <div class="col-md-8 card-3 text-left text-dark p-5 border-r-sm"  style="overflow: none; border-radius: 5px; margin-bottom: 50px; background: url('https://s3.ap-south-1.amazonaws.com/shells2k19/website/images/rules-bg.jpg'); background-size: 140%;">
  
          <div class="row ml-2" >

          {!!html_entity_decode($event->rules)!!}
          </div>
          </div>
        <!-- event head name pic and number -->
          <div class="col-md-4 card-3 text-light text-center p-5" style="border-radius: 5px; margin-bottom: 50px; background: url('https://s3.ap-south-1.amazonaws.com/shells2k19/website/images/coordinater-bg.jpg'); background-size: 150%;">
            <h4 style="margin-bottom: 5px; font-weight: 800; letter-spacing: 1px;">Student Coordinator</h4>
            <div class="" style="margin: auto; border-radius: 0px;">
              <img src="{{ $event->head_image  }}" style="border-radius: 2px; object-fit: cover;object-position: left; margin-bottom: 5px;"  width="130px" height="150px">
              <h4>{{$event->head_name}}</h4>
              <h6 style="margin-top: 8px; letter-spacing: 1.3px;"> {{$event->head_phone}}</h6>  
              <h6 style="letter-spacing: 1.2px;"> {{$event->head_mail}}</h6>  
            </div>
          </div>
      </div>
      </div>
    </div>
@endforeach
@endsection
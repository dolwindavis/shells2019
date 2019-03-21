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
        {!!html_entity_decode({{$news->body}})!!}
        </div>
      </div>
    </div>
</div>
@endsection

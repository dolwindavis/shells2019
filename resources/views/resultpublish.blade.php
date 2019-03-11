@extends('layouts.admin')
@section('title','SHELLS2k19 | Admin')

@section('content')

    <!-- Header -->
    <div class="header pb-8 pt-2 pt-md-5">
     
      <div class="container">
         
        <div class="header-body">
          <h1 class="text-center text-white">RESULTS</h1>
          <!-- Card stats -->
          <div class="row">
              <div class="col-md-6" style="margin: 10px auto;">
                <div class="card" style="min-height: 200px; text-align: left;">
                    <div class="card-body">
                        <h1 class="card-title" style="margin-bottom: 0px;">{{$event->name}}</h4>
                        <h5 class="card-title">{{$round}}</h5>
                        <form action="{{url('admin/result/publish')}}" method="post" >
                        @csrf
                        @for($i=1;$i<=$no;$i++)
                        <div class="form-group col-md-12" style="padding-left:0px;">
                        <div class="row mx-auto" id="student_no">
                                 <label>
                                  <select id="inputState" class="form-control" name="{{'student'.$i}}">
                                          <option selected value="">Select Student </option>
                                          @foreach($students as $student)
                                          <option value="{{$student->group_id}}">{{$student->name}}</option>
                                          @endforeach
                                  </select>
                                  </label>         
                       </div>
                        @endfor
                        <input type="hidden" value="{{$eventid}}" name= "eventid">
                        <input type="hidden" value="{{$event->name}}" name= "eventname">
                        <input type="hidden" value="{{$round}}" name= "round">
                        <input type="hidden" value="{{$no}}" name= "no">
                        <input type="hidden" value="{{$eventtype}}" name= "eventtype">
                            <!--<input type="Name" class="form-control" id="inputEmail4" placeholder="Name">-->                        
                       <button type="submit" class="btn btn-success mt-5"> Publish </a>
                       </form>
                    </div>
                  </div>
                </div>    
          </div>
          

        </div>
      </div>
    </div>

    </div>
  </div>

@endsection

@extends('layouts.main')
@section('title','SHELLS2k19 | Students Event')

@section('content')

@if(session('same'))
  <script>
  Swal.fire(
  'No Duplication On Participants!',
  '#GameOn!',
  'error'
)
  </script>
@elseif(session('badrequest'))
<script>
Swal.fire(
'Fill Your Form Curectly!',
'#GameOn!',
'error'
)
</script>
@elseif(session('count'))
  <script>
  Swal.fire(
  'Check Your Participants Participants Count!',
  '#GameOn!',
  'error'
)
  </script>
@elseif(session('otr'))

  <script>
  Swal.fire(
  'Your College is already registered!',
  '#GameOn!',
  'error'
)
  </script>
@elseif(session('max'))
<script>
Swal.fire(
'Registration id Reached Maximum!',
'#GameOn!',
'error'
)
</script>
@endif
<!-- Sign in page -->
 
<!-- Sign in page -->
<div class="container-fluid" style="padding: 0px;">
  <div style=" height:400px; width: 100%; background-color: #03a9f4; object-fit: cover; object-position: center;"  >
    <img src="https://s3.ap-south-1.amazonaws.com/shells2k19/website/images/80910.jpg" width="100%" height="100%" style="object-fit: cover; object-position: bottom;">
  </div>
</div>
<div class="container text-center card-2 border-r-sm" id="card-register-in">


  <!-- student Registration form -->

  <form method="POST" action="/student/event/register">
  @csrf
  <!--Name details -->
<div class="row p-4" style="background-image: linear-gradient(to top, #4481eb 0%, #04befe 100%);position: relative;top:-20px;">
                   
        <div class="bg-dark text-light pt-5" style="position: relative;top: 40px;width: 50%;margin: 10px auto;border-radius: 5px;">
            <img src="{{$event->logo}}" height="100px" id="logo"  width="100px">
                <h5 class="pt-2" >
                    <strong id="eventname">{{ $event->name }}</strong>
                </h5>
                <p>{{ $event->info }} </p> 
        </div>
</div>

<div class="row p-4">
        @if($event->groupevent==1)
                @for($i=1;$i<=$event->groupnumber;$i++)
                <div class="row mx-auto" id="student_no"> 
                        <div class="selectdiv"  >
                                <label>
                                <select id="studentselect" name="{{'student'.$i}}">
                                        <option selected value="">Select Student </option>
                                        @foreach($students as $student)
                                        <option value="{{$student->id}}">{{$student->name}}</option>
                                        @endforeach
                                </select>
                                </label>
                        </div>
                </div>
                @endfor
        @else
                <div class="row mx-auto" id="student_no"> 
                        <div class="selectdiv"  >
                                <label>
                                <select id="studentselect" name="student1">
                                        <option selected value="">Select Student </option>
                                        @foreach($students as $student)
                                        <option value="{{$student->id}}">{{$student->name}}</option>
                                        @endforeach
                                </select>
                                </label>
                        </div>
                </div>
        @endif
</div>
<input type="hidden" value="{{$event->id}}" name="eventid"/>
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
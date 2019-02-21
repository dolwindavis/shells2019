@extends('layouts.main')
@section('title','SHELLS2k19 | Event Details')

@section('css-style')
<style>
    
.card {
    width: 100%;
    height: 100%;
    position: absolute;
    margin:0px auto;
    padding:0px !important;
    -webkit-transition: -webkit-transform 1s;
    -moz-transition: -moz-transform 1s;
    -o-transition: -o-transform 1s;
    transition: transform 1s;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -o-transform-style: preserve-3d;
    transform-style: preserve-3d;
    -webkit-transform-origin: 50% 50%;
}
.card div {
    display: block;
    height: 100%;
    width: 100%;
    color: white;
    text-align: center;
    font-weight: bold;
   left:-30px;
    position: absolute;
    padding-top:50%;
    margin:0px !important;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -o-backface-visibility: hidden;
    backface-visibility: hidden;
}
.card .front {
    
/* background-image: linear-gradient(to top, #fad0c4 0%, #ffd1ff 100%); */
    background: #ddd;
    color: #565656;
}
.card .back {
    /* background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%); */
    -webkit-transform: rotateY( 180deg );
    -moz-transform: rotateY( 180deg );
    -o-transform: rotateY( 180deg );
    transform: rotateY( 180deg );
    color: #565656;
}
.card.flipped {
    left:0px;
    position: absolute;
    -webkit-transform: rotateY( 180deg );
    -moz-transform: rotateY( 180deg );
    -o-transform: rotateY( 180deg );
    transform: rotateY( 180deg );
}
button.btn
{
    position:absolute;
    bottom:0;
    margin:0;
    left:0;
}
.close-btn
{
    background-color:#e74c3c;
    padding:.4em .8em;
    cursor: pointer;    
    border:none;
    border-radius:50%;
    color:white;
    position: absolute;
    right:-5px;
    top:-15px;
    z-index:99;
}
</style>
@endsection

@section('content')

<div class="container mb-5 " style="margin-top: 100px; ">
    <h3 class="p-3">Event Registration</h3>



    <div class="container" style="box-sizing: border-box;">
      <div class="row text-center text-light" id="addcol" style="box-sizing: border-box;">

            {{-- card design start --}}
        @foreach($results as $result)
            <div class="col-md-4 m-2 card-1 border-r-sm" style="min-width:300px;min-height:460px;overflow:visible;">
                {{-- delete card code --}}
                <form action="/student/event/delete" method="post">
                    @csrf   
                    <input type='hidden' name="groupid" value="{{$result->groupid}}"/>
                    <input type='hidden' name="eventid" value="{{$result->eventid}}"/>
                    <button type="submit" class="close-btn"> <i class="fa fa-times" aria-hidden="true"></i> </button>
                </form>
                <div class="row" style="background-image: linear-gradient(to top, #4481eb 0%, #04befe 100%);position: relative;top:-20px;">
                   
                    <div class="bg-dark text-light pt-5" style="position: relative;top: 40px;width: 50%;margin: 10px auto;border-radius: 5px;">
                        <img src="{{$result->eventlogo}}" height="100px" id="logo"  width="100px">
                            <h5 class="pt-2" >
                                <strong id="eventname">{{ $result->eventname }}</strong>
                            </h5>
                            <p>{{$result->eventinfo }}</p>
                    </div>
                </div>
            <form id="form1" action="/student/event/edit" method="get">
            @csrf
            <div class="row text-center" style="margin-top: 20px; padding: 0px 5px;" id="student_no">
            @foreach($result->students as $student)
                    <span class="badge badge-success p-3 col" style="margin: 3px 3px; background: #ddd; color: #565656">{{ $student->name  }}</span>
                    <input type="hidden" value="{{$student->id}}" name="student">
                    
            @endforeach
            </div>
            
            <div class="row" style="positon: relative;">
            <div class="col" style="padding-left: 0;padding-right: 0; position: absolute; bottom: 0;right: 0px;">
            <input type="hidden" value="{{$result->eventid}}" name="eventid">
            <input type="hidden" value="{{$result->groupid}}" name="groupid">
            <button type="submit" class="btn btn-success" style="position: absolute; bottom: 0px; right: 0px;color: #565656;width: 10%;margin: 0px;border-radius: 0;background: transparent; box-shadow: none;" >
            <i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 12px" >
        </i> Edit</button>
        </div>
        </form>
        
        </div>
        </div> 
    @endforeach
 {{-- card design end --}}
    {{-- card design start --}}

    <div class="col-md-4 m-2 card-1 border-r-sm" style="max-width:350px;height:460px;">
        <!--add new card-->
        <section class="container">
            <div class="card" >
              <div class="front">
                <div class="text-center p-0 pl-5" onclick="flip()">
                <i class="fas fa-plus-circle" style="font-size: 50px; color: #565656;"></i><br>
                <h2 style="color: #565656;">Add Event</h2>
              </div>
            </div>
              <div class="back" style="width:100%;position:absolute;left:0px;">
                  <h4 style="color: #565656;">Select event you like to participate.</h4>
                  <form action="/student/register/event" method="POST">
                  @csrf
                    <div class="selectdiv" style="padding: 5px 0px 0px 10px;">
                            <label>
                                <select id="eventselect" name="id">
                                    <option selected value="">Select Event </option>
                                    @foreach($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                                    @endforeach
                                    <!--<option value="Option 2">Option 2</option>-->
                                </select>
                            </label>
                          </div>
                          <button type="submit" class="btn btn-success" style="box-shadow:none; width: 50%;position:absolute;bottom:10px; left: 25%; background: #ddd; color: #565656; letter-spacing: 1px; font-weight: 600;" id="btnadd">ADD</button>
              </div>
            </form>
            </div>
          </section>
        
     </div>
{{-- card design end --}}
  {{-- card design start --}}
  {{-- <div class="col-md-4 m-2 card-1 border-r-sm" style="max-width:350px"><div class="row" style="background-image: linear-gradient(to top, #4481eb 0%, #04befe 100%);"><div class="bg-dark text-light pt-5" style="position: relative;top: 40px;width: 50%;margin: 10px auto;border-radius: 5px;"><img src="static/img/hom/person.png" height="100px" id="logo"  width="100px"><h5 class="pt-2" ><strong id="eventname"></strong></h5><p id="event_info"></p></div></div><form id="form1">@csrf<div class="row" style="margin-top: 50px;" id="student_no"></div></form><div class="row"><div class="col" style="padding-left: 0;padding-right: 0;"><button type="button" class="btn btn-success" style="width: 100%;margin: 0px;border-radius: 0;background-image: linear-gradient(to top, #4481eb 0%, #04befe 100%);"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 12px"></i> Edit</button></div><div class="col" style="padding-right:  0;padding-left: 0;"><button type="button" class="btn btn-danger" id="savebtn" style="width: 100%;margin: 0px;border-radius: 0;background-image: linear-gradient(to top, #9be15d 0%, #00e3ae 100%);"><i class="fa fa-save" aria-hidden="true" style="font-size: 12px"></i> Save</button></div></div></div> --}}
  {{-- card design end --}}  
       
      
    </div>
    </div>
   
  </div>
  <script>
  function flip() {
    $('.card').addClass('flipped');
}
</script>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
  </script>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>


  <script>
    // var select_tag="";
    // var student_list="";
    // //   create card code
    //   function create_card(results,studentslist)
    //   {
    //     select_tag="";
    //     student_list="";
    //                    for(var j=0;j<studentslist.length;j++)
    //                       {
    //                         student_list+='<option value="'+studentslist[j].id+'">'+studentslist[j].name+'</option>';
    //                     }
    //                     for(var i=0;i<results.students;i++)
    //                     {
                           
    //                         select_tag+='<div class="selectdiv"><label><select id="selectbox'+i+'">'+student_list+'</select></label></div>';
                               
    //                     }
    //     $(document).ready(function(){
    //     $('#addcol').append('<div class="col-md-3 m-2 card-1 border-r-sm" style="min-width:300px;min-height:450px;"><div class="row" style="background-image: linear-gradient(to top, #4481eb 0%, #04befe 100%);"><div class="bg-dark text-light pt-5" style="position: relative;top: 40px;width: 50%;margin: 10px auto;border-radius: 5px;"><img src="'+results.logo+'" height="100px" id="logo"  width="100px"><h5 class="pt-2" ><strong id="eventname">'+results.name+'</strong></h5><p >'+results.info+'</p></div></div><form id="form1">@csrf<div class="row" style="margin-top: 50px;" id="student_no"> '+select_tag+' </div></form><div class="row" ><div class="col" style="padding-left: 0;padding-right: 0;"><button type="button" class="btn btn-success" style="width: 100%;margin: 0px;border-radius: 0;background-image: linear-gradient(to top, #4481eb 0%, #04befe 100%);" ><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 12px" ></i> Edit</button></div><div class="col" style="padding-right:  0;padding-left: 0;"><button type="button" class="btn btn-danger" id="savebtn" style="width: 100%;margin: 0px;border-radius: 0;background-image: linear-gradient(to top, #9be15d 0%, #00e3ae 100%);" ><i class="fa fa-save" aria-hidden="true" style="font-size: 12px" ></i> Save</button></div></div></div>');
        
    //     $("#savebtn").click(function(event){
    //       event.stopPropagation();
    //       event.stopImmediatePropagation();
    //         var sid=[];
    //             for(var i=0;i<results.students;i++)
    //                     {
    //                          sid[i]=$('#selectbox'+i).val();
    //                     }
    //         $.ajaxSetup({
    //            headers: {
    //                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //            }
    //        });
    //         $.ajax({
    //            url: "{{ url('/student/event/register') }}",
    //            method: 'get',
    //            data: {
    //                     eventid:results.id,
    //                     studentid:sid,
    //            },
    //            success: function(response){
    //                 console.log(response);
    //               }});
    //     });
    //     });
    //     console.log(results,studentslist);
        
    //   }

    //     // selection in card code
    // //   function selectno(result,students)
    // //   { 
    // //     $(document).ready(function(){
    // //                     $('div#student_no').append(' <div class="selectdiv"><label><select id="selectbox"><option selected value="">Select Box </option>'+students(students)+'</select></label></div>');
    // //     });
    // //   }

   


    //  $(document).ready(function(){
       
    //       // ajax request for addbtn
    //     $('#btnadd').click(function(e){
            
    //         e.preventDefault();
    //         $.ajaxSetup({
    //            headers: {
    //                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //            }
    //        });
    //         $.ajax({
    //            url: "{{ url('/event/details') }}",
    //            method: 'get',
    //            data: {
    //             id:$('#eventselect').val(),
    //            },
    //            success: function(result){
    //                    var results=result;
    //                     $.ajaxSetup({
    //                          headers: {
    //                                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //                                 }
    //                                 });
    //                                 $.ajax({
    //                                 url: "{{ url('/event/students/list') }}",
    //                                 method: 'get',
    //                                 data: {
    //                                         id:$('#eventselect').val(),
    //                                 },
    //                                 success: function(studentslist){
    //                                             create_card(results,studentslist);
                                               
    //                                             // students(students);
    //                                     }}); 
    //               }});
    //         });

    //         // student in a particular event details
      

            
    //         // ajax request for savebtn
            
    //      });
    </script>


@endsection
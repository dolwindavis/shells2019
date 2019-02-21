<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Helpers\Helper;
use App\Models\EventStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    function eventDetails(Request $request)
    {

        if(!$request->id){

            return back();

        }

        $eventid = $request->id;


        $event=Events::where('id',$eventid)->first();

        // $payload=collect();

        // $payload->put('id',$event->id);
        // $payload->put('name',$event->name);
        // $payload->put('logo',$event->logo);
        // $payload->put('info',$event->info);

        // if($event->groupevent == '1'){

        //     $payload->put('students',$event->groupnumber);

        // }
        // else{

        //     $payload->put('students','1');
        // }
        
        $students=$this->eventParticipant($eventid);
        
        return view('student_event',compact('event','students'));

    }

    function eventParticipant($eventid)
    {
       
        
        $helper = new Helper;

        $student = $helper->studentSort($eventid);

        // $user=Auth::user();

        // $student=$user->student()->select('name','id')->get();

        return $student;

    }


    //register an event for the student
    public function eventRegister(Request $request)
    {
        

        $studentid=[];

        // $studentid=$request->studentid;

        $eventid=$request->eventid;

        $user=Auth::user();

        //evennt details
        $event=Events::find($request->eventid);

        if($event->groupevent == 1){

            for($i=1;$i<=$event->groupnumber;$i++){

                $variablename='student'.$i;
                $studentid[$i-1]=$request->$variablename;

            }

        }
        else{
            $studentid[0]=$request->student1;
        }

        //checking a student eligible for ragistering
        for($i=0;$i<= count($studentid)-1;$i++){

            $eventstudent=EventStudent::where([['student_id',$studentid[$i] ],['event_id',$eventid]])->get();

            //checking for exclusive event validation
            if($event->exclusive == '1' && $eventstudent->isNotEmpty()){

                return response('exclusive event validation');

            }

        }

        $eventstudent=EventStudent::where([['college_id',$user->id],['event_id',$eventid]])->get();
 
        //checking college already registered or not
        if($event->groupevent == '1' && $eventstudent->isNotEmpty()){

            return response('college already registered in this event');

        }
        //checking individual event registraion validation
        elseif($event->maxnumber <= $eventstudent->count() && $event->groupevent == '0'){

            return response('individual registration max');

        }
        //checking whether request has same number of students or not for an event
        elseif($event->groupevent == '1' && (count($studentid) != $event->groupnumber)){

            return response('groupevent number validation');

        }
        elseif(count($studentid) !== count(array_unique($studentid))){

            return response('same participants can not be repeated');
        }

        if($event->groupevent == '1'){

            $request->groupid=str_random(6);

        }
        else{

            $request->groupid=str_random(6);

        }
        
        for($i=0;$i<=count($studentid)-1;$i++){

            $newevent=new EventStudent;
            $request->studentsid=$studentid[$i];
            $newevent->registerEventStudent($request);
        }

        session()->flash('register','Success');
        return redirect('/events/register');

    }

    public function eventEditView(Request $request)
    {

        $studentid=$request->student;
        $eventid=$request->eventid;
        $groupid=$request->groupid;

        $event=Events::find($eventid);
        $helper = new Helper;

        $students = $helper->studentSorts($eventid);


        return view('studenteventedit',compact('event','students','groupid'));
         
    }


    public function eventEdit(Request $request)
    {   
        
        $studentid=[];

        // $studentid=$request->studentid;

        $eventid=$request->eventid;
        $groupid=$request->groupid;

        $user=Auth::user();

        //evennt details
        $event=Events::find($request->eventid);

        if($event->groupevent == 1){

            for($i=1;$i<=$event->groupnumber;$i++){

                $variablename='student'.$i;
                $studentid[$i-1]=$request->$variablename;

            }

        }
        else{

            $studentid[0]=$request->student1;
        }

        //checking a student eligible for ragistering
        // for($i=0;$i<= count($studentid)-1;$i++){

        //     $eventstudent=EventStudent::where([['student_id',$studentid[$i] ],['event_id',$eventid]])->get();

        //     //checking for exclusive event validation
        //     if($eventstudent->isNotEmpty()){

        //         return redirect()->back();

        //     }

        // }

        $eventstudent=EventStudent::where([['college_id',$user->id],['event_id',$eventid],['group_id',$groupid]])->get();
        
        if($eventstudent->isEmpty()){

            return redirect()->back();

        }

        //checking whether request has same number of students or not for an event
        if($event->groupevent == '1' && (count($studentid) != $event->groupnumber)){

            session()->flash('count','Success');
            return back();

        }
        elseif(count($studentid) !== count(array_unique($studentid))){

            session()->flash('same','Success');
            return back();
        }

        
        foreach($eventstudent as $key=> $es){

            $es->student_id = $studentid[$key];
            $es->save(); 
            
        }

        session()->flash('update','Success');
        return redirect('/events/register');
        
    }
    public function eventDelete(Request $request){

        $eventid=$request->eventid;

        $groupid =$request->groupid;
        
        $user=Auth::user();

        $events=DB::table('eventstudent')->where([['college_id',$user->id],['event_id',$eventid],['group_id',$groupid]])->delete();

        session()->flash('delete','Success');
        return redirect('/events/register');

    }
}

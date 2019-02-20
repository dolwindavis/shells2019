<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Helpers\Helper;
use App\Models\EventStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    function eventDetails(Request $request)
    {
        $eventid = $request->input('id');
        
        $event=Events::find($eventid);

        
        $payload=collect();

        $payload->put('id',$event->id);
        $payload->put('name',$event->name);
        $payload->put('logo',$event->logo);
        $payload->put('info',$event->info);

        if($event->groupevent == '1'){

            $payload->put('students',$event->groupnumber);

        }
        else{

            $payload->put('students','1');
        }
        return response()->json($payload);

    }

    function eventParticipant(Request $request)
    {
        $eventid = $request->input('id');
        
        $helper = new Helper;

        $student = $helper->studentSort($request,$eventid);

        // $user=Auth::user();

        // $student=$user->student()->select('name','id')->get();

        return response()->json($student);

    }


    //register an event for the student
    public function eventRegister(Request $request)
    {
        $studentid=$request->studentid;

        $eventid=$request->eventid;

        $user=Auth::user();

        //evennt details
        $event=Events::find($request->eventid);

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

            $request->groupid=str_random(4);

        }
        else{

            $request->groupid='0';

        }
        
        for($i=0;$i<=count($studentid)-1;$i++){

            $newevent=new EventStudent;
            $request->studentsid=$studentid[$i];
            $newevent->registerEventStudent($request);
        }

        return response('true');

    }
}

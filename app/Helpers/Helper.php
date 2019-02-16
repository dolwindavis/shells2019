<?php

namespace App\Helpers;

use App\Models\Events;
use App\Models\Student;
use App\Models\EventStudent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class Helper
{

    public function eventListSort()
    {
        $user=Auth::user();

        $events=Events::all();

        foreach($events as $key=>$event){

            $eventstudent=EventStudent::where('event_id',$event->id)->get();

            if($eventstudent->isNotEmpty()){
                // if($event->exclusive == '1'){

                //     $events->forget($key);
                //     continue;

                // }
                if($event->groupevent =='1'){

                    $events->forget($key);
                    continue;

                }
                elseif($event->groupevent == '0' && $event->maxnumber <= $eventstudent->count()){

                    $events->forget($key);
                    continue;

                }

            }
        }
        return $events;

    }

    public function studentSort($request)
    {
        $user=Auth::user();
        $sortedstudents =[];
        $i=0;
        $students=$user->student()->select('name','id')->get();

        foreach($students as $key =>  $student){
                
                $eventstudent = EventStudent::where('student_id',$student->id)->get();

                if($eventstudent->isNotEmpty()){

                    foreach($eventstudent as  $es){

                        $event=Events::where('id',$es->event_id)->first();

                        if($event->exclusive == '1'){

                            $students->forget($key);
                            continue;
                        }
                    }

                }
                $sortedstudents[$i]=$student;
                $i++;
        }
        return $sortedstudents;

    }

}
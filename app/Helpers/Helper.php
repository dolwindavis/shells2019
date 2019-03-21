<?php

namespace App\Helpers;

use App\Models\Events;
use App\Models\Student;
use App\Models\EventStudent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class Helper
{

      /**
     * Sorting an Event for the College
     * It involes events that Are Specified by the Organisers 
     *
     * @Params Auth::user
     * 
     * @return Models/Event Collection
     */
    public function eventListSort()
    {
        $user=Auth::user();

        $events=Events::all();

        foreach($events as $key=>$event){

            //getting the event Registraton details
            $eventstudent=EventStudent::where([['event_id',$event->id],['college_id',$user->id]])->get();

            //checking the event registered or nos
            if($eventstudent->isNotEmpty()){

                //if an group event is registered onece it can not be registered again
                if($event->groupevent =='1'){

                    $events->forget($key);
                    continue;

                }
                //if an event is individual checking whther its reached maximum registration
                elseif($event->groupevent == '0' && $event->maxnumber <= $eventstudent->count()){

                    $events->forget($key);
                    continue;

                }

            }
        }
        return $events;

    }


     /**
     * Sort Students that are registered for the event.
     * eligibility is according to the rules specified by the organisers
     * exclusive is considered here so we need to add that condition if it needs to be checked
     *
     * @Params id=>eventid
     * 
     * @return Models/Student Collection
     */

    public function studentSort($eventid)
    {
        $user=Auth::user();
        $sortedstudents =[];
        $i=0;

        //getting student details of the college
        $students=$user->student()->select('name','id')->get();

        //checking whether the college has student or not
        if($students->isEmpty()){

            session()->flash('failure','Success');

            return redirect('events/register');

        }

        //getting the event based on the event id
        $currentevent=Events::where('id',$eventid)->first();


        foreach($students as $key =>  $student){
                
                //getting the details if a student is already registered to that event already
                $eventstudent = EventStudent::where('student_id',$student->id)->get();

                $flag=0;

                //checking whether student registerd ti this event
                if($eventstudent->isNotEmpty()){


                    foreach($eventstudent as  $es){

                        $flag=0;
                        
                        $event=Events::where('id',$es->event_id)->first();

                        //checking whether event is exclusive or not
                        if($event->exclusive == '1' || $es->event_id == $eventid || $currentevent->exclusive == '1'){

                            $flag=1;
                            
                        }
                    
                    }

                    //removing the student from the collection
                    if($flag==1){

                        $students->forget($key);
                        continue;
                    }

                }
      
        }
        return $students;
    }

    /**
     * Sort Students for editing the events
     *
     * @Params eventid
     * 
     * @return Models/Student Collection
     */
    public function studentSorts($eventid)
    {
        $user=Auth::user();

        $i=0;
        $students=$user->student()->select('name','id')->get();

        if($students->isEmpty()){

            session()->flash('failure','Success');

            return redirect('events/register');

        }
        return $students;

    }
    
    /**
     *Registered Event Details For a  Particular College
     * 
     * @Params 
     * 
     * @return Collection
     */
    public function eventRegisterDetails()
    {
        $user =Auth::user();

        $events=Events::all();

        //retrieving the details of event registration for the college
        $eventstudents=EventStudent::where('college_id',$user->id)->get();

        $result = collect();

        foreach($events as $key => $event){

            //checking the event group event or not
            if($event->groupevent == 1){
                $subresult =collect();

                $students = collect();
            }
            foreach($eventstudents as $key => $eventstudent){
                
                if($event->id == $eventstudent->event_id){

                    if($event->groupevent == 1){

                        //creating collection for storing student details of group event
                        //its because for a group event there will be more than one student
                        $substudent = collect();

                        $student = Student::find($eventstudent->student_id);
                       
                        $substudent->name = $student->name;
                        $substudent->id = $student->id;
                        //pushing the details of each student to a main collection which creates an array of collections
                        $students->push($substudent);
                        $subresult->groupid=$eventstudent->group_id;

                    }
                    //if it  is an individual event there would be only one student
                    else{

                        $subresult =collect();

                        $students = collect();
                        $substudent = collect();

                        $student = Student::find($eventstudent->student_id);
                       
                        $substudent->name = $student->name;
                        $substudent->id = $student->id;

                        $students->push($substudent);

                        $subresult->groupid=$eventstudent->group_id;
                        $subresult->eventname =$event->name;
                        $subresult->eventlogo=$event->logo;
                        $subresult->eventinfo=$event->info;
                        $subresult->eventid=$event->id;
                        $subresult->students=$students;

                        //pushing to main collection that has all the details along eih student details
                        $result->push($subresult);
                        
                    }

                }
            }
            if($event->groupevent == 1){
                if($students->isEmpty()){

                    continue;

                }
                $subresult->eventname =$event->name;
                $subresult->eventlogo=$event->logo;
                $subresult->eventinfo=$event->info;
                $subresult->eventid=$event->id;
                $subresult->students=$students;
                  //pushing to main collection that has all the details along eih student details
                $result->push($subresult);
            }
        }
        return $result;
    }





    
}
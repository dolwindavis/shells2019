<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Helpers\Helper;
use App\Models\Student;
use App\Models\EventStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    function homeView() {
        return view('home');
    }

    function loginView() {
        return view('login');
    }

    function registerView() {
        return view('register');
    }

    function studentlistView() {
        
        
        return view('studentlist');
    }

    public function eventsView(Request $request)
    {
        $events = Events::all();
        return view('eventview',compact('events'));


    }

    function studentAddView() {

        $student =new Student();

        $student->name=null;
        $student->phone=null;
        $student->gender=null;
        $student->email=null;
        $student->course=null;
        $student->reg_no=null;

        return view('studentadd',compact('student'));
    }

    function eventlistView() {

        // // $events=Events::select('name','id')->get();
        $user=Auth::user();

        $helper = new Helper;

        $events=$helper->eventListSort();

//         $eventstudent =DB::table('eventstudent')
//                         ->join('students','eventstudent.student_id','=','students.id')
//                         ->join('events','eventstudent.event_id','=','events.id')
//                         ->select('events.id as eid','events.*','students.name as sname','students.id as sid','eventstudent.*')->get();

//         $result=collect();

//         foreach($eventstudent as $es){

//             $subresult=collect();

//             $subresult->eventname=$es->name;
//             $subresult->eventlogo=$es->logo;
//             $subresult->eventid=$es->eid;
//             $subresult->eventinfo=$es->info;
//             $groupid=$es->group_id;
//             if($es->groupevent == '1'){
                
//                 $students =collect();
//                 foreach ($eventstudent as $key => $student) {

//                     $substudents=collect();

//                     if($student->group_id == $groupid){

//                         $substudents->name=$student->sname;
//                         $substudents->id=$student->sid;

//                         $students->push($substudents);

//                         $eventstudent->pull($key);
//                     }

//                 }
//                 $subresult->students=$students;
//             }
//             else{

//                $subresult->studentname=$es->sname;
//                $subresult->studentid=$es->id;

//             }
//             $result->push($subresult);
//         }
//         // dd($result);
//         return view('eventlist',compact('events'));
        $results=$helper->eventRegisterDetails();
        
        return view('eventlist',compact('events','results'));
    }

    function eventdetailsView(Request $request,$slug) {



        $events=Events::where('slug',$slug)->get();

        if($events->isEmpty()){

            return redirect('/events');

        }
        return view('events',compact('events'));
    }


    public function editStudentView($studentid)
    {
        $student=Student::find($studentid);

        return view('studentadd',compact('student'));
    }
    //text function
    public function addEvent()
    {
        return view('student_event');
    }

    public function college_reports()
    {

        return view('college-reports');
    }


}

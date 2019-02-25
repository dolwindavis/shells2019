<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Events;
use App\Helpers\Helper;
use App\Models\College;
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
        $colleges=College::all();

        foreach($colleges as $college){
            $student=$college->studentDetails();

            $count =$student->count();

            $coding =EventStudent::where([['college_id',$college->id],['event_id','3']])->count();

            $college->studentfee=$count*120;

            $college->codingfee=$coding*200;

            $college->totalfee=$college->studentfee+$college->codingfee;

        }
        // dd($colleges);
        return view('exports.college-reports',compact('colleges'));
    }

    public function event_reports()
    {
        $events=Events::all();
        return view('exports.event-reports',compact('events'));
    }

    public function collegeDelete(Request $request){

        $collegeid=$request->collegeid;

        DB::beginTransaction();

        try{
            $eventstudent=EventStudent::where('college_id',$collegeid)->delete();

            $student=Student::where('college_id',$collegeid)->delete();

            $college=College::where('user_id',$collegeid)->delete();

            $user=User::where('id',$collegeid)->delete();
            DB::commit();
        }
        catch(Exception $e){

            //rollback the transactions if any error occur
            DB::rollBack();
            return back();

        }

        return back();

    }


}

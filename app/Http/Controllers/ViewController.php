<?php

namespace App\Http\Controllers;

use App\Models\News;
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
    /**
    * Rendering Home View
    *
    * @params 
    * 
    * @return  View with news
    */
    function homeView() {

        //checking for the admin or user login
        if(Auth::user() &&  Auth::user()->username == 'admin'){

           return  redirect('/admin/home');

        }

        $news = News::latest()->get();
        
        return view('home',compact('news'));
    }

    /**
    * Rendering Login View
    *
    * @params 
    * 
    * @return  View with news
    */
    function loginView() {

        return view('login');
    }


     /**
    * Rendering register View
    *
    * @params 
    * 
    * @return  View with news
    */
    function registerView() {

        return view('register');
    }


     /**
    * Rendering Student Details for a college View
    *
    * @params 
    * 
    * @return  View with news
    */
    public function studentDetails(Request $request)
    {
        $user=Auth::user();

        $students=$user->student()->get();

        return view('studentlist',compact('students'));

    }

    /**
    * Rendering Events View
    *
    * @params 
    * 
    * @return  View 
    */
    public function eventsView(Request $request)
    {
        $events = Events::all();
        return view('eventview',compact('events'));


    }
 
     /**
    * Add Students For the College view
    *
    * @params 
    * 
    * @return  View 
    */
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

     /**
    * Event Registered Detials For A college
    *
    * @params 
    * 
    * @return  View 
    */
    function eventlistView() {

        $user=Auth::user();

        $helper = new Helper;

        $events=$helper->eventListSort();

        $results=$helper->eventRegisterDetails();

        return view('eventlist',compact('events','results'));
    }


     /**
    *Event details View With Slug 
    *
    * @params 
    * 
    * @return  View 
    */
    function eventdetailsView(Request $request,$slug) {

        $events=Events::where('slug',$slug)->get();

        if($events->isEmpty()){

            return redirect('/events');

        }
        return view('events',compact('events'));
    }

     /**
    * Edit Students For the College view with student details
    *
    * @params 
    * 
    * @return  View 
    */

    public function editStudentView($studentid)
    {
        $student=Student::find($studentid);

        return view('studentadd',compact('student'));
    }


     /**
    * College Report detail View in Admin Panel
    *
    * @params 
    * 
    * @return  View 
    */
    public function college_reports()
    {
        $colleges=College::all();

        foreach($colleges as $college){

            $student=$college->studentDetails();

            $count =$student->count();

            $coding =EventStudent::where([['college_id',$college->user_id],['event_id','3']])->count();

            $college->studentfee=$count*120;

            $college->codingfee=$coding*200;

            $college->totalfee=$college->studentfee+$college->codingfee;

            $college->payment=User::where('id',$college->user_id)->value('payment');

        }
        return view('exports.college-reports',compact('colleges'));
    }


    /**
    * Event Report detail View in Admin Panel
    *
    * @params 
    * 
    * @return  View 
    */
    public function event_reports()
    {
        $events=Events::all();

        return view('exports.event-reports',compact('events'));
    }


     /**
    * Delete a College if payment is not done
    *
    * @params 
    * 
    * @return  View 
    */
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

     /**
    * Manual Payment Through Admin Panel
    *
    * @params 
    * 
    * @return  View 
    */
    public function adminPayment(Request $request)
    {
        $userid=$request->userid;

        $user=User::where('id',$userid)->first();

        $user->payment=1;

        $user->save();

        return back()->with('sucess','sucess');
    }

}

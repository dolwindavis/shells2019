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

        $results=$helper->eventRegisterDetails();
        
        return view('eventlist',compact('events','results'));
    }

    function eventdetailsView(Request $request,$slug) {


        $events=Events::where('slug',$slug)->get();


        return view('events',compact('events'));
    }


    public function editStudentView($studentid)
    {
        $student=Student::find($studentid);

        return view('studentadd',compact('student'));
    }


}

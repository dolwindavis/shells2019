<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Events;
use App\Models\Student;
use App\Models\ResultsMain;
use App\Models\EventStudent;
use Illuminate\Http\Request;
use App\Models\ResultsStudents;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    /**
    * Rendering Reuslt Register View Using the details From the Admin View
    *
    * @params 
    * 
    * @return  View
    */
    public function resultRegisterView(Request $request)
    {   

        if(!$request->no || !$request->round){
            return back();
        }
        $eventid=$request->eventid;
        $event=Events::where('id',$eventid)->first();
        $round=$request->round;
        $eventtype=$request->eventtype;
        $no=$request->no;

        //checking for eventtype validation
        if(($event->groupevent == 1 && $eventtype!='group')||($event->groupevent == 0 && $eventtype != 'individual')){

            return back()->with('event','success');

        }
        //if the event is individual event we have to return student names
        if($eventtype == 'individual'){

            $students = EventStudent::where('event_id',$eventid)->get();

            foreach($students as $student){

                $student->name=Student::where('id',$student->student_id)->value('name');

            }

        }
        //if the event is group event we have to return group names
        else{

            $students=EventStudent::select('group_id')->where('event_id',$eventid)->distinct()->get();

            foreach($students as $student){
                
                $eventstudent=EventStudent::where('group_id',$student->group_id)->first();

                $student->name=User::where('id',$eventstudent->college_id)->value('username');

            }
        }
        return View('resultpublish',compact('event','round','no','eventtype','eventid','students'));

    }

    /**
    * Register the Result
    *
    * @params 
    * 
    * @return  View
    */
    public function resultRegister(Request $request)
    { 
  
        $studentid=[];

        //using dynamin variable creation for retiriving student id s from the request
        for($i=1;$i<=$request->no;$i++){

            $variablename='student'.$i;
            if(!$request->$variablename){

                return redirect('/admin/home')->with('error', 'error');

            }
            $studentid[$i-1]=$request->$variablename;

        }

        //checking the student for repetation of the students
        if(count($studentid) != count(array_unique($studentid))){

            return redirect('/admin/home')->with('same','Success');

        }
        //checking the count of the students
        elseif($request->no != (count($studentid))){

            return redirect('/admin/home')->with('count','Success');

        }

        //starting a databse transaction
        DB::beginTransaction();

        try{

            $result=new ResultsMain;

            $result->event_id=$request->eventid;
            $result->round=$request->round;
            $result->eventname=$request->eventname;
            $result->no=$request->no;
            
            $result->save();

            for($i=0;$i<$request->no;$i++){

                $resultstudent=new ResultsStudents;

                $eventstudent=EventStudent::where('group_id',$studentid[$i])->first();

                if($request->eventtype == 'individual'){
                    
                    $student=Student::where('id',$eventstudent->student_id)->first();
                    $resultstudent->name=$student->name;

                }
                else{

                    $college=User::where('id',$eventstudent->college_id)->first();

                    $resultstudent->name=$college->username;
                    
                }
                
                $resultstudent->group_id = $eventstudent->group_id;

                $resultstudent->result_main_id=$result->id;

                $resultstudent->save();
            }
            
            //commiting the changes if no error occured
            DB::commit();
        }
        catch(Exception $e){

            //rollback the transactions if any error occur
            DB::rollBack();

            return redirect('/admin/home')->with('error','error');

        }

        return redirect('/admin/home')->with('result','success');
    }
    /**
    *Showing the results to public
    *
    * @params 
    * 
    * @return  View
    */
    public function resultView(Request $request)
    {
        $resultmains=ResultsMain::latest()->get();

        $result=collect();

        foreach($resultmains as $key=> $resultmain){

            $subresult=collect();

            $subresult->eventname =Events::where('id',$resultmain->event_id)->value('name');

            $subresult->roundname=$resultmain->round;

            $subresult->students=ResultsStudents::where('result_main_id',$resultmain->id)->get();

            $result->push($subresult);

        }

        return View('results',compact('result'));
   
    }

}

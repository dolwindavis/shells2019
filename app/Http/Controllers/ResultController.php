<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    
    public function resultRegisterView(Request $request)
    {
        
        $events=Events::select('name','id')->get();

        return View('ResultAdd',compact('events'));

    }


    public function resultRegister(Request $request)
    {
        
        $students=$request->students;
        

        DB::beginTransaction();

        try{

            $result=new ResultsMain;

            $result->event_id=$request->eventid;
            $result->round_name=$request->roundname;

            $result->save;


            foreach($students as $student){

                $resultstudent=new ResultStudents;

                $resultstudent->result_main_id=$result->id;

                $resultstudent->student_name=$student->name;

                $resultstudent->college_username=$student->username;

                $resultstudent->save;

            }
            DB::commit();
        }
        catch(Exception $e){

            //rollback the transactions if any error occur
            DB::rollBack();
            return redirect('results/add');

        }
    }

    public function resultView(Request $request)
    {
        $resultmains=ResultsMain::all();

        $result=collect();

        foreach($resultmains as $key=> $resultmain){

            $subresult=collect();

            $subresult->eventname =Events::select('name')->where('id',$resultmain->event_id)->first();

            $subresult->roundname=$resultmain->round_name;

            $subresult->students=ResultsStudents::where('result_main_id',$resultmain->id)->get();

            $result->push($subresult());

        }

        dd($result);
    }

}

<?php

namespace App\Http\Controllers;


use App\Models\Events;
use App\Models\College;
use App\Models\Student;
use App\Exports\EventExport;
use App\Models\EventStudent;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{


    /**
     * Creating an Excel Sheet For Each Event
     * it  will include details of the Events That Registered For the College
     * 
     * @Params eventid
     * 
     * @return Excel Sheel
     */
    public function event_details($id) 
    {
        $event=Events::findOrFail($id);
        $filename=$event->name." - Report";
        $sheetname=$event->name;

        $eventstudent=EventStudent::where('event_id',$event->id)->get();

        $count=$eventstudent->count();

        $students=[];

        $j=0;
        for( $i=0; $i<$count; $i++ )
        {   

            $s=Student::findOrFail($event->studentDetails[$i]->student_id);

            if(!empty($s) > 0){
    
                $students[$j]=$s;

                $j++;

            }
            
        }

        $data=[
            'students' => $students,
            'event'=>$event,
        ];

        Excel::create($filename, function($excel) use($filename, $sheetname, $data){
            $myData = $data;
            $excel->sheet($sheetname, function($sheet) use($myData){
                $sheet->loadView('exports.event-details', [ 'data' => $myData ]);
            });
        })->export('xlsx');
        

    }
     /**
     * Creating an Excel Sheet For Each College 
     * it  will include details of the students and their registered event details
     * 
     * @Params collegeid
     * 
     * @return Excel Sheel
     */
    public function registration_form($id)
    {
        $students=Student::where('college_id',$id)->get();
        $college=College::where('user_id',$id)->first();
        $events=Events::all();
        $filename=$college->name." - Report";
        // $sheetname=$college->id;
        $sheetname="Report";


        foreach($students as $student){

            $subresult =collect();
            
            $eventstudents=EventStudent::where('student_id',$student->id)->get();

            foreach($eventstudents as $eventstudent){

                $subresult->push($eventstudent->event_id);

            }
            
            $student->events=$subresult;
        }
    
        $data=[
            'students' => $students,
            'college' => $college,
            'events' => $events,
            
        ];

        Excel::create($filename, function($excel) use($filename, $sheetname, $data){
            $myData = $data;
            $excel->sheet($sheetname, function($sheet) use($myData){
                $sheet->loadView('exports.registration-form', [ 'data' => $myData ]);
            });
        })->export('xlsx');
        

    }

}

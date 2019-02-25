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
    public function event_details($id) 
    {
        $event=Events::findOrFail($id);
        $filename=$event->name." - Report";
        $sheetname=$event->name;

        $count=count($event->eventstudent);
        
        for( $i=0; $i<$count; $i++ )
        { 
            $students[$i]=Student::findOrFail($event->eventstudent[$i]->student_id);
        }
        // dd($students[0]->userDetails);
        $data=[
            'students' => $students,
            'event'=>$event,
        ];
        // dd($data['students']);
        // return view('exports.event-details',compact('data'));
        Excel::create($filename, function($excel) use($filename, $sheetname, $data){
            $myData = $data;
            $excel->sheet($sheetname, function($sheet) use($myData){
                $sheet->loadView('exports.event-details', [ 'data' => $myData ]);
            });
        })->export('xlsx');
        

    }
    public function registration_form($id)
    {
        $students=Student::where('college_id',$id)->get();
        $college=College::where('user_id',$id)->first();
        $events=Events::all();
       
        $filename=$college->name." - Report";
        $sheetname=$college->name;

        // $count=count($students);

        

        // for($i=0; $i < 1 ; $i++ )
        // {
            
        //   $par_events = EventStudent::where('student_id',$students[$i]->id)->get();
          
        //    if( $par_events[$i]->event_id == $events[$i]->id )
        //    {
        //        $flag[$i]=true;
        //    }
        //    else
        //    {
        //        $flag[$i]=false;
        //    }
        
           
        // }
        // dd($flag);
        // json_encode(['id' => 1, 'name' => 'User 1']);
        $data=[
            'students' => $students,
            'college' => $college,
            'events' => $events,
            
        ];
        // dd($data['events'][0]->id);
        // dd($data['par_events']);
        // dd($data['students']);
        return view('exports.registration-form',compact('data'));
        Excel::create($filename, function($excel) use($filename, $sheetname, $data){
            $myData = $data;
            $excel->sheet($sheetname, function($sheet) use($myData){
                $sheet->loadView('exports.registration-form', [ 'data' => $myData ]);
            });
        })->export('xlsx');
        

    }
}

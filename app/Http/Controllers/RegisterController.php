<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Events;
use App\Models\College;
use App\Models\Student;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EventRegisterRequest;
use App\Http\Requests\CollegeRegisterRequest;
use App\Http\Requests\StudentRegisterRequest;

class RegisterController extends Controller
{
    
    //Registration of the college
    public function registerCollege(CollegeRegisterRequest $request)
    {   
        
        // validation rules => CollegeRegisterRequest  

        $validated = $request->validated();


        //beginning a Database transaction
        DB::beginTransaction();

        try{
       
            //registering a new user
            $newuser = new User;
            $newuser->registerUser($request);


            //inserting the college details
            $newcollege =new College;
            $newcollege->insertCollege($request,$newuser);

        //commiting the database transactions
            DB::commit();
        }
        catch(Exception $e){

            //rollback the transactions if any error occur
            DB::rollBack();
            return redirect()->route('register');

        }

        //sending mail to the user
        // $this->sendMail($newuser);


        return redirect('home');
        
    }


//Registration of the students
    public function registerStudent(StudentRegisterRequest $request)
    {
        
        // validation rules => StudentRegisterRequest 
        $validated = $request->validated();

        
        //retriving authenticated user
        $user = Auth::user();

        
        //registering a new student
        $newstudent = new Student;

        try{

            $newstudent->registerStudent($request,$user);

        }
        catch(Exception $e){

            return redirect('/student/register');

        }

        return redirect('/student');

    }

//edit a student details
    function studentUpdate(StudentRegisterRequest $request,$studentid)
    {
        
        // validation rules => StudentRegisterRequest 
        $validated = $request->validated();

        $student=Student::find($studentid);

        $student->updateStudent($request);

        return redirect('/student');
    }

//delete a student
    function studentDelete(Request $request,$studentid)
    {
        try{

            $student=Student::find($studentid)->delete();

        }
        catch(Exception $e){

            return redirect('/student');

        }

        return redirect('/student');
    }
    
    function eventRegister(EventRegisterRequest $request)
    {
        $url="https://s3.ap-south-1.amazonaws.com/shells2k19";
        
        // validation rules => EventRegisterRequest 
        $validated = $request->validated();

        //getting logo from request
        $logo = $request->file('logo');

        //creating a logo name fron Event anme
        $logoname=$string = str_replace(' ', '', $request->name);

        //creating a logo name with extention
        $logoFileName = $logoname. '.' . $logo->getClientOriginalExtension();

        //selecting file system driver as s3
        $s3 = Storage::disk('s3');

        //creating a filepath in the s3
        $logoPath = '/events/logo/' . $logoFileName;

        //uploading the file into the amazone bucket
        $s3->put($logoPath, file_get_contents($logo), 'public');

        //getting head from request
        $head = $request->file('headimage');

        //creating a head name fron Event anme
        $headname=$string = str_replace(' ', '', $request->headname);

        //creating a head name with extention
        $headFileName = $headname. '.' . $head->getClientOriginalExtension();

        //selecting file system driver as s3
        // $s3 = Storage::disk('s3');

        //creating a filepath in the s3
        $headnamePath = '/events/eventheads/' . $headFileName;

        //uploading the file into the amazone bucket
        $s3->put($headnamePath, file_get_contents($head), 'public');

        //creating url for logo
        $request->logo=$url.$logoPath;

        //creating url for headimage
        $request->headimage=$url.$headnamePath;

        $request->slug=str_slug($request->name, '-');

        $event=new Events();

        $event->registerEvent($request);

        return redirect('/event/add');

    }


    function sendMail($newuser)
    {
        $mail=$newuser->email;
        $username=$newuser->username;
        Mail::to($mail)->send(new RegisterMail($username));
        
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $table = 'students';

    protected $fillable = [
        'email','name','phone','reg_no','course','gender',
   ];

   //one to many relationship with user
   public function userDetails()
   {
       return $this->belongsTo('App\Models\User','college_id');
   }

   public function eventstudent()
   {
        return $this->hasMany('App\Models\EventStudent','student_id');
   }
   

   public function collegeDetails()
   {
    return $this->belongsTo('App\Models\College','college_id');
   }


    //register a student;
    public function registerStudent($request,$user)
    {

            $this->name =$request->name;

            $this->email =$request->email;

            $this->phone =$request->phone;

            $this->reg_no =$request->reg_no;

            $this->course =$request->course;
            
            $this->gender =$request->gender;
        
            $user->student()->save($this);

            session()->flash('success','Success');
        
    }

    public function updateStudent($request)
    {

            $this->name =$request->name;

            $this->email =$request->email;

            $this->phone =$request->phone;

            $this->reg_no =$request->reg_no;

            $this->course =$request->course;
            
            $this->gender =$request->gender;
        
            $this->save();

            session()->flash('update','Success');
    }

}

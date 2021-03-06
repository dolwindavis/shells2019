<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{


    protected $table = 'college';

    protected $fillable = ['name','phone_no','stay','faculty','user_id'];



    //one to one relationship with user
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function studentDetails()
    {
        return $this->hasMany('App\Models\Student','college_id','user_id');
    }

    public function insertCollege($request,$user)
    {
        // $newcollege =new College;

        $this->name = $request->name;

        $this->phone_no = $request->phoneno;

        if($request->stay == null){

            $this->stay =0;
        }
        else{

            $this->stay = $request->stay;
            
        }
        

        //$this->faculty = $request->faculty;

        // $this->faculty = "Heloooo";

        $user->college()->save($this);
    }
}

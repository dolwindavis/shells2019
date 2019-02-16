<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password','username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //one to one relationship with college
    public function college()
    {
        return $this->hasOne('App\Models\College','user_id');
    }


    //one to many relationship with student
    public function student()
    {
         return $this->hasMany('App\Models\Student','college_id');
    }

    public function eventstudent()
    {
         return $this->hasMany('App\Models\EventStudent','college_id');
    }

    //insert a user
    public function registerUser($request){

        // $newuser = new User;
        
        $this->email = $request->email;
        
        $this->password = Hash::make($request->password);
        
        $this->username = "s19".str_random(3);

        $this->save();

        return $this;
    }
}

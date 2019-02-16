<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class EventStudent extends Model
{
    protected $table='eventstudent';

    public function user()
    {
        return $this->belongsTo('App\Models\User','id');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Student','id');
    }

    public function events()
    {
        return $this->belongsTo('App\Models\Events','id');
    }

    public function registerEventStudent($request)
    {
        $this->student_id=$request->studentsid;
        $this->event_id=$request->eventid;
        $this->group_id=$request->groupid;
        $this->college_id=Auth::user()->id;

        $this->save();
    }

}

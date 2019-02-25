<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{

    protected $table= 'events';

    public function studentDetails()
    {
         return $this->hasMany('App\Models\EventStudent','event_id');
    }
    

    function registerEvent($request)
    {
        $this->name=$request->name; 
        $this->logo=$request->logo ;
        $this->head_mail=$request->heademail; 
        $this->head_name=$request->headname; 
        $this->head_image=$request->headimage; 
        $this->head_phone=$request->headphone;
        $this->head_mail=$request->heademail; 
        $this->info=$request->info;
        $this->rules=$request->rules;
        $this->groupevent=$request->groupevent;
        $this->groupnumber=$request->groupnumber;
        $this->maxnumber=$request->maxnumber;
        $this->exclusive=$request->exclusive;
        $this->slug=$request->slug;
        $this->save();
    }
}

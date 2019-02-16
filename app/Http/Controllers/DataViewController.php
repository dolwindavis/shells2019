<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataViewController extends Controller
{
    public function studentDetails(Request $request)
    {
        $user=Auth::user();

        $students=$user->student()->get();

        return view('studentlist',compact('students'));

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $s3 = Storage::disk('s3');
        $image = $s3->url('1548788759.png');
        return view('welcome',compact('image'));
    }

    public function s3upload(Request $request)
    {
        // $image = $request->file('image');
     

        // $imageFileName = time() . '.' . $image->getClientOriginalExtension();

        $s3 = Storage::disk('s3');
        // $filePath = '/events/' . $imageFileName;
        // $s3->put($filePath, file_get_contents($image), 'public');

        $url = $s3->url('1548788759.png');

        dd($url);
    }

    public function scheduleViewer(Request $request)
    {

        $file= public_path(). "/pdf/Schedule.pdf";
        $headers = array(
              'Content-Type: application/pdf',
            );

        return response()->file($file, $headers);
       
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
 
    /**
     * Show the Shedule Of the Event 
     *
     * @return file that is streamed in the browser
     * 
     */
    public function scheduleViewer(Request $request)
    {

        $file= public_path(). "/pdf/Schedule.pdf";

        $headers = array(
              'Content-Type: application/pdf',
            );

        return response()->file($file, $headers);
       
    }

    /**
     * Fest trailer View
     *
     * @return void
     */
    public function newsView(Request $request)
    {
        return View('news');
    }

   /**
     * Registering a news
     *
     * @params title,body,date
     * 
     * @return  View
     */
    public function newsRegister(Request $request)
    {
        if(!$request->body||!$request->title||!$request->date){

            return back();
        }
        
        $body=$request->body;

        $title=$request->title;

        $date= $request->date;

        $slug = Str::slug($title, '-');

        $news = new News;
        
        $news->body = $body;
        
        $news->title = $title;
        
        $news->slug = $slug; 
        
        $news->date = $date;

        $news->save();

        return back()->with('sucess','sucesss');
    }
     /**
     * Rendering an news View According the Slug
     *
     * @params slug
     * 
     * @return  View
     */
    public function newsSlugView(Request $request,$slug)
    {
        $news=News::where('slug',$slug)->first();

        return View('news-template',compact('news'));
    }
}

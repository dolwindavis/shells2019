<?php

use App\Models\Events;
use App\Models\College;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','ViewController@homeview');


//Controller => ViewController
//Rendering Views


//Home View 
Route::get('/home','ViewController@homeview');

//Login View
Route::get('/login', 'ViewController@loginView');

//College registration View
Route::get('/register','ViewController@registerView');


//Controller => RegisterController
//Registering a college 
Route::post('/register','RegisterController@registerCollege'); 

//Show Events View
Route::get('/events','ViewController@eventsView');

//Detaild View of each Events
Route::get('event/{slug}','ViewController@eventdetailsView');


//Error Routes its Added because Error Notifications Are Done From Server Side.
//So Page Always Reloaded After that only Validations Are Done
//I know its a fault Because of time limit  we added like that
Route::get('/errorsregister','RegisterController@errorRegisterView');

Route::get('/errorsstudent','RegisterController@errrorStudentView');


//Contact Page
Route::get('/contact',function ()
{
    return view('contact');

});

//Shecdule Display Page
Route::get('/schedule','HomeController@scheduleViewer');

//Its a Single Route For Trailor Added For Coustom News
Route::get('/news/trailer',function ()
{
    return view('news');

});


//News Describin View
//Actually we Planned LIke In Admin Page News Description is Given as A Html Mark Up 
//So that we Can Coustomise Each Page
//Now Its been Changed to only one Template
//if you want to render from database You can change the view to news-render-temblate.blade.php
Route::get('/news/{slug}','HomeController@newsSlugView');

//its shows result to public
Route::get('/results','ResultController@resultView');

//Authentication Routes
//Authentication controllers
//Controller => LoginController
//login =>for login
//logout => for logout
Auth::routes(['logout' => false,'register' =>false]);

Route::get('/logout',function(){

    Auth::logout();

    return redirect('/home');

});


//its admin only middleware which used to guard the common users
//middlewars used admin and auth
Route::middleware(['auth','admin'])->group(function () {

    //loads admin with data 
    //retutn view with Event Details,student Count,College Count
    Route::get('/admin/home',function ()
    {   
        $events=Events::select('name','id')->get();
        $college=College::all()->count();
        $student=Student::all()->count();
        return view('adminhome',compact('events','college','student'));
    });

    //REPORTS

    //college OverView
    Route::get('/admin/college-reports','ViewController@college_reports');

    //events OverView
    Route::get('/admin/event-reports','ViewController@event_reports');

    //Delete a College
    Route::post('/admin/college/delete','ViewController@collegeDelete');

    //excel report for event table
    //event participants after registration excel sheets
    Route::get('eventdetails/{id}','ExportController@event_details');

    //College Details Excel Sheet with Student Details
    Route::get('registration-form/{id}','ExportController@registration_form');


    //NEWS
    //Add News View 
    Route::get('/news/add','HomeController@newsView');

    //registering Views
    //You can also Use Markup in the parameter body
    Route::post('/news/add','HomeController@newsRegister');


    //RESULTS
    //register Results View
    Route::post('/result/register','ResultController@resultRegisterView');

    //Registering a result  
    Route::post('admin/result/publish','ResultController@resultRegister');

    //add a manual payment for admin
    Route::post('admin/payment','ViewController@adminPayment');

    //EVENTS
    //add events to the System
    //Note:No Validations Are done for the details
    //No CRUD was written for this functionalitu since its a one time used functionality
    Route::get('/event/add',function ()
    {
        return view('eventadd');

    });

    //Registering a event to System
    Route::post('/event/add','RegisterController@eventRegister');

});

//Authenticated User Routes
//Middleware AUTH
//authenticating controllers
Route::middleware(['auth'])->group(function () {

    //STUDENT REGISTER 
    //student list for college view rendering
    Route::get('/student','ViewController@studentDetails');
    
    //MIDDLEWARE =>payment

    //Register A new Student View
    //Middleware Payment
    Route::get('/student/register','ViewController@studentAddView')->middleware('payment');

    //registering a student
    Route::post('/student/register','RegisterController@registerStudent')->middleware('payment');

    //editing student view
    Route::get('/student/edit/{studentid}','ViewController@editStudentView')->middleware('payment');

    //editing student details
    Route::post('/student/edit/{studentid}','RegisterController@studentUpdate')->middleware('payment');

    //deleting student
    Route::get('/student/delete/{studentid}','RegisterController@studentDelete')->middleware('payment');


    //EVENT REGISTER


    //eventDetails
    Route::get('/event/details','EventController@eventDetails');

    //Event Registerd Details View
    Route::get('/events/register', 'ViewController@eventlistView');

    //ajax requests

    //returning selected event details 
    Route::get('/event/details','EventController@eventDetails');//[request =>id   response=>name,logo,info,id]

    //returning students eligible for the particular event
    Route::get('/event/students/list','EventController@eventParticipant');//[request=>id response=>name,id]


    //MIDDLEWARE payment

    //register a student for event view
    Route::get('/student/register/event','EventController@eventDetails')->middleware('payment');

    //regster a student for an event
    Route::post('/student/event/register','EventController@eventRegister')->middleware('payment');//[request=>id,studentid[],eventid response=>true]

    //edit a event that is regsitered View
    Route::get('/student/event/edit','EventController@eventEditView')->middleware('payment');

    //update a event View
    Route::post('/student/event/edit','EventController@eventEdit')->middleware('payment');

    //Delete A event Registered
    Route::post('/student/event/delete','EventController@eventDelete')->middleware('payment');
    
    //Payment 

    //Its added for the ECP project only It Needed to be deduct from original project
    //Stripe is used for the payment option
    //payment Option View
    Route::get('payment/stripe', array('as' => 'addmoney.paystripe','uses' => 'MoneySetupController@PaymentStripe'));

    //payment Route
    Route::post('addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'MoneySetupController@postPaymentStripe'));

    //invoice Download Option 
    Route::get('/invoice','MoneySetupController@invoiceDownload');
   
});




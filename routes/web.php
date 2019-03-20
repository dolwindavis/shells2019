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

// Route::get('/', function () {
//     return view('home');
// });

//Controller => ViewController
//Rendering Views
Route::get('/home','ViewController@homeview');

Route::get('/login', 'ViewController@loginView');

Route::get('/register','ViewController@registerView');

Route::get('/events','ViewController@eventsView');

Route::get('/errorsregister','RegisterController@errorRegisterView');

Route::get('/errorsstudent','RegisterController@errrorStudentView');

Route::get('/contact',function ()
{
    return view('contact');

});

Route::get('/schedule','HomeController@scheduleViewer');

//Results
Route::get('/results/add','ResultController@resultRegisterView');


//news

Route::get('/news/trailer',function ()
{
    return view('news');

});


Route::get('/news/{slug}','HomeController@newsSlugView');



Route::get('/results','ResultController@resultView');

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/admin/home',function ()
    {   
        $events=Events::select('name','id')->get();
        $college=College::all()->count();
        $student=Student::all()->count();
        return view('adminhome',compact('events','college','student'));
    });


    // reoute to reports
    Route::get('/admin/college-reports','ViewController@college_reports');
    Route::get('/admin/event-reports','ViewController@event_reports');

    Route::post('/admin/college/delete','ViewController@collegeDelete');

    //excel report for event table
    Route::get('eventdetails/{id}','ExportController@event_details');
    Route::get('registration-form/{id}','ExportController@registration_form');


    Route::get('/news/add','HomeController@newsView');

    Route::post('/news/add','HomeController@newsRegister');

    Route::post('/result/register','ResultController@resultRegisterView');

    Route::post('admin/result/publish','ResultController@resultRegister');

   Route::post('admin/payment','ViewController@adminPayment');


});




//Controller => RegisterController
//Registering a college 

Route::post('/register','RegisterController@registerCollege'); 

// Route::get('/event/add',function ()
// {
//     return view('eventadd');

// });

// Route::post('/event/add','RegisterController@eventRegister');

Route::get('/event/details','EventController@eventDetails');

//Authentication controllers
//Controller => LoginController
//login =>for login
//logout => for logout
Auth::routes(['logout' => false,'register' =>false]);



//authenticating controllers
Route::middleware(['auth'])->group(function () {

    //student list for college view rendering
    //Route::get('/student','ViewController@studentlistView');
    Route::get('/student','DataViewController@studentDetails');

    Route::get('/student/register','ViewController@studentAddView')->middleware('payment');

    //registering a student
    Route::post('/student/register','RegisterController@registerStudent')->middleware('payment');

    //editing student view
    Route::get('/student/edit/{studentid}','ViewController@editStudentView');

    //editing student details
    Route::post('/student/edit/{studentid}','RegisterController@studentUpdate');

    //deleting student
    Route::get('/student/delete/{studentid}','RegisterController@studentDelete')->middleware('payment');

    

    Route::get('/events/register', 'ViewController@eventlistView');

    //ajax requests
    Route::get('/event/details','EventController@eventDetails');//[request =>id   response=>name,logo,info,id]

    Route::get('/event/students/list','EventController@eventParticipant');//[request=>id response=>name,id]

    Route::post('/student/event/register','EventController@eventRegister');//[request=>id,studentid[],eventid response=>true]

    Route::get('/student/register/event','EventController@eventDetails')->middleware('payment');

    Route::get('/student/event/edit','EventController@eventEditView')->middleware('payment');

    Route::post('/student/event/edit','EventController@eventEdit')->middleware('payment');

    Route::post('/student/event/delete','EventController@eventDelete')->middleware('payment');
    
    //test route 
    Route::get('/student/event','ViewController@addEvent');


    Route::get('payment/stripe', array('as' => 'addmoney.paystripe','uses' => 'MoneySetupController@PaymentStripe'));

    Route::post('addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'MoneySetupController@postPaymentStripe'));
   
});


Route::get('/logout',function(){

    Auth::logout();

    return redirect('/home');

});

Route::get('event/{slug}','ViewController@eventdetailsView');


Route::get('/notify','NotificationController@NewsNotification');


Route::get('/invoice','MoneySetupController@invoiceDownload');


// Route::get('registration-form/{id}','ExportController@student');


<?php




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
Route::get('/', function () {
    return view('home');
});

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

Route::get('/news/add','HomeController@newsView')->middleware('auth','admin');

Route::post('/news/add','HomeController@newsRegister');

Route::get('/news/{slug}','HomeController@newsSlugView');






//Controller => RegisterController
//Registering a college 

Route::post('/register','RegisterController@registerCollege'); 

Route::get('/event/add',function ()
{
    return view('eventadd');

});

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

    Route::get('/student/register','ViewController@studentAddView');

    //registering a student
    Route::post('/student/register','RegisterController@registerStudent');

    //editing student view
    Route::get('/student/edit/{studentid}','ViewController@editStudentView');

    //editing student details
    Route::post('/student/edit/{studentid}','RegisterController@studentUpdate');

    //deleting student
    Route::get('/student/delete/{studentid}','RegisterController@studentDelete');

    

    Route::get('/events/register', 'ViewController@eventlistView');

    //ajax requests
    Route::get('/event/details','EventController@eventDetails');//[request =>id   response=>name,logo,info,id]

    Route::get('/event/students/list','EventController@eventParticipant');//[request=>id response=>name,id]

    Route::post('/student/event/register','EventController@eventRegister');//[request=>id,studentid[],eventid response=>true]

    Route::get('/student/register/event','EventController@eventDetails');

    Route::get('/student/event/edit','EventController@eventEditView');

    Route::post('/student/event/edit','EventController@eventEdit');

    Route::post('/student/event/delete','EventController@eventDelete');
    //test route 
    Route::get('/student/event','ViewController@addEvent');
   
});


Route::get('/logout',function(){

    Auth::logout();

    return redirect('/home');

});

Route::get('event/{slug}','ViewController@eventdetailsView');


Route::get('/notify','NotificationController@NewsNotification');

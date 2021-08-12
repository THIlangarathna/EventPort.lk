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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('first');
});

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//event
Route::get('/event', 'EventController@create');

//event form submission
Route::post('/submit','EventController@store');

//event edit
Route::post('/saveevent','EventController@update');

//event edit page route
//Route::get('/editevent/{id}','EventController@edit');
Route::get('/editevent{id}',['uses'=>'EventController@edit','as'=>'editevent']);

//checkin page route
Route::get('/checkin{id}',['uses'=>'JoinTableController@index','as'=>'/checkin']);

//confirm checkin and sending mails route
Route::get('/send-email/{id}/{user_id}','JoinTableController@sendEmail');

//Invite page route
Route::get('/invite{id}',['uses'=>'InvitationController@create','as'=>'/invite']);

//invite and sending mails route
Route::post('/send','InvitationController@store');

//confirm email
Route::get('/confirm/{id}','MailURLController@confirm');

//social logins
Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

//admin approval
Route::get('/admin', 'AdminController@create');
//admin approval form
Route::post('req','AdminController@store');

//ContactUs
Route::post('Hello','JoinTableController@store');

//confirm email
Route::get('/adminapproval/{id}','MailURLController@confirmAdmin');

//dashboard
Route::get('/dashboard','DashboardController@index');

//myevents dashboard
Route::get('/myevents','EventController@index');

//view event from myevents
Route::get('/viewevent{id}',['uses'=>'DashboardController@index2','as'=>'viewevent']);

//delete event from myevents
Route::get('/deleteevent/{id}',['uses'=>'DashboardController@destroy','as'=>'deleteevent']);

//Form Submission page route
Route::get('/ViewSubmissions{id}',['uses'=>'FormSubmissionController@index','as'=>'/ViewSubmissions']);

//Form Show page route
Route::get('/ShowForm{id}',['uses'=>'FormController@show','as'=>'/ShowForm']);

//Form Edit page route
Route::get('/EditForm{id}',['uses'=>'FormController@edit','as'=>'/EditForm']);

//Form Submission page route
Route::get('/ViewSub{id}',['uses'=>'FormSubmissionController@show','as'=>'/ViewSub']);

//create Form
Route::get('/createform','FormController@create');

//Feedback
//Route::get('/feedback{id}','FormSubmissionController@feedback');
Route::get('/feedback{identifier}', 'FormSubmissionController@feedback')->name('feedback');

//revoke link
Route::get('/revokelink{id}',['uses'=>'FormController@revokeURL','as'=>'/revokelink']);

//live link
Route::get('/livelink{id}',['uses'=>'FormController@liveURL','as'=>'/livelink']);

Route::get('/sorry', function () {
    return view('Forms.sorry');
});

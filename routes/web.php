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
     //return view('welcome');
     return view('login');
});*/

use App\Notifications\filenotif;
use App\Notifications\ForApproval;
use App\User;

Route::get('log', function(){ //this for testing only
	return view('log');
});

//user
Route::get('/', 'UserController@index');
Route::get('index', 'UserController@index');
Route::post('checklogin', 'UserController@checklogin');
Route::get('successlogin', 'UserController@successlogin');
Route::get('logout', 'UserController@logout');
//enduser

//author
Route::get('change_request_form', 'AuthorController@index');
Route::post('crf_request', 'AuthorController@crf_request');
Route::get('change_request_list', 'AuthorController@crl_view');
Route::get('editable_files', 'AuthorController@editable_files');
Route::get('qms_author', 'AuthorController@qms_author');
Route::get('form_view/{id}', 'AuthorController@form_view'); //view specific request
Route::get('form_view2/{id}', 'AuthorController@form_view2'); //view specific request
Route::post('file_submit', 'AuthorController@file_submit');

//file holder
Route::get('request_list', 'FileHolderController@request_list_view'); //crf list for editable files for handler
Route::get('qms', 'FileHolderController@qms_files');
Route::post('crf_approved', 'FileHolderController@crf_approved');//approved specific request
Route::post('crf_declined', 'FileHolderController@crf_declined');
//approver
Route::get('qms_approver', 'ApproverController@qmclss_approver');
Route::post('qms_approved', 'ApproverController@qms_approved')->name('qms.approved');
Route::post('qms_revision', 'ApproverController@qms_revision');
Route::get('request_forms', 'ApproverController@request_forms');

//quality_assurance
Route::get('quality_assurance', 'QualityAssuranceController@quality_assurance');
Route::post('qa_approved', 'QualityAssuranceController@qa_approved');
Route::post('qa_revision', 'QualityAssuranceController@qa_revision');


Route::get('crf_approved/{id}', 'QmsController@crf_approved'); //approved specific request
Route::get('crf_declined/{id}', 'QmsController@crf_declined'); //declined specific request
Route::get('dl_e_file/{id}', 'QmsController@show');// download files
Route::get('login_design', function () {
     return view('login_design');
});
Route::get('main', function (){
   return view('main');
});
Route::get('documentRev', 'AuthorController@crl_view');
//Document Creation
Route::get('document_creation', 'DocumentCreation@creationlist');
Route::get('creation_list','DocumentCreation@creationlist');
Route::get('creation_request_form','DocumentCreation@index');
Route::post('creation_request','DocumentCreation@creation_request');
Route::get('creation_form_view/{id}', 'DocumentCreation@creation_form_view');
Route::post('file_submit', 'DocumentCreation@file_submit');


Route::get('/y', function (){

    $user = Auth::user();
    $user->notify(new filenotif(User::findorFail(4)));die;

    //foreach (Auth::user()->unreadNotifications as $notification) {
       // $notification->markAsRead();
    //}
});




/*Route::get('form_view2', function () {
    //return view('welcome');
    return view('qms.form_view2');
});*/
//Route::resource('qms', 'QmsController');


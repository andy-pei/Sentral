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
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('events', 'EventsController');
    Route::get('events/delete/{id}', 'EventsController@destroy');
    Route::get('events/{id}/organisers', 'EventsController@organisers');
    Route::get('events/{id}/organisers/add', 'EventsController@addOrganisers');
    Route::post('events/{id}/organisers/add', 'EventsController@storeOrganisers');
    Route::get('events/{id}/participants', 'EventsController@invitedParticipants');
    Route::get('events/{id}/participants/update', 'EventsController@updateInvitedParticipants');
    Route::post('events/{id}/participants/update', 'EventsController@storeInvitedParticipants');
    Route::get('events/{id}/participant/{participantid}/purchase', 'EventsController@purchaseEventTicket');
    Route::post('events/{id}/participant/{participantid}/purchase', 'EventsController@storePurchaseEventTicket');
    Route::get('events/{id}/participant/approved', 'EventsController@approvedParticipants');
});

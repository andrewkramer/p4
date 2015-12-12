<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'RootController@showHome');

Route::get('/login', 'Auth\AuthController@getLogin'); # Show login form
Route::post('/login', 'Auth\AuthController@postLogin'); # Process login form
Route::get('/logout', 'Auth\AuthController@getLogout'); # Process logout
Route::get('/logout/confirm', 'Auth\AuthController@confirmLogout'); # Confirm logout
Route::get('/register', 'Auth\AuthController@getRegister'); # Show registration form
Route::post('/register', 'Auth\AuthController@postRegister'); # Process registration form

Route::get('/timelines', 'RootController@showHome');
Route::get('/timelines/{timeline_id}', 'TimelinesController@showTimeline');
Route::post('timelines', 'TimelinesController@newTimeline');
Route::post('/timelines/{timeline_id}', 'TimelinesController@editTimeline');

Route::get('/timelines/{timeline_id}/characters/', 'CharactersController@listCharacters');
Route::get('/timelines/{timeline_id}/characters/{character_id}', 'CharactersController@showCharacter');
Route::post('timelines/{timeline_id}/characters/', 'CharactersController@newCharacter');
Route::post('/timelines/{timeline_id}/characters/{character_id}', 'CharactersController@editCharacter');

Route::get('/timelines/{timeline_id}/locations/', 'LocationsController@listLocations');
Route::get('/timelines/{timeline_id}/locations/{location_id}', 'LocationsController@showLocation');
Route::post('timelines/{timeline_id}/locations/', 'LocationsController@newLocation');
Route::post('/timelines/{timeline_id}/locations/{location_id}', 'LocationsController@editLocation');

Route::get('timelines/{timeline_id}/events/', 'TimelinesController@showTimeline');
Route::get('/timelines/{timeline_id}/events/{event_id}', 'EventsController@showEvent');
Route::post('timelines/{timeline_id}/events/', 'EventsController@newEvent');
Route::post('/timelines/{timeline_id}/events/{event_id}', 'EventsController@editEvent');

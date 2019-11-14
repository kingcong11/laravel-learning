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

app()->singleton('App\Services\Twitter', function(){
    return new \App\Services\Twitter('samplekey');
});




// Route::get('/', function(){
//     dd(app('App\Services\Example'));
// });

/* Standard Routes */
Route::get('/', 'PagesController@home');
Route::get('/contact', 'PagesController@contact');
Route::get('/about', 'PagesController@about');


/* Specific Routes */
Route::post('projects/{project}/tasks', 'ProjectTasksController@store');


/* Resource Routes */
Route::resource('projects', 'ProjectsController');
Route::resource('tasks', 'ProjectTasksController');


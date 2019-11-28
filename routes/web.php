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

// use App\Repositories\UserRepositoryInterface;
// use App\Services\Twitter;

// Route::get('/', function(UserRepositoryInterface $user, Twitter $twitter){
//     dd($user->create('balagaboom'), $twitter);
//     $user->create('sample');
// });

use App\Notifications\ProjectSubscriptionFailed;

Route::get('/', function(){
    $user = App\User::first();

    $user->notify(new ProjectSubscriptionFailed);

    return 'done';
});

/* Standard Routes */
// Route::get('/', 'PagesController@home');
Route::get('/contact', 'PagesController@contact');
Route::get('/about', 'PagesController@about');


/* Specific Routes */
Route::post('projects/{project}/tasks', 'ProjectTasksController@store');


/* Resource Routes */
Route::resource('projects', 'ProjectsController');
Route::resource('tasks', 'ProjectTasksController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

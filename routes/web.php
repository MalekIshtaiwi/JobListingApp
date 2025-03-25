<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {

//     return view('home');
// });
Route::view('/','home');
Route::view('/contact','contact');
// Route::resource('jobs', JobController::class);
//jobs
Route::get('/jobs',[JobController::class,'index']);
Route::get('/jobs/create',[JobController::class,'create']);
Route::get('/jobs/{job}',[JobController::class,'show']);

// Route::get('/jobs/{id}', function ($id) {

//     $job = Job::find($id);

//     return view('jobs.show', [
//         'job'=> $job
//     ]);
// });
Route::post('/jobs',[JobController::class,'store']);
Route::get('/jobs/{job}/edit',[JobController::class,'edit']);
//////////////////////////////////////
// Route::get('/jobs/{id}/edit', function ($id) {

//     $job = Job::find($id);

//     return view('jobs.edit', [
//         'job'=> $job
//     ]);
// });
Route::patch('/jobs/{job}',[JobController::class,'update']);
//////////////////////////////////////////
// Route::patch('/jobs/{id}', function ($id) {
//     //validate
//     request()->validate([
//         'title' =>['required','min:3'],
//         'salary' =>['required'],
//     ]);
//     //authorize
//     //update the job
//     $job = Job::findOrFail($id);  // find or fail aborts if the id is not found

//     //Update Each Item Individually
//     // $job->title = request('title');
//     // $job->salary = request('salary');
//     // $job->save();

//     //Update All Items At Once
//     $job->update([
//         'title' => request('title'),
//         'salary'=> request('salary'),
//     ]);

//     //redirect to the job
//     return redirect('/jobs/' . $job->id);
// });
Route::delete('/jobs/{job}',[JobController::class,'destroy']);
/////////////////////////////////////////////
// Route::delete('/jobs/{id}', function ($id) {
//     //authorize
//     //delete the job
//     $job = Job::findOrFail($id);
//     $job->delete();
//     //redirect
//     return redirect('/jobs');
// });


//Auth

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy']);

<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
Route::get('/', function () {

    return view('home');
});

//Index
Route::get('/jobs', function () {
    return view('jobs.index', [
        'jobs' => Job::with('employer')->latest()->paginate(3)
    ]);
});

//Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});


//Show
Route::get('/jobs/{id}', function ($id) {

    $job = Job::find($id);

    return view('jobs.show', [
        'job'=> $job
    ]);
});

//Store
Route::post('/jobs', function(){
    request()->validate([
        'title' =>['required','min:3'],
        'salary' =>['required'],
    ]);
        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);
        return redirect('/jobs');
});

//Edit
Route::get('/jobs/{id}/edit', function ($id) {

    $job = Job::find($id);

    return view('jobs.edit', [
        'job'=> $job
    ]);
});


//Update
Route::patch('/jobs/{id}', function ($id) {
    //validate
    request()->validate([
        'title' =>['required','min:3'],
        'salary' =>['required'],
    ]);
    //authorize
    //update the job
    $job = Job::findOrFail($id);  // find or fail aborts if the id is not found

    //Update Each Item Individually
    // $job->title = request('title');
    // $job->salary = request('salary');
    // $job->save();

    //Update All Items At Once
    $job->update([
        'title' => request('title'),
        'salary'=> request('salary'),
    ]);

    //redirect to the job
    return redirect('/jobs/' . $job->id);
});


//Destroy
Route::delete('/jobs/{id}', function ($id) {
    //authorize
    //delete the job
    $job = Job::findOrFail($id);
    $job->delete();
    //redirect
    return redirect('/jobs');
});

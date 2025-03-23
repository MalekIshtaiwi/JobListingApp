<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
Route::get('/', function () {

    return view('home');
});
Route::get('/jobs', function () {
    return view('jobs.index', [
        'jobs' => Job::with('employer')->latest()->paginate(3)
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {

    $job = Job::find($id);

    return view('jobs.show', [
        'job'=> $job
    ]);
});

Route::post('/jobs', function(){
        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);
        return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});

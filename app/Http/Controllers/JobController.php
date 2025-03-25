<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
class JobController extends Controller
{
    public function index(){
        $jobs = Job::with('employer')->latest()->paginate(3);
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create(){
        return view('jobs.create');
    }

    public function show(Job $job){
        return view('jobs.show', [
            'job'=> $job
        ]);
    }

    public function store(){
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
    }

    public function edit(Job $job){
        return view('jobs.edit', [
            'job'=> $job
        ]);
    }

    public function update(Job $job){
        //validate
        request()->validate([
            'title' =>['required','min:3'],
            'salary' =>['required'],
        ]);
        //authorize
        //update the job

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
    }

    public function destroy(Job $job){
    //authorize
    //delete the job
    $job->delete();
    //redirect
    return redirect('/jobs');
    }
}

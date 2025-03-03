<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request){

        if($request->search){
            $jobs = Job::where('title', 'like', '%' . $request->search .'%')->orWhere('description', 'like', '%' . $request->search .'%')->get();
        }else{
            $jobs = Job::get();
        }
        return view("job.index",compact("jobs"));
    }

    public function show(Request $request){

        $id = $request->id;
        $job = Job::where('id', $id)->first();
        $jobapplications = Application::where('job_id', $id)->get();
        return view('job.show',compact('job', 'jobapplications'));
    }

    public function create(){
        return view("job.new");
    }

    public function store(Request $request){

        $credential = $request->validate([
            "title" => "required",
            "description" => "required|max:500",
            "location" => "required",
            "salary" => "required|max:11",
            "type" => "string",
        ]);

        $credential['user_id'] = auth()->user()->id;
        Job::create($credential);

        return redirect("/")->with("status","Job Created Successful");
    }

    public function interview(Request $request){

        dd("Accept Page");
        // $user_id = $request->user_id;
        // $job_id = $request->job_id;

        // $application = Application::where('user_id',$user_id)->first();

        // dd($application);
    }
}

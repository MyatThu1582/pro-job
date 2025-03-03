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
        $jobapplications = Application::where('job_id', $id)->where('status','applied')->get();
        $jobapplied_users = Application::where('user_id', auth()->user()->id)->where('job_id',$id)->first();
        return view('job.show',compact('job', 'jobapplications', 'jobapplied_users'));
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

        $user_id = $request->user_id;
        $job_id = $request->job_id;

        $application = Application::where('user_id',$user_id)->where('job_id',$job_id)->first();
        $application->update(['status' => 'interview']);

        return redirect('/job' . '/' . $job_id . "/show");
    }

    public function rejected(Request $request){

        $user_id = $request->user_id;
        $job_id = $request->job_id;

        $application = Application::where('user_id',$user_id)->where('job_id',$job_id)->first();
        $application->update(['status' => 'rejected']);

        return redirect('/job' . '/' . $job_id . "/show");
    }

    public function applypage(Request $request){
        $job_id = $request->id;

        return view('job.apply', compact('job_id'));
    }
    public function apply(Request $request){
        $credentials = $request->validate([
            'user_id' => 'required',
            'job_id' => 'required',
            'cover_letter' => 'required|min:10',
        ]);
        $credentials['status'] = "applied";

        Application::create($credentials);
        return redirect('/')->with('status','Applied Successful');
    }
}

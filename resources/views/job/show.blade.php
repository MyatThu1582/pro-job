<x-layout>
    <div class="container" style="margin: 50px auto; width: 900px;">
        <div class="mb-5">
            <div class="card">
                <div class="card-header bg-primary text-light d-flex justify-content-between">
                    <div>
                        <h4>{{ $job->title }}</h4>
                        <span>Posted By : {{ $job->user->name }}</span>
                    </div>
                    <div class="mt-2">
                        @if (Auth::user()->role == 'job_seeker')
                        @if (!$jobapplied_users)
                        <a href="/job/{{ $job->id }}/apply" class="btn btn-light">Apply Now</a>
                        @else
                        <p>Status : {{ $jobapplied_users->status }}</p>
                        @endif
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <p>Job Type : {{ $job->type }}</p>
                    <p>Job Location : {{ $job->location }}</p>
                    <p>Job Salary : {{ $job->salary }}</p>
                    <p>Job Description : {{ $job->description }}</p>
                </div>
                <div class="card-footer">
                    <x-backbtn/>
                </div>
            </div>
        </div>

        @if (Auth::user()->role == 'employer' && Auth::user()->id == $job->user_id)
        <div class="card">
            <div class="card-header">
                <h4>People Applying To Your Job</h4>
            </div>
            @if ($jobapplications->isEmpty())
            <div class="card-body text-center pt-5">
                <p>No one has applied to your job yet !</p>
            </div>
            @else
            @foreach ($jobapplications as $jobapply)
            <div class="card-body">
                <b>Applied User : <a href="/profile/{{ $jobapply->user_id }}/view">{{ $jobapply->user->name }}</a></b>
                <p class="mt-3">Cover Letter : {{ $jobapply->cover_letter }}</p>
            </div>  
            <div class="card-footer d-flex gap-2">
                <form method="post" action="/job/interview">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $jobapply->user_id }}">
                    <input type="hidden" name="job_id" value="{{ $jobapply->job_id }}">
                    <button class="btn btn-success">Interview</button>
                </form>
                <form action="/job/rejected" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $jobapply->user_id }}">
                    <input type="hidden" name="job_id" value="{{ $jobapply->job_id }}">
                    <button class="btn btn-danger">Reject</button>
                </form>
            </div>
            @endforeach
            @endif
        </div>
        @endif
    </div>
</x-layout>
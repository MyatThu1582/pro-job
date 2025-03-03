<x-layout>
    <div class="container" style="margin: 50px auto; width: 900px;">
        <div class="mb-5">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h4>{{ $job->title }}</h4>
                    <span>Posted By : {{ $job->user->name }}</span>
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

        <div class="card">
            <div class="card-header">
                <h4>People Applying To Your Job</h4>
            </div>
            @foreach ($jobapplications as $jobapply)
            <div class="card-body">
                <b>Applied User : <a href="/profile/{{ $jobapply->user_id }}/view">{{ $jobapply->user->name }}</a></b>
                <p class="mt-3">Cover Letter : {{ $jobapply->cover_letter }}</p>
            </div>  
            <div class="card-footer d-flex gap-2">
                <form method="post" action="/job/interview">
                    <input type="hidden" name="user_id" value="{{ $jobapply->user_id }}">
                    <input type="hidden" name="job_id" value="{{ $jobapply->job_id }}">
                    <button class="btn btn-success">Interview</button>
                </form>
                <form action="/rejected" method="post">
                    <input type="hidden" name="user_id" value="{{ $jobapply->user_id }}">
                    <input type="hidden" name="job_id" value="{{ $jobapply->job_id }}">
                    <button class="btn btn-danger">Rejected</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>
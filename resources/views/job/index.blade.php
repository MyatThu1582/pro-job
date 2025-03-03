<x-layout>
    <div class="container row" style="margin: 50px auto;">
        <div class="col-6">
            <h3>Job Lists</h3>
        </div>
        <div class="col-6 mb-4">
            <form action="/job" method="post">
                @csrf
                <input type="text" name="search" class="form-control" style="box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2)" placeholder="Search Job Title Or Description ...">
            </form>
        </div>
        @foreach ($jobs as $job)
        <div class="col-4 mb-5">
            <div class="card">
                <div class="card-header bg-success text-light">
                    <h4>{{ $job->title }}</h4>
                    <span>Posted By : {{ $job->user->name }}</span>
                </div>
                <div class="card-body">
                    <p>Job Type : {{ $job->type }}</p>
                    <p>Location : {{ $job->location }}</p>
                </div>
                <div class="card-footer">
                    <a href="/job/{{ $job->id }}/show" class="btn btn-primary form-control">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-layout>
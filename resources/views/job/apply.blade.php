<x-layout>
    <div class="card" style="margin: 35px auto; width: 500px;">
        <div class="card-header">
            <h3>Submit Your Application</h3>
        </div>
        <div class="card-body">
            <form action="/job/{{ $job_id }}/apply" method="POST">
            @csrf
            <input type="hidden" name="job_id" value="{{ $job_id }}">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <label for="">Cover Letter</label>
            <x-textarea rows="10" name="cover_letter"></x-textarea>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger ms-3 me-3">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-footer">
                <x-btn class="btn-primary">
                    Apply Now
                </x-btn>
        </div>
        </form>
    </div>
</x-layout>
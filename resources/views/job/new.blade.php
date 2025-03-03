<x-layout>
    <div class="card" style="margin: 35px auto; width: 650px;">
        <div class="card-header">
            <h3 class="d-inline">Create New Job</h3>
        </div>
        <div class="card-body">
            <form action="/job/create" method="POST">
            @csrf
            <label for="">Title</label>
            <x-input name="title"/>
            <label for="">Description</label>
            <x-input name="description"/>
            <label for="">Location</label>
            <x-input name="location"/>
            <label for="">Salary</label>
            <x-input name="salary"/>
            <label for="">Type of Job</label>
            <x-select name="type">
                <option value="full-time">Full-time</option>
                <option value="part-time">Part-time</option>
                <option value="contract">Contract</option>
                <option value="intership">Intership</option>
            </x-select>
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
                Save
            </x-btn>
            </form>
        </div>
    </div>
</x-layout>
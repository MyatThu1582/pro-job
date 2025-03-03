<x-layout>
    <div class="card" style="margin: 35px auto; width: 500px;">
        <div class="card-header">
            <h3>Registration</h3>
        </div>
        <div class="card-body">
            <form action="/register" method="POST">
            @csrf
            <label for="">Name</label>
            <x-input name="name" />
            <label for="">Email</label>
            <x-input name="email" />
            <label for="">Password</label>
            <x-input type="password" name="password" />
            <label for="">Role</label>
            <x-select name="role">
                <option value="admin">Admin</option>
                <option value="employer">Employer</option>
                <option value="job_seeker">Job-seeker</option>
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
                    Register
                </x-btn>
            </form>
        </div>
    </div>
</x-layout>
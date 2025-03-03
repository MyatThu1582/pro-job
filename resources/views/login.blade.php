<x-layout>
    <div class="card" style="margin: 35px auto; width: 500px;">
        <div class="card-header">
            <h3>Login</h3>
        </div>
        <div class="card-body">
            <form action="/login" method="POST">
            @csrf
            <label for="">Email</label>
            <x-input name="email" />
            <label for="">Password</label>
            <x-input type="password" name="password" />
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
                    Login
                </x-btn>
            </form>
        </div>
    </div>
</x-layout>
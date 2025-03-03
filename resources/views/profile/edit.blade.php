<x-layout>
    <div class="card" style="margin: 35px auto; width: 650px;">
        <div class="card-header">
            <h3 class="d-inline">My Profile</h3>
            <a href="/logout" class="btn btn-danger float-end">Logout</a>
        </div>
        <div class="card-body">
            <form action="/profile/edit" method="POST">
            @csrf
            @method('put')
            <label for="">Username</label>
            <x-input name="name" value="{{ $user->name }}" />
            <label for="">Email</label>
            <x-input name="email" value="{{ $user->email }}"/>
            <label for="">Bio</label>
            <x-textarea name="bio" placeholder="Please write something about you ...">{{ $user->bio }}</x-textarea>
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
            <x-btn class="btn-success">
                Save
            </x-btn>
            </form>
        </div>
    </div>
</x-layout>
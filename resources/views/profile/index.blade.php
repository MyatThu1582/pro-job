<x-layout>
    <x-postcard>
        <div style="padding: 20px; display: flex;">
            <img src="{{ asset('images/profile.png') }}" alt="" style="border-radius: 50%;" width="20%">
            <div style="margin: auto 0px" class="ms-5 col-8">
                <h3>{{ $user->name }} ({{ $user->role }})</h3>
                <b>{{ $user->email }}</b>
                <p class="mt-2">{{ $user->bio }}</p>
            </div>
            <div class="">
                @if (Auth::check() && $user->id == auth()->user()->id)
                <a href="/profile/edit" class="btn btn-warning">Edit</a>
                @endif
            </div>
        </div>
    </x-postcard>
</x-layout>
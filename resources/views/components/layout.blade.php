<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProJob - Job Center</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</head>
<body>
    <x-navbar />
        @if (session('status'))
        <div class="alert alert-info w-25 alert-dismissible" style="position: absolute; right: 20; bottom: 0;">
            <b>{{ session('status') }}</b>
            <button type="button" class="close btn float-end" style="margin-right: -40px;" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    {{ $slot }}
</body>
</html>
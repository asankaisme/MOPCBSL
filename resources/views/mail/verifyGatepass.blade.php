<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fa/css/font-awesome.min.css') }}">
    <title>{{ $subject }}</title>
</head>

<body>

    <div class="card">
        <div class="card-header">
            <h3>{{ $subject }}</h3>
        </div>
        <div class="card-body">
            <p>{{ $message_content }}</p>
            <p>This is a system generated message. Please do not reply!</p>
            <p>My Office Pal </p>
        </div>
    </div>

</body>

</html>

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
    <title>Document</title>
</head>
<body>
    <h3>{{ $subject }}</h3>
    <p>{{ $messagebody }}</p>
    <p>This is an auto-generated message. Please do not reply!</p>
</body>
</html>
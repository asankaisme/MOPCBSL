<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>{{ $subject }}</title>
</head>

<body>

    <div class="card">
        <div class="card-header">
            <h3>{{ $subject }}</h3>
        </div>
        <div class="card-body">
            <p>{{ $message_content }}</p>
            <p>Taxi Service Provider : {{ $cabVoucher->cv_provider }}</p>
            <p>This is a system generated message. Please do not reply!</p>
            <p>My Office Pal </p>
        </div>
    </div>

</body>

</html>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('logintemplate/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('logintemplate/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('logintemplate/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('logintemplate/css/style.css') }}">

    <title>My Office Pal</title>
</head>

<body>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('logintemplate/images/undraw_remotely_2j6y.svg') }}" alt="Image"
                        class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Reset Password</span></h3>
                            </div>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group first">
                                    <label for="email">Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                                <br>
                                <input type="submit" value="{{ __('Send Password Reset Link') }}"
                                    class="btn btn-block btn-primary">


                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="{{ asset('logintemplate/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('logintemplate/js/popper.min.js') }}"></script>
    <script src="{{ asset('logintemplate/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('logintemplate/js/main.js') }}"></script>
</body>

</html>

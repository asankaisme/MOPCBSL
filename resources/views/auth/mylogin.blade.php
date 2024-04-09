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
          <img src="{{ asset('logintemplate/images/undraw_remotely_2j6y.svg') }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In |<span style="color: #6c63ff"> My Office Pal</span></h3>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <div class="form-group first">
                <label for="email">Username</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" type="password" id="password" name="password" required autocomplete="current-password">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <div class="control__indicator"></div>
                </label>
                {{-- <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>  --}}
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

              {{-- <span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>
              
              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div> --}}
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
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-90680653-2');
    </script>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <!-- <meta name="twitter:site" content="@bootstrapdash">
    <meta name="twitter:creator" content="@bootstrapdash">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Azia">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png"> -->

    <!-- Facebook -->
    <!-- <meta property="og:url" content="https://www.bootstrapdash.com/azia">
    <meta property="og:title" content="Azia">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
    <meta property="og:image:secure_url" content="https://www.bootstrapdash.com/azia/img/azia-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600"> -->

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>Shreekalyanam</title>

    <!-- vendor css -->
    <link href="{{asset('admin/lib/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/typicons.font/typicons.css')}}" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/azia.css')}}">

  </head>
  <body class="az-body">

    <div class="az-signin-wrapper">
      <div class="az-card-signup">
        <!-- <h1 class="az-logo text-center"><img src="{{asset('admin/img/logo.png')}}" width="200px" alt=""></h1> -->
        <div class="az-signup-header">
          <h2>Sign Up</h2>
          <h4>Enter details to create your account</h4>

          <form action="{{route('register.store')}}" method="post">
            @csrf
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter your firstname and lastname">
            </div><!-- form-group -->
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter your email">
            </div><!-- form-group -->
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter your password">
            </div><!-- form-group -->
            <button class="btn btn-az-primary btn-block" type="submit">Create Account</button>
            <!-- <div class="row row-xs">
              <div class="col-sm-6"><button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button></div>
              <div class="col-sm-6 mg-t-10 mg-sm-t-0"><button class="btn btn-primary btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button></div>
            </div>row -->
          </form>
        </div>
        <div class="az-signup-footer">
          <p>Already have an account? <a href="{{route('login')}}">Sign In</a></p>
        </div><!-- az-signin-footer -->
      </div><!-- az-card-signin -->
    </div><!-- az-signin-wrapper -->

    <script src="{{asset('admin/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/lib/ionicons/ionicons.js')}}"></script>
    <script src="{{asset('admin/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/js/jquery.cookie.js')}}" type="text/javascript"></script>

    <script src="{{asset('admin/js/azia.js')}}"></script>
    <script>
      $(function(){
        'use strict'

      });
    </script>
  </body>
</html>

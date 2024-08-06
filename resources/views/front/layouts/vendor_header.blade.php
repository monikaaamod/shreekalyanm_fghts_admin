<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('admin/css/snackbar.css') }}">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>@yield('title')</title>
  <!-- CSS Link -->
  <!-- <link rel="stylesheet" href="{{asset('/front/css/style.css')}}"> -->
  <link rel="stylesheet" href="{{asset('/front/css/style1.css')}}">
  <link rel="stylesheet" href="{{asset('/front/css/responsive.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/front/media/media.css')}}">

  <style>
    .display_none{
      display:none;
    }

    .tabes_dash li:hover {
      background-color: #EE902C;
      border-color: #EE902C;
      color: #000000;
    }

    .tabes_dash li.active {
      background-color: #EE902C;
      border-color: #EE902C;
      color: #000000;
    }

    .wallat_cash {
    border: 1px solid #DFDFDF;
}
.wallat_cash p span {
    float: right;
}
.wallat_cash p {
    font-weight: 500;
    font-size: 20px;
    text-transform: capitalize;
    color: #343434;
    margin: 10px;
}
.wallat_cash p img {
    padding-right: 10px;
}
.wallat_cash p span {
    font-weight: 500;
    font-size: 20px;
    color: #EE902C;
}

.top-header {
    height: 70px;
}

.navbar-nav img {
    height: 55px;
}

.tabes_nav li {
    list-style: none;
    /* border: 0px outset; */
    cursor: pointer;
    margin: 1px;
    width: auto;
    display: inline-block;
    color: #000000;
    padding: 5px;
    /* border-radius: 5px; */
    margin: 8px 0px 0px 20px;

}

.tabes_nav li:hover {
    /* background-color: #EE902C;
    border-color: #EE902C; */
    color: #000000;
    border-bottom: 1px solid #ed77a2;
}

.tabes_nav li.active {
   /* background-color: #EE902C;
    border-color: #EE902C; */
    color: #000000;
    border-bottom: 1px solid #ed77a2;
 
}

.dropdown-menu {
    top: 49px;
}

.table>:not(:last-child)>:last-child>* {
  font-size: 15px;
}
.table>:not(caption)>*>* {
  font-size:15px;
}
  </style>
  @yield('stylecss')
</head>
<body>
  <header class="top-header bg-dark">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-xl">
          <a class="navbar-brand logo d-flex" href="#">
          <img src="{{asset('front/images/subscribe.png')}}" class="h-8" alt="...">
           
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-lg-auto">
          <a href="{{route('index')}}"><img src="{{asset('front/images/logo.png')}}" alt=""></a>
            </div>
            <div class="navbar-nav ms-lg-4 links button">
            <div class="img-icon">
            <img src="{{asset('front/images/facebook.png')}}" style="height: auto;" alt="">
            <img src="{{asset('front/images/instagram.png')}}" style="height: auto;" alt="">
            <img src="{{asset('front/images/twitter.png')}}" style="height: auto;" alt="">
            <img src="{{asset('front/images/youtube.png')}}" style="height: auto;" alt="">
          </div>
            {{-- <a class="nav-item nav-link text-white" href="{{route('admin.logout')}}">Logout</a>
               <a class="nav-item nav-link text-white login" href="#">Login</a>  --}}
            </div>
            <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <header class="top-header bg-light border-bottom" style="height: 50px;">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark">
      <ul class="tabes_nav" style="padding:0; margin-left: -50px;">
      <a href="{{route('dashboard',base64_encode(Session::get('vendor_id')))}}" style="text-decoration:none;"><li id="dashboard">Home</li></a>
            @if(Route::current()->getName() != "vendor_gallery" && Route::current()->getName() != "edit_profile")
           {{-- <li class="new_lead">New Leads</li>
           <li class="processed">Processed</li> 
           <li class="payment">Payment Policy</li>
           <li class="review">Review's</li> --}}
           @endif
           {{-- <li class="sales">Sales</li>
           <li class="complete">Complete</li>
           <li class="wallet">My Wallet</li> --}}
           <a href="{{route('vendor_gallery',base64_encode(Session::get('vendor_id')))}}" style="text-decoration:none;"><li @if(Route::current()->getName() == "vendor_gallery") class="active" @endif>Work Upload</li></a>
           @if(Route::current()->getName() == "edit_profile")<li class="policy">Payment Policy</li>@endif
           @if(Route::current()->getName() == "edit_profile")<li class="profile active">Profile</li>@endif
         </ul>
         
         <div class="img-icon" @if(Route::current()->getName() != "vendor_gallery" && Route::current()->getName() != "edit_profile") style="width: 85%;margin-bottom: 25px;display: flex;justify-content: end;" @else style="width: 63%;margin-bottom: 25px;display: flex;justify-content: end;" @endif>
            <img id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" src="@if($vendor->image && $vendor->image != ''){{asset($vendor->image)}}@else{{asset('front/images/profile.png')}}@endif" style="height: 35px;width: 35px;border-radius: 20px;" alt="">
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{route('edit_profile',base64_encode(Session::get('vendor_id')))}}">Profile</a></li>
              <li class="new_lead"><a class="dropdown-item">Leads</a></li>
              <li><a class="dropdown-item" href="{{route('admin.logout')}}">Logout</a></li>
            </ul>
          </div>
      </nav>
    </div>
  </header>

  @yield('content')


 
<!-- footer -->
<footer class="footer">
  <div class="container-fluid">
    <div class="footer-footer">
      <div class="shree1">
        <a href="{{route('index')}}"><img src="{{asset('front/images/logo.png')}}" alt=""></a>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="footer-links">
            <ul>
              <li>
                <a href="{{route('index')}}">Home |</a>
                <a href="{{route('aboutus')}}">About Us |</a>
                <a href="{{route('video')}}">Video |</a>
                <a href="{{route('blog')}}">Inspirational Blogs |</a>
                <a href="{{route('weddingvendors')}}">Travel Planning |</a>
                <a href="{{route('weddingvendors')}}">Event Planning |</a>
                {{-- <a href="{{route('checkout')}}">Checkout |</a>
                <a href="{{route('choosecity')}}">Choosecity |</a> --}}
                <a href="{{route('weddingvendors')}}">Wedding vendors</a>
                {{--<a href="{{route('dashboard')}}">Dashboard |</a>--}}
                {{-- <a href="{{route('choosecity')}}">Choosecity |</a> 
                <a href="{{route('vendor_dashboard_table')}}">Choosecity |</a>
                <a href="{{route('vendor_gallery')}}">Choosecity |</a> --}}
                {{-- <a href="#">Portfolio |</a>
                 <a href="#">Contact |</a> --}}
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2">
          <div class="shree">
            <a href="{{route('index')}}"><img src="{{asset('front/images/logo.png')}}" alt=""></a>
          </div>
        </div>
        <div class="col-md-5">
          <div class="gmails">
            <p><img src="{{asset('front/images/phone.png')}}" alt=""> +91- 99999 99999, +91- 88888 88888 <span> <img src="{{asset('front/images/gmail.png')}}" alt=""> info@shreekalyanam@gmail.com</span></p>
            <p><img src="images/location.png" alt="">  P2, Awadh Puri, Opposite Ram Mandir, Lalkothi, Jaipur, Rajasthan, 302001</p>
          </div>
          <div class="gmails1">
            <p><img src="{{asset('front/images/phone.png')}}" alt=""> +91- 99999 99999, +91- 88888 88888</p>
            <p><img src="{{asset('front/images/gmail.pn')}}g" alt=""> info@shreekalyanam@gmail.com</p>
            <p><img src="{{asset('front/images/location.png')}}" alt=""> P2, Awadh Puri, Opposite Ram Mandir, <span>Lalkothi, Jaipur, Rajasthan, 302001</span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- footer-bottom -->
<section class="footer-bottom">
  <div class="copyright">
    <marquee behavior="alternate" direction="left">
    <p style="margin:0;padding:0;">2023 - All Right Reserved. | Shreekalyam</p>
    </marquee>
  </div>
 {{-- <div class="copyright1">
    <p>2023 - All Right Reserved. | Shreekalyam</p>
  </div> --}}
</section>

  <!-- JS Link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="{{asset('front/js/script.js')}}"></script>
  <script src="{{asset('front/js/counter.js')}}"></script>
  <script src="{{ asset('admin/js/snackbar.js') }}" charset="utf-8"></script>
  <script src="{{asset('front/js/app.js')}}" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>

  <script>
    function buttonLoading(processType, ele) {
            if (processType == 'loading') {
                ele.html(ele.attr('data-loading-text'));
                ele.attr('disabled', true);
            } else {
                ele.html(ele.attr('data-rest-text'));
                ele.attr('disabled', false);
            }
        }

        function successMsg(heading, message, html = "") {

            Snackbar.show({
                text: message,
                backgroundColor: '#232323',
                width: '475px',
                pos: 'bottom-right'
            });

        }

        function errorMsg(heading, message) {
            Snackbar.show({
                text: message,
                backgroundColor: '#930000',
                width: '475px',
                pos: 'bottom-right'
            });
        }

    
  </script>
  @yield('scriptjs')
</body>
</html>
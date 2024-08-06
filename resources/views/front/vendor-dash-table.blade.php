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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>S K Vendor Registration Detail one</title>
  <!-- CSS Link -->
  <!-- <link rel="stylesheet" href="{{asset('/front/css/style.css')}}"> -->
  <link rel="stylesheet" href="{{asset('/front/css/style1.css')}}">
  <link rel="stylesheet" href="{{asset('/front/css/responsive.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/front/media/media.css')}}">
</head>
<body>
  <header class="top-header bg-dark">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark px-0 py-3">
        <div class="container-xl">
          <a class="navbar-brand logo d-flex" href="#">
          <img src="{{asset('front/images/subscribe.png')}}" class="h-8" alt="...">
           <div class="img-icon">
            <img src="{{asset('front/images/facebook.png')}}" alt="">
            <img src="{{asset('front/images/instagram.png')}}" alt="">
            <img src="{{asset('front/images/twitter.png')}}" alt="">
            <img src="{{asset('front/images/youtube.png')}}" alt="">
          </div>
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
              <a class="nav-item nav-link text-white" href="#">Start selling</a>
              {{--  <a class="nav-item nav-link text-white login" href="#">Login</a>  --}}
            </div>
            <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>

<!-- Slider -->





<section class="desbor hoverdeshboard">
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="desbordes"><h4><span class="lowtext">Your</span> Deshboard <span class="su">.</span> <span class="lowtext">Today</span>       </h4></div>
       <ul class="tabes">
         <li class="Active"><h5>30</h5><h6>New Leads</h6></li>
         <li><h5>20</h5><h6>Processed</h6></li>
         <li><h5>15</h5><h6>Sales</h6></li>
         <li><h5>55</h5><h6>Complete</h6></li>
       </ul>
     </div>
   </div>
 </div>
</section>        

<section class="tables">
  <div class="container">
    <div class="row">
      <div class="table-responsive">
        <table class="table">
          <div class="">
          <thead>
            <tr>
              <th scope="col"><div class="form-check">
               <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
             </div></th>
             <th scope="col">Name</th>
             <th scope="col">Email Id</th>
             <th scope="col">Phone No.</th>
             <th scope="col">Date of Weddings</th>
             <th scope="col">Days of services</th>
             <th scope="col">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Status
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">One</a></li>
                      <li><a class="dropdown-item" href="#">Two</a></li>
                      <li><a class="dropdown-item" href="#">Three</a></li>
                    </ul>
             </th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row"><div class="form-check">
               <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
             </div></th>
             <td>govind</td>
             <td>govind@gmail.com</td>
             <td>9214957093</td>
             <td>20-4-2024</td>
             <td>5Days</td>
             <td>
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Active
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">One</a></li>
                      <li><a class="dropdown-item" href="#">Two</a></li>
                      <li><a class="dropdown-item" href="#">Three</a></li>
                    </ul>
            </tr>

            <tr>
              <th scope="row"><div class="form-check">
               <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
             </div></th>
             <td>govind</td>
             <td>govind@gmail.com</td>
             <td>9214957093</td>
             <td>20-4-2024</td>
             <td>5Days</td>
             <td> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Active
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">One</a></li>
                      <li><a class="dropdown-item" href="#">Two</a></li>
                      <li><a class="dropdown-item" href="#">Three</a></li>
                    </ul></td>
            </tr>
            <tr>
              <th scope="row"><div class="form-check">
               <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
             </div></th>
             <td>govind</td>
             <td>govind@gmail.com</td>
             <td>9214957093</td>
             <td>20-4-2024</td>
             <td>5Days</td>
             <td> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Active
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">One</a></li>
                      <li><a class="dropdown-item" href="#">Two</a></li>
                      <li><a class="dropdown-item" href="#">Three</a></li>
                    </ul></td>
            </tr>

            <tr>
              <th scope="row"><div class="form-check">
               <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
             </div></th>
             <td>govind</td>
             <td>govind@gmail.com</td>
             <td>9214957093</td>
             <td>20-4-2024</td>
             <td>5Days</td>
             <td> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Active
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">One</a></li>
                      <li><a class="dropdown-item" href="#">Two</a></li>
                      <li><a class="dropdown-item" href="#">Three</a></li>
                    </ul></td>
            </tr>

            <tr>
              <th scope="row"><div class="form-check">
               <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
             </div></th>
             <td>govind</td>
             <td>govind@gmail.com</td>
             <td>9214957093</td>
             <td>20-4-2024</td>
             <td>5Days</td>
             <td> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Active
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">One</a></li>
                      <li><a class="dropdown-item" href="#">Two</a></li>
                      <li><a class="dropdown-item" href="#">Three</a></li>
                    </ul></td>
            </tr>

            <tr>
              <th scope="row"><div class="form-check">
               <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
             </div></th>
             <td>govind</td>
             <td>govind@gmail.com</td>
             <td>9214957093</td>
             <td>20-4-2024</td>
             <td>5Days</td>
             <td> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Active
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">One</a></li>
                      <li><a class="dropdown-item" href="#">Two</a></li>
                      <li><a class="dropdown-item" href="#">Three</a></li>
                    </ul>
            </td>
          </tr>

          <tr>
            <th scope="row"><div class="form-check">
             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
           </div></th>
           <td>govind</td>
           <td>govind@gmail.com</td>
           <td>9214957093</td>
           <td>20-4-2024</td>
           <td>5Days</td>
           <td> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Active
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">One</a></li>
                      <li><a class="dropdown-item" href="#">Two</a></li>
                      <li><a class="dropdown-item" href="#">Three</a></li>
                    </ul></td>
          </tr>
       
          <tr>
            <th scope="row"><div class="form-check">
             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
           </div></th>
           <td>govind</td>
           <td>govind@gmail.com</td>
           <td>9214957093</td>
           <td>20-4-2024</td>
           <td>5Days</td>
           <td> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Active
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">One</a></li>
                      <li><a class="dropdown-item" href="#">Two</a></li>
                      <li><a class="dropdown-item" href="#">Three</a></li>
                    </ul></td>
          </tr>
       
          <tr>
            <th scope="row"><div class="form-check">
             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
           </div></th>
           <td>govind</td>
           <td>govind@gmail.com</td>
           <td>9214957093</td>
           <td>20-4-2024</td>
           <td>5Days</td>
           <td> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Active
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">One</a></li>
                      <li><a class="dropdown-item" href="#">Two</a></li>
                      <li><a class="dropdown-item" href="#">Three</a></li>
                    </ul></td>
          </tr>
        
          <tr>
            <th scope="row"><div class="form-check">
             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
           </div></th>
           <td>govind</td>
           <td>govind@gmail.com</td>
           <td>9214957093</td>
           <td>20-4-2024</td>
           <td>5Days</td>
           <td> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Active
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">One</a></li>
                      <li><a class="dropdown-item" href="#">Two</a></li>
                      <li><a class="dropdown-item" href="#">Three</a></li>
                    </ul></td>
          </tr>
        </tbody>
      </div>
      </table>
    </div>
  </div>
</div>
</section>




<section class="helpb">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
      </div>
      <div class="col-md-4">
        <button>HELP<i class="fa-solid fa-question"></i></button>
      </div>
    </div>
  </div>
</section>

<!-- gradient -->
<section class="gradient">
  <div class="container-fluid">
    <div class="footer-top">
      <a href="#">home <span>|</span></a>
      <a href="#">About us <span>|</span></a>
      <a href="#">Portfolio <span>|</span></a>
      <a href="#">Travel Planning <span>|</span></a>
      <a href="#">Event Planning <span>|</span></a>
      <a href="#">Video <span>|</span></a>
      <a href="#">Inspirational Blogs <span>|</span></a>
      <a href="#">Contact <span>|</span></a>
      <a href="#">home <span>|</span></a>
      <a href="#">About us <span>|</span></a>
      <a href="#">Portfolio <span>|</span></a>
      <a href="#">Travel Planning <span>|</span></a>
      <a href="#">Event Planning <span>|</span></a>
      <a href="#">Video <span>|</span></a>
      <a href="#">Inspirational Blogs <span>|</span></a>
      <a href="#">Contact <span>|</span></a>
      <a href="#">home <span>|</span></a>
      <a href="#">About us <span>|</span></a>
      <a href="#">Portfolio <span>|</span></a>
      <a href="#">Travel Planning <span>|</span></a>
      <a href="#">Event Planning <span>|</span></a>
      <a href="#">Video <span>|</span></a>
      <a href="#">Inspirational Blogs <span>|</span></a>
      <a href="#">Contact <span>|</span></a>
      <a href="#">home <span>|</span></a>
      <a href="#">About us <span>|</span></a>
      <a href="#">Portfolio <span>|</span></a>
      <a href="#">Travel Planning <span>|</span></a>
      <a href="#">Event Planning <span>|</span></a>
    </div>
  </div>
</section>

<!-- footer -->
<footer class="footer">
  <div class="container-fluid">
    <div class="footer-footer">
      <div class="shree1">
        <a href="index.html"><img src="images/logo.png" alt=""></a>
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
                <a href="{{route('comingsoon')}}">Travel Planning |</a>
                <a href="{{route('comingsoon')}}">Event Planning |</a>
                <a href="{{route('checkout')}}">Checkout |</a>
                <a href="{{route('choosecity')}}">Choosecity |</a>
                <a href="{{route('weddingvendors')}}">Wedding vendors |</a>
                {{-- <a href="{{route('dashboard')}}">Dashboard |</a> --}}
                <a href="#">Portfolio |</a>
                <a href="#">Contact |</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2">
          <div class="shree">
            <a href="index.html"><img src="images/logo.png" alt=""></a>
          </div>
        </div>
        <div class="col-md-5">
          <div class="gmails">
            <p><img src="images/phone.png" alt=""> +91- 99999 99999, +91- 88888 88888 <span> <img src="images/gmail.png" alt=""> info@shreekalyanam@gmail.com</span></p>
            <p><img src="images/location.png" alt="">  P2, Awadh Puri, Opposite Ram Mandir, Lalkothi, Jaipur, Rajasthan, 302001</p>
          </div>
          <div class="gmails1">
            <p><img src="images/phone.png" alt=""> +91- 99999 99999, +91- 88888 88888</p>
            <p><img src="images/gmail.png" alt=""> info@shreekalyanam@gmail.com</p>
            <p><img src="images/location.png" alt=""> P2, Awadh Puri, Opposite Ram Mandir, <span>Lalkothi, Jaipur, Rajasthan, 302001</span></p>
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
      <p>2023 - All Right Reserved. | Shreekalyam</p>
    </marquee>
  </div>
  <div class="copyright1">
    <p>2023 - All Right Reserved. | Shreekalyam</p>
  </div>
</section>

<!-- JS Link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="{{asset('front/script.js')}}"></script>
  <script src="{{asset('front/js/counter.js')}}"></script>
  <script src="{{asset('front/js/app.js')}}" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
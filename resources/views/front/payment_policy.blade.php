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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>S K Vendor Registration Detail one</title>
  <!-- CSS Link -->
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" type="text/css" href="media/media.css">
</head>
<body>
  <header class="top-header bg-dark">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark px-0 py-3">
        <div class="container-xl">
          <a class="navbar-brand logo d-flex" href="#">
          <a href="{{$social_id->youtube}}"><img src="{{asset('front/images/subscribe.png')}}" class="h-8" alt="..."></a>
          @php
            $social_id = socialId();
          @endphp
          <div class="img-icon"> 
          <a href="{{$social_id->facebook}}"><img src="{{asset($social_id->facebook_icon)}}" alt=""></a>
          <a href="{{$social_id->insta}}"><img src="{{asset($social_id->instagram_icon)}}" alt=""></a>
          <a href="{{$social_id->twitter}}"><img src="{{asset($social_id->twitter_icon)}}" alt=""></a>
          <a href="{{$social_id->youtube}}"><img src="{{asset($social_id->youtube_icon)}}" alt=""></a>
          </div>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-lg-auto">
              <img src="images/logo.png" alt="">
            </div>
            <div class="navbar-nav ms-lg-4 links button">
              <a class="nav-item nav-link text-white" href="#">Start selling</a>
              <a class="nav-item nav-link text-white login" href="#">Login</a>
            </div>
            <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <!-- Slider -->
  <section class="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators"></div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/banner3.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images/banner3.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images/banner3.png" class="d-block w-100" alt="...">
        </div>
      </div>
    </div>
  </section>
   

  <div class="container">
    <div class="pulvinar">
      <div class="row">
        <div class="col-md-12">
          <h5 class="paymentpolice"><i class="bi bi-check2-circle"></i>Payment Policy</h5>
          <p class="Bibendum">Lorem ipsum dolor sit amet consectetur. Sit nisi congue elementum vulputate aliquam interdum morbi nullam maecenas. Pellentesque nisi nulla risus ornare egestas in pellentesque eget eleifend. Porttitor sem congue lacinia semper pellentesque quis at lorem. Velit turpis purus elit mattis. Nisl proin sed quam vehicula eu. At volutpat auctor enim nec adipiscing sollicitudin viverra quam. Ornare tempor at condimentum sed pretium malesuada quis pulvinar. Bibendum sagittis in imperdiet amet facilisis. Lorem nunc neque libero fermentum dis quam pulvinar.</p>
          <h5 class="paymentpolice"><i class="bi bi-check2-circle"></i>Payment Policy</h5>
          <p class="Bibendum">Lorem ipsum dolor sit amet consectetur. Sit nisi congue elementum vulputate aliquam interdum morbi nullam maecenas. Pellentesque nisi nulla risus ornare egestas in pellentesque eget eleifend. Porttitor sem congue lacinia semper pellentesque quis at lorem. Velit turpis purus elit mattis. Nisl proin sed quam vehicula eu. At volutpat auctor enim nec adipiscing sollicitudin viverra quam. Ornare tempor at condimentum sed pretium malesuada quis pulvinar. Bibendum sagittis in imperdiet amet facilisis. Lorem nunc neque libero fermentum dis quam pulvinar.</p>
          <h5 class="paymentpolice"><i class="bi bi-check2-circle"></i>Payment Policy</h5>
          <p class="Bibendum">Lorem ipsum dolor sit amet consectetur. Sit nisi congue elementum vulputate aliquam interdum morbi nullam maecenas. Pellentesque nisi nulla risus ornare egestas in pellentesque eget eleifend. Porttitor sem congue lacinia semper pellentesque quis at lorem. Velit turpis purus elit mattis. Nisl proin sed quam vehicula eu. At volutpat auctor enim nec adipiscing sollicitudin viverra quam. Ornare tempor at condimentum sed pretium malesuada quis pulvinar. Bibendum sagittis in imperdiet amet facilisis. Lorem nunc neque libero fermentum dis quam pulvinar.</p>
          <h5 class="paymentpolice"><i class="bi bi-check2-circle"></i>Payment Policy</h5>
          <p class="Bibendum">Lorem ipsum dolor sit amet consectetur. Sit nisi congue elementum vulputate aliquam interdum morbi nullam maecenas. Pellentesque nisi nulla risus ornare egestas in pellentesque eget eleifend. Porttitor sem congue lacinia semper pellentesque quis at lorem. Velit turpis purus elit mattis. Nisl proin sed quam vehicula eu. At volutpat auctor enim nec adipiscing sollicitudin viverra quam. Ornare tempor at condimentum sed pretium malesuada quis pulvinar. Bibendum sagittis in imperdiet amet facilisis. Lorem nunc neque libero fermentum dis quam pulvinar.</p>
          <h5 class="paymentpolice"><i class="bi bi-check2-circle"></i>Payment Policy</h5>
          <p class="Bibendum">Lorem ipsum dolor sit amet consectetur. Sit nisi congue elementum vulputate aliquam interdum morbi nullam maecenas. Pellentesque nisi nulla risus ornare egestas in pellentesque eget eleifend. Porttitor sem congue lacinia semper pellentesque quis at lorem. Velit turpis purus elit mattis. Nisl proin sed quam vehicula eu. At volutpat auctor enim nec adipiscing sollicitudin viverra quam. Ornare tempor at condimentum sed pretium malesuada quis pulvinar. Bibendum sagittis in imperdiet amet facilisis. Lorem nunc neque libero fermentum dis quam pulvinar.</p>
        </div>
      </div>
    </div>
  </div>
  

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
                <a href="#">Home |</a>
                <a href="#">About Us |</a>
                <a href="#">Portfolio |</a>
                <a href="#">Travel Planning |</a>
                <a href="#">Event Planning |</a>
              </li>
              <li>
                <a href="#">Video |</a>
                <a href="#">Inspirational Blogs |</a>
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
  <script src="script.js"></script>
  <script src="js/counter.js"></script>
  <script src="js/app.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
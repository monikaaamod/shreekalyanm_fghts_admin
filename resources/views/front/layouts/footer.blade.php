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
                <a href="{{route('choosecity')}}">Choosecity |</a>--}}
                <a href="{{route('weddingvendors')}}">Wedding vendors |</a> 
                <a href="{{route('faqs')}}">Faqs |</a> 
                <a href="{{route('privacy_policy')}}">Privacy Policy</a> 
                {{--<a href="{{route('dashboard')}}">Dashboard |</a>
                 <a href="{{route('choosecity')}}">Choosecity |</a> 
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
        @php
            $contact_detail = getContactDetails();
        @endphp
        <div class="col-md-5">
          <div class="gmails">
            <p><img src="{{asset('front/images/phone.png')}}" alt=""> +91- {{$contact_detail->mobile}} <span> <img src="{{asset('front/images/gmail.png')}}" alt=""> {{$contact_detail->email}}</span></p>
            <p><img src="images/location.png" alt="">  {{$contact_detail->address}}</p>
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
    <p>2023 - All Right Reserved. | Shreekalyam</p>
    </marquee>
  </div>
  <!-- <div class="copyright1">
    <p>2023 - All Right Reserved. | Shreekalyam</p>
  </div> -->
</section>

    <!-- JS Link -->
    <script src="{{asset('front/js/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/js/snackbar.js') }}" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('front/js/counter.js')}}"></script>
    <script src="{{asset('front/js/script.js')}}"></script>
    <script src="{{asset('front/js/multicarousel.js')}}"></script>
    <script src="{{asset('front/js/count.js')}}"></script>
    <script src="{{asset('front/js/imgUpload.js')}}"></script>
    <script src="{{asset('front/js/tab-panel.js')}}"></script>
    <script src="{{asset('front/js/app.js')}}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     <!-- JS Link -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>

  <script>
      $('.showpast').click(function(){
        var id = $(this).attr('data-id');
        // alert(id);
        var image_id = "#largeImage" + id;
      $(image_id).attr('src',$(this).attr('src').replace('thumb','large'));
      $('#description').html($(this).attr('alt'));
    });

    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 2,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      }
    });


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

        function isNumberKey(evt) {

          var charCode = (evt.which) ? evt.which : evt.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))
              return false;
              return true;
          }

        function isCharKey(evt){
          var charCode = (evt.which) ? evt.which : evt.keyCode
          if (charCode > 32 && (charCode < 97 || charCode > 122) && (charCode < 65 || charCode > 90))
          return false;
          return true;
        }

   
  </script>
  
    @yield('inlinejs')

  </body>
</html>
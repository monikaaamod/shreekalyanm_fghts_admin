@extends('front.layouts.vendor_header')
@section('stylecss')
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

/* image model */


    
.modal {
    display: none;
    position: fixed;
    z-index: 10000;
    padding-top: 40px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.7);
}
#caption,
.modal-content {
    margin: auto;
    display: block;
    width: 100%;
    height:100%;
    max-width: 1200px;
}
#caption {
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}
#caption,
.modal-content {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}
@-webkit-keyframes zoom {
    from {
        -webkit-transform: scale(0);
    }
    to {
        -webkit-transform: scale(1);
    }
}
@-moz-keyframes zoom {
    from {
        -moz-transform: scale(0);
    }
    to {
        -moz-transform: scale(1);
    }
}
@-o-keyframes zoom {
    from {
        -o-transform: scale(0);
    }
    to {
        -o-transform: scale(1);
    }
}
@-ms-keyframes zoom {
    from {
        -ms-transform: scale(0);
    }
    to {
        -ms-transform: scale(1);
    }
}
@keyframes zoom {
    from {
        transform: scale(0);
    }
    to {
        transform: scale(1);
    }
}
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: 300;
}
.close:focus,
.close:hover {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}
@media only screen and (max-width: 700px) {
    .modal-content {
        width: 100%;
    }
}
  </style>
@endsection
@section('content')

  


<section class="desbor hoverdeshboard Gallery">
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="desbordes"><h4>Work Upload</h4></div>
       <ul class="tabes">
         <li class="active Gallerys" id="image-tab"><h5>49</h5><h6>Images</h6></li>
         <li class="Gallerys" id="video-tab"><h5>20</h5><h6>Video</h6></li>
       </ul>
     </div>
   </div>
 </div>
</section>        


<section class="Gallery" id="image">
  <div class="container">
    <form action="{{route('upload-work',base64_encode($vendor->id))}}" id="submitForm" enctype="multipart/form-data" method="post">
      @csrf
    <div class="row">
        <h5>Images</h5>
     
      <ul class="Gallerys">
        <li class="Uploadimages">   <div class="Neon Neon-theme-dragdropbox">
        <input style="z-index: 999; opacity: 0; width: 100px; height: 66px; position: absolute; right: 0px; left: 0px; margin-right: auto; margin-left: auto;" accept="image/png, image/jpeg" name="image[]" id="past_work" onchange="preview_image();" multiple="multiple" type="file">
        <div class="Neon-input-dragDrop"><div class="Neon-input-inner"><i class="fa-solid fa-arrow-up-from-bracket"></i></a></div></div>
        </div></li>
        @foreach($vendor->past_work as $key=>$val)
          @if($val->is_image == 1)
            <li>
              <img src="{{asset($val->pastimage)}}"
                class="w-100 shadow-1-strong rounded mb-4"
                alt="Boat on Calm Water" onclick='getImagePreview(this);' height='75px'/>
            </li>
          @endif
        @endforeach
        <ul class="Gallerys" id="preview">

        </ul>
    
  </ul>
        <button class="btn btn-lg" type="submit" id="submitButton" style="width:16%;">Add Past Work</button>
     </div>
     </form>
  </div>
</section>


<section class="Gallery display_none" id="video">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h5>Videos</h5>
      </div>
      @if($vid_count < 6)
        <div class="col-md-6">
          <button class="btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="font-size:30px; padding: 0 0.6rem;">+</button>
        </div>
      @endif
      <ul class="Gallerys">
       {{-- <li class="Uploadimages">   <div class="Neon Neon-theme-dragdropbox">
        <input style="z-index: 999; opacity: 0; width: 100px; height: 66px; position: absolute; right: 0px; left: 0px; margin-right: auto; margin-left: auto;" name="files[]" id="filer_input2" multiple="multiple" type="file">
        <div class="Neon-input-dragDrop"><div class="Neon-input-inner"><i class="fa-solid fa-arrow-up-from-bracket"></i></a></div></div>
        </div></li> --}}
        @foreach($vendor->past_work as $key=>$val)
          @if($val->is_image == 0)
            <li>
            <!-- <iframe class="w-100 shadow-1-strong rounded mb-4" style="vertical-align: middle;" width="100%" height="100%" class="myVideo12" src="{{asset($val->pastimage)}}" ></iframe> -->
            <img
                src="{{asset($val->thumbnail)}}"
                class="w-100 shadow-1-strong rounded mb-4"
                alt="Boat on Calm Water" id="{{$val->id}}" onclick='getVideoPreview(this);' height='75px'/>
                <input type="hidden" id="vid{{$val->id}}" value="{{asset($val->pastimage)}}">
            </li>
          @endif
        @endforeach
        
  </ul>
  
     </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" style="padding-top:0;" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Video</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('vendor/video',base64_encode($vendor->id))}}" id="submitForm1" method="post">
          @csrf
        <input type="text" name="title" id="title" placeholder="Enter Video Title" class="form-control mb-2">
        <input type="text" name="past_videos" id="past_videos" placeholder="Enter You Tube Video Url" class="form-control mb-2">
        <div class="row mb-4">
          <div class="col-md-6">
            <button type="button" class="btn-sm text-light mt-5" onclick="addNewvideo();" style="background-color:#7bb13c; border:none;">Generate Thumbnail</button>
            <input type="hidden" name="thumbnail" id="thumbnail">
          </div>
          <div class="col-md-6">
            <img id="thumb" style="height: 125px;width: 125px;">
          </div>
        </div>
        <div class="local-forms">
          <textarea class="ckeditor form-control mb-3" placeholder="Enter Video Description" name="des_vid" id="des_vid" cols="15" rows="5"></textarea>
        </div>
        <div class="local-forms">
          <input type="text" name="video_category" id="video_category" value="{{$video_cat->category_name}}" readonly>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submitButton1">Add</button>
      </div>
    </div>
  </div>
</div>
<!-- End Model -->



{{-- <section class="helpb">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
      </div>
      <div class="col-md-4">
        <button>HELP<i class="fa-solid fa-question"></i></button>
      </div>
    </div>
  </div>
</section> --}}

<div id="myModal" class="modal">
  <span class="close">X</span>
  <img class="modal-content" id="img01">
  <iframe class="modal-content" width="100%" height="100%" class="myVideo12" src="" id="video01"></iframe>
  
</div>

@endsection
@section('scriptjs')
  <script>
    $("#video-tab").click(function() {
      $("#image-tab").removeClass('active');
      $("#video-tab").addClass('active');
      $("#image").addClass('display_none');
      $("#video").removeClass('display_none');

    });


    $("#image-tab").click(function() {
      $("#video-tab").removeClass('active');
      $("#image-tab").addClass('active');
      $("#video").addClass('display_none');
      $("#image").removeClass('display_none');

    });

    function preview_image() 
        {
          var total_file=document.getElementById("past_work").files.length;
          for(var i=0;i<total_file;i++)
          {
            // alert(event.target.files[i]);
            $('#preview').append("<li><img src='"+URL.createObjectURL(event.target.files[i])+"' id='"+i+"'class='w-100 shadow-1-strong rounded mb-4' height='75px'></li>");
          }
        }

        function getVideoPreview(video)
        {
          // Get the modal
              var modal = document.getElementById('myModal');
              var id = '#vid' + video.id;
            var vidsrc = $(id).val();

            // alert(vidsrc);
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var modalImg = document.getElementById("video01");
            
            
              // alert(modalImg);
                modal.style.display = "block";
                modalImg.src = vidsrc;
                $('#img01').css('display','none');
                $('#video01').css('display','block');
                // modalImg.alt = video.alt;
            

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
        }


        function getImagePreview(image)
    {
      // Get the modal
          var modal = document.getElementById('myModal');
        
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var modalImg = document.getElementById("img01");
        
        
          // alert(this.src);
            modal.style.display = "block";
            modalImg.src = image.src;
            modalImg.alt = image.alt;

            $('#video01').css('display','none');
                $('#img01').css('display','block');
        

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    }

    function addNewvideo()
    {
   
      var value = $('#past_videos').val();
      
    
      
      var video_image = getYouTubeThumbnail(value);
          // alert(video_image);
          $("#thumb").attr("src",video_image);
          $("#thumbnail").val(video_image);

      // $('#getThumb').append('<input type="hidden" name="thumbnail" value="'+video_image+'">');
      
    

      function getYouTubeThumbnail(url) {
          var videoId = url.match(/(?<=v=|\/embed\/|\/\d\/|\.be\/|\/embed\/|\/\d\/|\?v=|&v=|youtu.be\/|\/embed\/|\/\d\/|\?v=|&v=|\?vi=|&vi=|\/embed\/|\?feature=player_embedded&v=)[^#&?\/\s]+/);
        //   alert(videoId);
            if (videoId != null) {
              return "https://img.youtube.com/vi/" + videoId[0] + "/hqdefault.jpg";
            }
            return '';
      }
        
    }

    
  

    $(function () {
           $('#submitForm').submit(function(){
            var $this = $('#submitButton');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();
            $.ajax({
                url: $('#submitForm').attr('action'),
                type: "POST",
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#submitForm')[0]),
                success: function(data) {
                    if(data.status){
                        
                        successMsg('Create Banner', data.msg);
                        $('#submitForm')[0].reset();
                        setTimeout(function() {
                          // alert(data.url);
                          location.reload();
                                }, 1000);
                        
                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create Banner', data.msg);
                    }
                    buttonLoading('reset', $this);
                },
                error: function() {
                    errorMsg('Create Banner', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }
            });
            return false;
           });
           
        });



    $(function () {
           $('#submitForm1').submit(function(){
            var $this = $('#submitButton1');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();
            $.ajax({
                url: $('#submitForm1').attr('action'),
                type: "POST",
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#submitForm1')[0]),
                success: function(data) {
                    if(data.status){
                        
                        successMsg('Create Banner', data.msg);
                        $('#submitForm1')[0].reset();
                        setTimeout(function() {
                          // alert(data.url);
                          location.reload();
                                }, 1000);
                        
                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create Banner', data.msg);
                    }
                    buttonLoading('reset', $this);
                },
                error: function() {
                    errorMsg('Create Banner', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }
            });
            return false;
           });
           
        });
  </script>
@stop
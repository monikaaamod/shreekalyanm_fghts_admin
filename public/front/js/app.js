// step1

$("#data1").click(function() {
  
  if(!$('#register_name').val())
  {
    // alert('name');
    $('#invalid-name').addClass('showinvalid');

    $("#submitForm").submit();
    return;
  }
  if(!$('#register_email').val())
  {
    // alert('email');
    $('#invalid-email').addClass('showinvalid');
    $('#invalid-name').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }
  if(!$('#register_email').val().includes('@'))
  {
    // alert('register_email');
    $('#invalid-email-valid').addClass('showinvalid');
    $('#invalid-email').removeClass('showinvalid');
    $('#invalid-name').removeClass('showinvalid');
    $("#submitForm").submit();
      return;
  }
  if(!$('#register_mobile').val())
  {
    // alert('mobile');
    $('#invalid-mobile').addClass('showinvalid');
    $('#invalid-email').removeClass('showinvalid');
    $('#invalid-name').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }
  if($('#register_mobile').val().length > 10 || $('#register_mobile').val().length < 10)
  {
    // alert('register_mobile');
    $('#invalid-mobile-valid').addClass('showinvalid');
    $('#invalid-mobile').removeClass('showinvalid');
    $('#invalid-email').removeClass('showinvalid');
    $('#invalid-name').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }
  if(!$('#register_whatsapp_no').val())
  {
    // alert('what');
    $('#invalid-whatsapp').addClass('showinvalid');
    $('#invalid-mobile-valid').removeClass('showinvalid');
    $('#invalid-mobile').removeClass('showinvalid');
    $('#invalid-email').removeClass('showinvalid');
    $('#invalid-name').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }
  if($('#register_whatsapp_no').val().length > 10 || $('#register_whatsapp_no').val().length < 10)
  {
    // alert('register_whatsapp_no');
    $('#invalid-whatsapp-valid').addClass('showinvalid');
    $('#invalid-whatsapp').removeClass('showinvalid');
    $('#invalid-mobile-valid').removeClass('showinvalid');
    $('#invalid-mobile').removeClass('showinvalid');
    $('#invalid-email').removeClass('showinvalid');
    $('#invalid-name').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }
  if(!$('#register_gender').val() && $('#register_gender').val() == "")
  {
    // alert('register_gender');
    $('#invalid-gender').addClass('showinvalid');
    $('#invalid-whatsapp').removeClass('showinvalid');
    $('#invalid-whatsapp-valid').removeClass('showinvalid');
    $('#invalid-mobile-valid').removeClass('showinvalid');
    $('#invalid-mobile').removeClass('showinvalid');
    $('#invalid-email').removeClass('showinvalid');
    $('#invalid-name').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }

  
  
  formsub(0);
  

  

});

// step2


$("#data2").click(function() {
  // alert();
  if(!$('#business_name').val())
  {
    $('#business-name').addClass('showinvalid');
    $("#submitForm").submit();
    return;
  }
  
  // if(!$('#business_number').val())
  // {
  //   // alert();
  //   $('#business-mobile').addClass('showinvalid');
  //   $('#business-name').removeClass('showinvalid');
  //   $("#submitForm").submit();
  //   return;
  // }

  // if($('#business_number').val().length > 10 || $('#business_number').val().length < 10)
  // {
  //   // alert();
  //   $('#invalid-business-mobile').addClass('showinvalid');
  //   $('#business-mobile').removeClass('showinvalid');
  //   $('#business-name').removeClass('showinvalid');
  //   $("#submitForm").submit();
  //   return;
  // }
  
  if(!$('#business_email').val())
  {
    // alert();
    $('#business-email').addClass('showinvalid');
    $('#business-mobile').removeClass('showinvalid');
    $('#business-name').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }
  // if(!$('#alternative_number').val())
  // {
  //   // alert();
  //   $('#alternative-mobile').addClass('showinvalid');
  //   $('#invalid-alternative-mobile').removeClass('showinvalid');
  //   $('#business-mobile').removeClass('showinvalid');
  //   $('#business-name').removeClass('showinvalid');
  //   $("#submitForm").submit();
  //   return;
  // }

  // if($('#alternative_number').val().length > 10 || $('#alternative_number').val().length < 10)
  // {
  //   // alert();
  //   $('#invalid-alternative-mobile').addClass('showinvalid');
  //   $('#alternative-mobile').removeClass('showinvalid');
  //   $('#invalid-alternative-mobile').removeClass('showinvalid');
  //   $('#business-mobile').removeClass('showinvalid');
  //   $('#business-name').removeClass('showinvalid');
  //   $("#submitForm").submit();
  //   return;
  // }
  if(!$('#business_email').val().includes('@'))
  {
    $('#business-email-valid').addClass('showinvalid');
    $('#business-email').removeClass('showinvalid');
    $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#alternative-mobile').removeClass('showinvalid');
    $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#business-mobile').removeClass('showinvalid');
    $('#business-name').removeClass('showinvalid');
    $("#submitForm").submit();
      return;
  }

  
  
  if(!$('#category_name').val() && $('#category_name').val() == "")
  {
    // alert();
    $('#category-name').addClass('showinvalid');
    $('#business-email-valid').removeClass('showinvalid');
    $('#business-email').removeClass('showinvalid');
    $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#alternative-mobile').removeClass('showinvalid');
    $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#business-mobile').removeClass('showinvalid');
    $('#business-name').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }
  if(!$('#business_type').val() && $('#business_type').val() == "")
  {
    // alert();
    $('#business-type').addClass('showinvalid');
    $('#category-name').removeClass('showinvalid');
    $('#business-email-valid').removeClass('showinvalid');
    $('#business-email').removeClass('showinvalid');
    $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#alternative-mobile').removeClass('showinvalid');
    $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#business-mobile').removeClass('showinvalid');
    $('#business-name').removeClass('showinvalid');
    $("#submitForm").submit();
    
    return;
  }
  if(!$('#city_name').val() && $('#city_name').val() == "")
  {
    // alert();
    $('#city-name').addClass('showinvalid');
    $('#business-type').removeClass('showinvalid');
    $('#category-name').removeClass('showinvalid');
    $('#business-email-valid').removeClass('showinvalid');
    $('#business-email').removeClass('showinvalid');
    $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#alternative-mobile').removeClass('showinvalid');
    $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#business-mobile').removeClass('showinvalid');
    $('#business-name').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }

  if(!$('#pincode').val())
  {
    // alert();
    $('#invalid-pincode').addClass('showinvalid');
    $('#city-name').removeClass('showinvalid');
    $('#business-type').removeClass('showinvalid');
    $('#category-name').removeClass('showinvalid');
    $('#business-email-valid').removeClass('showinvalid');
    $('#business-email').removeClass('showinvalid');
     $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#alternative-mobile').removeClass('showinvalid');
    $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#business-mobile').removeClass('showinvalid');
    $('#business-name').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }

  if(!$('#about_business').val())
  {
    // alert();
    $('#about-business').addClass('showinvalid');
    $('#invalid-pincode').removeClass('showinvalid');
    $('#city-name').removeClass('showinvalid');
    $('#business-type').removeClass('showinvalid');
    $('#category-name').removeClass('showinvalid');
    $('#business-email-valid').removeClass('showinvalid');
    $('#business-email').removeClass('showinvalid');
     $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#alternative-mobile').removeClass('showinvalid');
    $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#business-mobile').removeClass('showinvalid');
    $('#business-name').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }

  if(!$('#business_location').val())
  {
    // alert();
    $('#business-location').addClass('showinvalid');
    $('#about-business').removeClass('showinvalid');
    $('#invalid-pincode').removeClass('showinvalid');
    $('#city-name').removeClass('showinvalid');
    $('#business-type').removeClass('showinvalid');
    $('#category-name').removeClass('showinvalid');
    $('#business-email-valid').removeClass('showinvalid');
    $('#business-email').removeClass('showinvalid');
     $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#alternative-mobile').removeClass('showinvalid');
    $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#business-mobile').removeClass('showinvalid');
    $('#business-name').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }

  if(!$('#latitude').val())
  {
    // alert();
    $('#invalid-latitude').addClass('showinvalid');
    $('#business-location').removeClass('showinvalid');
    $('#about-business').removeClass('showinvalid');
    $('#invalid-pincode').removeClass('showinvalid');
    $('#city-name').removeClass('showinvalid');
    $('#business-type').removeClass('showinvalid');
    $('#category-name').removeClass('showinvalid');
    $('#business-email-valid').removeClass('showinvalid');
    $('#business-email').removeClass('showinvalid');
     $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#alternative-mobile').removeClass('showinvalid');
    $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#business-mobile').removeClass('showinvalid');
    $('#business-name').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }

  if(!$('#longitude').val())
  {
    // alert();
    $('#invalid-longitude').addClass('showinvalid');
    $('#invalid-latitude').removeClass('showinvalid');
    $('#business-location').removeClass('showinvalid');
    $('#about-business').removeClass('showinvalid');
    $('#invalid-pincode').removeClass('showinvalid');
    $('#city-name').removeClass('showinvalid');
    $('#business-type').removeClass('showinvalid');
    $('#category-name').removeClass('showinvalid');
    $('#business-email-valid').removeClass('showinvalid');
    $('#business-email').removeClass('showinvalid');
     $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#alternative-mobile').removeClass('showinvalid');
    $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#business-mobile').removeClass('showinvalid');
    $('#business-name').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }

  if(!$('#image').val())
  {
    // alert();
    $('#invalid-image').addClass('showinvalid');
    $('#invalid-longitude').removeClass('showinvalid');
    $('#invalid-latitude').removeClass('showinvalid');
    $('#business-location').removeClass('showinvalid');
    $('#about-business').removeClass('showinvalid');
    $('#invalid-pincode').removeClass('showinvalid');
    $('#city-name').removeClass('showinvalid');
    $('#business-type').removeClass('showinvalid');
    $('#category-name').removeClass('showinvalid');
    $('#business-email-valid').removeClass('showinvalid');
    $('#business-email').removeClass('showinvalid');
     $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#alternative-mobile').removeClass('showinvalid');
    $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#business-mobile').removeClass('showinvalid');
    $('#business-name').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }

  if(!$('#banner').val())
  {
    // alert();
    $('#invalid-banner').addClass('showinvalid');
    $('#invalid-longitude').removeClass('showinvalid');
    $('#invalid-latitude').removeClass('showinvalid');
    $('#invalid-image').removeClass('showinvalid');
    $('#business-location').removeClass('showinvalid');
    $('#about-business').removeClass('showinvalid');
    $('#invalid-pincode').removeClass('showinvalid');
    $('#city-name').removeClass('showinvalid');
    $('#business-type').removeClass('showinvalid');
    $('#category-name').removeClass('showinvalid');
    $('#business-email-valid').removeClass('showinvalid');
    $('#business-email').removeClass('showinvalid');
     $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#alternative-mobile').removeClass('showinvalid');
    $('#invalid-alternative-mobile').removeClass('showinvalid');
    $('#business-mobile').removeClass('showinvalid');
    $('#business-name').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }

  
  
  formsub(1);
  

  

});


// step3


$("#data3").click(function() {
  // alert();
  if(!$('#pan_number').val())
  {
    // alert();
    $('#pan-number').addClass('showinvalid');
    $("#submitForm").submit();
    return;
  }
  // if(!$('#gst_number').val())
  // {
  //   // alert();
  //   // $('#gst-number').addClass('showinvalid');
  //   $('#pan-number').removeClass('showinvalid');
  //   $("#submitForm").submit();
  //   return;
  // }
  if(!$('#pan_card').val())
  {
    $('#pan-card').addClass('showinvalid');
    $('#gst-number').removeClass('showinvalid');
    $('#pan-number').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }

  
  // if(!$('#gst_doc').val())
  // {
  //   // alert();
  //   // $('#gst-doc').addClass('showinvalid');
  //   $('#pan-card').removeClass('showinvalid');
  //   $('#gst-number').removeClass('showinvalid');
  //   $('#pan-number').removeClass('showinvalid');
  //   $("#submitForm").submit();
  //   return;
  // }
  if(!$('#cheque').val())
  {
    // alert();
    $('#cheque-valid').addClass('showinvalid');
    $('#gst-doc').removeClass('showinvalid');
    $('#pan-card').removeClass('showinvalid');
    $('#gst-number').removeClass('showinvalid');
    $('#pan-number').removeClass('showinvalid');
    $("#submitForm").submit();
    
    return;
  }
 

  if(!$('#account_number').val())
  {
    
    $('#account-number').addClass('showinvalid');
    $('#cheque-valid').removeClass('showinvalid');
    $('#gst-doc').removeClass('showinvalid');
    $('#pan-card').removeClass('showinvalid');
    $('#gst-number').removeClass('showinvalid');
    $('#pan-number').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }

  if(!$('#confirm_account').val())
  {
    // alert();
    $('#confirm-account').addClass('showinvalid');
    $('#account-number').removeClass('showinvalid');
    $('#cheque-valid').removeClass('showinvalid');
    $('#gst-doc').removeClass('showinvalid');
    $('#pan-card').removeClass('showinvalid');
    $('#gst-number').removeClass('showinvalid');
    $('#pan-number').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }

  if($('#confirm_account').val() != $('#account_number').val())
  {
    // alert();
    $('#confirm-account-valid').addClass('showinvalid');
    $('#confirm-account').removeClass('showinvalid');
    $('#account-number').removeClass('showinvalid');
    $('#cheque-valid').removeClass('showinvalid');
    $('#gst-doc').removeClass('showinvalid');
    $('#pan-card').removeClass('showinvalid');
    $('#gst-number').removeClass('showinvalid');
    $('#pan-number').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }

  if(!$('#bank_name').val())
  {
    // alert();
    $('#bank-name').addClass('showinvalid');
    $('#confirm-account-valid').removeClass('showinvalid');
    $('#confirm-account').removeClass('showinvalid');
    $('#account-number').removeClass('showinvalid');
    $('#cheque-valid').removeClass('showinvalid');
    $('#gst-doc').removeClass('showinvalid');
    $('#pan-card').removeClass('showinvalid');
    $('#gst-number').removeClass('showinvalid');
    $('#pan-number').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }

  if(!$('#ifce_code').val())
  {
    // alert();
    $('#ifce-code').addClass('showinvalid');
    $('#bank-name').removeClass('showinvalid');
    $('#confirm-account-valid').removeClass('showinvalid');
    $('#confirm-account').removeClass('showinvalid');
    $('#account-number').removeClass('showinvalid');
    $('#cheque-valid').removeClass('showinvalid');
    $('#gst-doc').removeClass('showinvalid');
    $('#pan-card').removeClass('showinvalid');
    $('#gst-number').removeClass('showinvalid');
    $('#pan-number').removeClass('showinvalid');
    $("#submitForm").submit();
    return;
  }

  
  
  formsub(2);
  

  

});



// step4


$("#data4").click(function() {
  // alert();
  if($('#checkbox').val())
  {
    if ($("input[type='checkbox'][name='check']:checked")){
      formsub(3);
  }
  else{

    $('#invalid-checkbox').addClass('showinvalid');
    $("#submitForm").submit();
    return;
  }
    
  }
  formsub(3);
 
});


// // step3


$("#data5").click(function() {
  // alert($('#past_work').length());
  if(!$('#past_work').val())
  {
    // alert();
    $('#past-work').addClass('showinvalid');
    $("#submitForm").submit();
    return;
  }
  // if(!$('.is_image').val())
  // {
  //   // alert();
  //   $('#past-work-video').addClass('showinvalid');
  //   $('#past-work').removeClass('showinvalid');
  //   $("#submitForm").submit();
  //   return;
  // }


  
  
  formsub(4);
  

  

});

$("#submitform").click(function(event){
  event.preventDefault();
  
  if(!$('#payment_des').val())
  {
    // alert();
    $('#payment-des').addClass('showinvalid');
    return;
  }
  if(!$('#cancellation_des').val())
  {
    // alert();
    $('#cancellation-des').addClass('showinvalid');
    $('#payment-des').removeClass('showinvalid');
    return;
  }
  // if(!$('#term_title').val())
  // {
  //   // alert();
  //   $('#term-title').addClass('showinvalid');
  //   return;
  // }
  if(!$('#term_des').val())
  {
    // alert();
    $('#term-des').addClass('showinvalid');
    $('#cancellation-des').removeClass('showinvalid');
    $('#payment-des').removeClass('showinvalid');
    return;
  }
  $("#submitForm").submit();

});





function formsub(val)
{
  // alert();
  const prevBtns = document.querySelectorAll(".btn-pre");
  const nextBtns = document.querySelectorAll(".btn-next");
  const progress = document.getElementById("progress");
  const formSteps = document.querySelectorAll(".form-step");
  const progressSteps = document.querySelectorAll(".progress-step");
  
  let formStepsNum = val;
  
  
        formStepsNum++;
        updateFormSteps();
        updateProgressbar();
      
  
    function updateFormSteps(){
      formSteps.forEach((formStep) => {
        formStep.classList.contains("active") &&
          formStep.classList.remove("active");
      });
    
      formSteps[formStepsNum].classList.add("active");
    }
  
    prevBtns.forEach((btn) => {
      btn.addEventListener("click", () => {
        formStepsNum--;
        updateFormSteps();
        updateProgressbar();
      });
    });
  
    function updateProgressbar() {
      progressSteps.forEach((progressStep, idx) => {
        if (idx < formStepsNum + 1) {
          progressStep.classList.add("active");
        } else {
          progressStep.classList.remove("active");
        }
      });
    
      const progressActive = document.querySelectorAll(".progress-step.active");
    
      progress.style.width =
        ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
    }


}

$(".btn-pre").click(function() {
  // alert();
  $('.showinvalid').removeClass('showinvalid');
});

$(document).ready(function() {
  $('#upload_profile').click(function(event) {
    event.preventDefault();
    $('#image').trigger('click');
  });
  });


$(document).ready(function() {
  $('#banner_upload').click(function(event) {
    event.preventDefault();
    $('#banner').trigger('click');
  });
  });


$(document).ready(function() {
  $('#upload_pan').click(function(event) {
    event.preventDefault();
    $('#pan_card').trigger('click');
  });
  });


$(document).ready(function() {
  $('#upload_gst').click(function(event) {
    event.preventDefault();
    $('#gst_doc').trigger('click');
  });
  });


$(document).ready(function() {
  $('#upload_cheque').click(function(event) {
    event.preventDefault();
    $('#cheque').trigger('click');
  });
  });






// function readURL(input) {
//   // alert(input);
//     var imgId = $(input).attr("data-id"); 
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function (e) {
//             $('#' + imgId).attr('src', e.target.result);
//         };
//         reader.readAsDataURL(input.files[0]);
//     }


//   }

  $(document).ready(function() {
    $('#upload_past_work').click(function(event) {
      event.preventDefault();
      $('#past_work').trigger('click');
    });
  });


 

    
  

  $(document).ready(function() {
   
    $('#imgPreview').click(function() {
      
      // Get the modal
        var modal = document.getElementById('myModal');
       
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var modalImg = document.getElementById("img01");
        
        
          // alert(this.src);
            modal.style.display = "block";
            modalImg.src = this.src;
            modalImg.alt = this.alt;
        

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    });
  });



  $(document).ready(function() {
   
    $('#imgPreview2').click(function() {
      
      // Get the modal
        var modal = document.getElementById('myModal');
       
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var modalImg = document.getElementById("img01");
        
        
          // alert(this.src);
            modal.style.display = "block";
            modalImg.src = this.src;
            modalImg.alt = this.alt;
        

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    });
  });
  $(document).ready(function() {
   
    $('#imgPreview3').click(function() {
      
      // Get the modal
        var modal = document.getElementById('myModal');
       
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var modalImg = document.getElementById("img01");
        
        
          // alert(this.src);
            modal.style.display = "block";
            modalImg.src = this.src;
            modalImg.alt = this.alt;
        

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    });
  });


  $(document).ready(function() {
   
    $('#imgPreview4').click(function() {
      
      // Get the modal
        var modal = document.getElementById('myModal');
       
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var modalImg = document.getElementById("img01");
        
        
          // alert(this.src);
            modal.style.display = "block";
            modalImg.src = this.src;
            modalImg.alt = this.alt;
        

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    });
  });


  $(document).ready(function() {
   
    $('#imgPreview5').click(function() {
      
      // Get the modal
        var modal = document.getElementById('myModal');
       
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var modalImg = document.getElementById("img01");
        
        
          // alert(this.src);
            modal.style.display = "block";
            modalImg.src = this.src;
            modalImg.alt = this.alt;
        

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    });
  });


 

 
    
  
    






  
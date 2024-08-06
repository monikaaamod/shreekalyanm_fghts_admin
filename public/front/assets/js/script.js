$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 200) {
        $(".theame-header").addClass("sticky-header");
    } else {
        $(".theame-header").removeClass("sticky-header");
    }
});

$('#offr-slider1, #offr-slider2').owlCarousel({
    autoplay:false,
    loop:false,
    margin:10,
    dots:false,
    nav:true,
    navText: ['<span class="fal fa-chevron-left owl-arrows"></span>', '<span class="fal fa-chevron-right owl-arrows"></span>'],
    autoplayTimeout:2000,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        768:{
            items:2,
        },
        1000:{
            items:3,
        }
    }
});
$('#partner-slider').owlCarousel({
    autoplay:true,
    loop:true,
    margin:10,
    dots:false,
    nav:false,
    autoplayTimeout:2000,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600: {
       items: 2,
    },
        768:{
            items:3,
        },
        1000:{
            items:5,
        }
    }
});

// featured-slider-start

$('#trpbook-slide').owlCarousel({
    autoplay:false,
    loop:true,
    margin:0,
    dots:false,
    nav:true,
    navText: ['<span class="fas fa-chevron-left arrows"></span>','<span class="fas fa-chevron-right arrows"></span>'],
    items:1
    });
    // featured-slider-end





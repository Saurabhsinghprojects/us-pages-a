$=jQuery;
$(function() {

    var slider_count1 = 1;
    $(".gamedata_img1 img").click(function() {
        $(".allimagesslider_slider1").show();
        if (slider_count1 == "1") {
            var swiper = new Swiper('.allimagesslider_slider1 .swiper-container', {
                pagination: '.allimagesslider_slider1 .swiper-pagination',
                paginationClickable: true,
                slidesPerView: 1,
                loop: true
            });
            slider_count1++;
        }
    });

    var slider_count2 = 1;
    $(".gamedata_img2 img").click(function() {
        $(".allimagesslider_slider2").show();
        if (slider_count2 == "1") {
            var swiper = new Swiper('.allimagesslider_slider2 .swiper-container', {
                pagination: '.allimagesslider_slider2 .swiper-pagination',
                paginationClickable: true,
                slidesPerView: 1,
                loop: true
            });
            slider_count2++;
        }
    });

    var slider_count3 = 1;
    $(".gamedata_img3 img").click(function() {
        $(".allimagesslider_slider3").show();
        if (slider_count3 == "1") {
            var swiper = new Swiper('.allimagesslider_slider3 .swiper-container', {
                pagination: '.allimagesslider_slider3 .swiper-pagination',
                paginationClickable: true,
                slidesPerView: 1,
                loop: true
            });
            slider_count3++;
        }
    });


  $(document).on('click', '.allimagesslider_bg', function(event) {
    event.preventDefault();
    /* Act on the event */
    $(".allimagesslider_info").hide();
  });

  $(document).on('click', '.allimagesslider_close', function(event) {
    event.preventDefault();
    /* Act on the event */
    $(".allimagesslider_info").hide();
  });

  

    var swiper = new Swiper('.testimonials_sec .swiper-container', {
          pagination: '.testimonials_sec .swiper-pagination',
          paginationClickable: true,
          slidesPerView:1,
          spaceBetween: 10
          //loop: true,
          //autoplay: 5000,
          //speed: 800,
          //infiniteLoop: true
    });

    $('.gamedata_img a.btn-gallery').on('click', function(event) {
        event.preventDefault();
        
        var gallery = $(this).attr('href');
    
        $(gallery).magnificPopup({
      delegate: 'a',
            type:'image',
            titleSrc: 'title',
            gallery: {
                enabled: true
            }
        }).magnificPopup('open');

    });

    $("form").submit(function(){
        var googleResponse = jQuery('#g-recaptcha-response').val();
        if (!googleResponse) {
            $('<p style="color:red !important" class=error-captcha"><span class="glyphicon glyphicon-remove " ></span>Please hit the checkmark. Show us you are human! :-)</p>" ').insertAfter("#capthca_response");
            return false;
        } else
        {            
          return true;
        }
    });

    
    

});



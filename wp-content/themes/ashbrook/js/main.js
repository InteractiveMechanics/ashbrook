$(document).ready(function(){


  // HOME SLIDER
  $('.home-slider').slick({
   		arrows: false,
   		dots: true
  });

  // LIBRARY SLIDER
  $('.library-slider').slick({
  		slidesToShow: 4,
  		slidesToScroll: 1,
      responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
  });


  var libraryArrowPrev = $('.library-slider').find('.slick-prev.slick-arrow');
  var libraryArrowNext = $('.library-slider').find('.slick-next.slick-arrow');

  libraryArrowPrev.hide();

  libraryArrowNext.click(function() {
  	$(this).parent().find('.slick-prev.slick-arrow').show(); 
  });

  // ANALYSIS SLIDER
  $('.analysis-slider').slick({
      arrows: true,
      dots: true,
  });

  var $status = $('.paging-info');
  var $slickElement = $('.analysis-slider');

  $slickElement.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
    //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
    var i = (currentSlide ? currentSlide : 0) + 1;
    $status.text(i + ' of ' + slick.slideCount);
  });


  // LIGHTGALLERY 

  if ($('img').hasClass('[class^="wp-image"]')) {
    $(this).addClass('lightgallery');
  }


  $(".lightgallery").lightGallery();


  
  // HIDE SEARCH SUBMIT BUTTON, SUBMIT ON PRESSING ENTER
  $('.search').each(function() {
        $(this).find('input').keypress(function(e) {
            // Enter pressed?
            if(e.which == 10 || e.which == 13) {
                this.form.submit();
            }
        });

        $(this).find('button[type=submit]').hide();
    });

    //MOBILE SEARCH BAR
    $('.mobile-search-bar').hide();

    $('.search-btn').click(function() {
        $('.mobile-search-bar').toggle();
        
    });

    // MOBILE MENU CLOSE
    $('.mobile-menu-close').click(function() {
      $('#bs-example-navbar-collapse-1').removeClass('in');
    });

    


});
$(document).ready(function(){


  // HOME SLIDER
  $('.home-slider').slick({
   		arrows: false,
   		dots: true
  });

  // LIBRARY SLIDER
  $('.library-slider').slick({
  		slidesToShow: 4,
  		slidesToScroll: 1
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


  // LIGHTGALLERY ON ANALYSIS 
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


});
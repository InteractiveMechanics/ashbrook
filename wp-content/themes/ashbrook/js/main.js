$(document).ready(function(){


  $('.home-slider').slick({
   		arrows: false,
   		dots: true
  });

  $('.library-slider').slick({
  		slidesToShow: 4,
  		slidesToScroll: 1
  });

  $('.slick-prev.slick-arrow').hide();

  $('.slick-next.slick-arrow').click(function() {
  	$(this).parent().find('.slick-prev.slick-arrow').show(); 
  });



});
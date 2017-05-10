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
  var $status = $('.paging-info');
  var $slickElement = $('.analysis-slider');
  var $detailcount = $('.detail-count');



  $slickElement.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
    //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
    var i = (currentSlide ? currentSlide : 0) + 1;
    $status.text(i + ' of ' + slick.slideCount);
    $detailcount.text(i);
  });


  $('.analysis-slider').slick({
      arrows: true,
      dots: true,
  });




  // LIGHTGALLERY 

  if (!$('.wp-caption').hasClass('lightgallery')) {
    $('.wp-caption').addClass('lightgallery');
    console.log('your function is working');
  }



  $(".lightgallery").lightGallery({
     subHtmlSelectorRelative: true
  }); 


  // SEARCH RESET


  $('.search-reset').click(function(){
      $(".selectpicker[name='post_tag']").selectpicker("val", "" );
      $(".selectpicker[name='post_era']").selectpicker("val", "" );
      $(".selectpicker[name='post_category']").selectpicker("val", "" );
      $(".search-label").hide();
  });

  $('.wp-pagenavi .previouspostslink').prev('.pages').addClass('no-margin');


  // SEARCH STUFF

  $('.wp-pagenavi > a').on('click', function(){
    var value = $(this).attr('value');
    $('#form-pagination').attr('value', value);
    document.getElementById("search-form").submit();
  });

  function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
  }

  $('.search-label').hide();

  if (getParameterByName("post_tag")) {
      $(".selectpicker[name='post_tag']").selectpicker("val", [getParameterByName("post_tag")] );
  }

  if (getParameterByName("post_category")) {
      $(".selectpicker[name='post_category']").selectpicker("val", [getParameterByName("post_category")]);
  }

  if (getParameterByName("post_era")) {
      $(".selectpicker[name='post_category']").selectpicker("val", [getParameterByName("post_era")]);
  }

  $('#search-form').on('submit', function(e) {
        e.preventDefault();
        var post_tag = "";
        var post_era = "";
        var post_category = "";

        var keyword = $('input[name="keyword"]').val();

        if ($('.selectpicker[name="post_tag"]').val()) {
          post_tag = $('.selectpicker[name="post_tag"]').val().join(',');

        }
        if ($('.selectpicker[name="post_era"]').val()) {
          post_era = $('.selectpicker[name="post_era"]').val().join(',');
        }
        if ($('.selectpicker[name="post_category"]').val()) {
          post_category = $('.selectpicker[name="post_category"]').val().join(',');
          
        }
        var pg = $('#form-pagination').val();

        window.location = '?keyword=' + keyword + "&post_tag=" + post_tag + "&post_era=" + post_era + "&post_category=" + post_category + "&pg=" + pg;
    });

    

    var toggleFilterLabel = function(filter,label) {
      if ( $(filter).val() ) {
          $(label).show();
        } else {
          $(label).hide();
       }

    }

    $("#post_category").change(function() {
      toggleFilterLabel('#post_category', '#post_category_label');
    });

    $('#post_era').change(function() {
       toggleFilterLabel('#post_era', '#post_era_label');
    });

    $('#post_tag').change(function() {
       toggleFilterLabel('#post_tag', '#post_tag_label');
    });




    





    //MOBILE SEARCH BAR
    $('.mobile-search-bar').hide();

    $('.search-btn').click(function() {
        $('.mobile-search-bar').toggle();
         if ($('#search-btn-svg').hasClass('clicked')) {
            $('#search-btn-svg').removeClass('clicked').addClass('not-clicked');
         } else {
            $('#search-btn-svg').removeClass('not-clicked').addClass('clicked');
         }
    });


    

    // MOBILE MENU CLOSE
    $('.mobile-menu-close').click(function() {
      $('#bs-example-navbar-collapse-1').removeClass('in');
    });

    
    // MENU 
    // 1st column, Sources
    $('#menu-item-150').addClass('col-sm-3 multi-column-dropdown-wrapper');

    // 2nd column, Collections
    $('#menu-item-148').addClass('col-sm-3 multi-column-dropdown-wrapper');

    // 3rd column, Analysis
    $('#menu-item-157').addClass('col-sm-2 multi-column-dropdown-wrapper skew');
     $('#menu-item-157').after('<li class="col-sm-4 multi-column-dropdown-wrapper nav-dropdown-image-wrapper"><div class="nav-dropdown-img"></div></li>');

    $('.dropdown').children('.dropdown-menu').addClass('multi-column columns-3 animated fadeIn');

   
    


});
jQuery(document).ready(function($){

  /* MEan Menu */
  jQuery('#main-nav').meanmenu({
    meanMenuContainer: '.main-navigation-holder',
    meanScreenWidth:"767"
  });

  /* slick slider */
  $('.main-blog-slider').slick();

  $('.main-slider-nav').slick();

  /* show/hide search form  */
  jQuery(".search-box").hide();

  jQuery(".search-btn").click(function(e) {

    var parent_element = $(this).parent();

    parent_element.children('.search-box').slideToggle('slow');

    parent_element.toggleClass('open');

    e.preventDefault();

  });

  /* Scroll to top */
  var $scroll_obj = $( '#btn-gotop' );

  $( window ).scroll(function(){

    if ( $( this ).scrollTop() > 100 ) {

      $scroll_obj.fadeIn();

    } else {

      $scroll_obj.fadeOut();

    }

  });

  $scroll_obj.click(function(){

    $( 'html, body' ).animate( { scrollTop: 0 }, 600 );

    return false;

  });  

  /* Sticky sidebar */
  var main_ref = $("body");
  
  if( main_ref.hasClass( 'sticky-sidebar-enabled' ) ){

    $( '#primary, #sidebar-primary' ).theiaStickySidebar();
    
  }

  //For news carousel
  $('.carousel-enabled .grid-news-items').slick({
    dots: false,
    infinite: true,
    speed: 600,
    slidesToShow: 3,
    arrows:true,
    autoplay:true,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 481,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  //For breaking news carousel
  $('#breaking-news').slick({
      autoplay: true,
      autoplaySpeed: 5000,
      dots: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      vertical: true,
      arrows:true,
      adaptiveHeight: true,
  });

});
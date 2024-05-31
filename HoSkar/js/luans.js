$(document).ready(function() {
	if ($(window).width() >= 768) {
	   
		var $cols = $('.sponsor_benefits.sponsor_benefits_slider .item');
		var maxHeight = 0;

		$cols.each(function() {
			var height = $(this).outerHeight();
			console.log(height);
			maxHeight = Math.max(maxHeight, height);
		});

		$cols.css('height', maxHeight*2 + 'px');
		$('.testimonials').css('height', maxHeight*2+50 + 'px');
	}

});

$('.js-angle-slider__list').slick({
  dots: false,
  infinite: false,
  centerMode: true,
  centerPadding: '35%',
	speed: 1000,
  slidesToShow: 1,
  draggable:false,
  initialSlide: 1,
  prevArrow: $('.prev'),
  nextArrow: $('.next'),
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '15px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '15px',
        slidesToShow: 1
      }
    }
  ]
});

$('.js-angle-slider__body .slick-arrow').click(function() {
	var currentSlide = $('.slick-current');
        if (currentSlide.css('transform') !== 'none') {
            currentSlide.css('transform', '');
        }
    $('.js-angle-slider__list .slick-current').prev().css({
		'transform': 'translate3d(-8%, 100px, 0px) rotate(-14deg)'
	});
	$('.js-angle-slider__list .slick-current').next().css({
		'transform': 'translate3d(8%, 100px, 0px) rotate(14deg)'
	});
});
$('.paginator .next.slick-arrow').on('click', function(){
	var currentIndex = $('.js-angle-slider__list').slick('slickCurrentSlide');
        if(currentIndex === 2) {
            $('.js-angle-slider__list .slick-slide:nth-child(1)').css('transform', 'translate3d(-15%, 40%, 0px) rotate(-28deg)');
        } else {
            $('.js-angle-slider__list .slick-slide:nth-child(1)').css('transform', '');
        }

});
$('.paginator .prev.slick-arrow').on('click', function(){
	var currentIndex = $('.js-angle-slider__list').slick('slickCurrentSlide');
        if(currentIndex === 0) {
            $('.js-angle-slider__list .slick-slide:nth-child(3)').css('transform', 'translate3d(15%, 40%, 0px) rotate(28deg)');
        } else {
            $('.js-angle-slider__list .slick-slide:nth-child(3)').css('transform', '');
        }

});
$('.blog_slider').slick({
  dots: false,
  infinite: false,
  centerMode: true,
  centerPadding: '25%',
  slidesToShow: 1,
  initialSlide: 2,
  draggable:false,
  prevArrow: $('.paginator .prev'),
  nextArrow: $('.paginator .next'),
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '15px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '15px',
        slidesToShow: 1,
		autoplay: true,
  		autoplaySpeed: 3000,
      }
    }
  ]
});
$(document).ready(function() {
  // add all to same gallery
  $(".gallery-list a.gallery-item").attr("data-fancybox","mygallery");
  // assign captions and title from alt-attributes of images:
  $(".gallery-list a.gallery-item").each(function(){
    $(this).attr("data-caption", $(this).find("img").attr("alt"));
    $(this).attr("title", $(this).find("img").attr("alt"));
  });
  // start fancybox:
	$(".gallery-list a.gallery-item").fancybox();
});

jQuery(document).ready(function() {
    jQuery(window).on("scroll", function () {
        //console.log(jQuery(this).scrollTop(),'top');
        var height_counter = jQuery(".block_counter_registration").offset().top - 300;
        //console.log(height_counter,'height_counter');
        if(jQuery(this).scrollTop() > height_counter){
            jQuery(".block_counter_registration").addClass("animation");

        }else{
            jQuery(".block_counter_registration").removeClass("animation");

        }
        
    });

    jQuery(document).ready(function(){
        if ($(window).width() < 1400) {
           jQuery(".arctext_text .elementor-heading-title").arctext({radius: 1000, dir: -1});
        }else if ($(window).width() < 1024){
            jQuery(".arctext_text .elementor-heading-title").arctext({radius: 500, dir: -1});
        }else if ($(window).width() < 800){
            jQuery(".arctext_text .elementor-heading-title").arctext({radius: 200, dir: -1}); 
        }else {
           jQuery(".arctext_text .elementor-heading-title").arctext({radius: 2000, dir: -1});
        }
        
    });
});

$('.filter-close').click(function(){
    $(this).toggleClass('dropdown');
	$('.frm-gallery').toggleClass('dropdown');
	if($(this).hasClass('dropdown')) {
		$(this).text("v");
	}
	else {
		$(this).text("x");
	}
    })
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
		infinite: false,
        centerPadding: '15px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
		infinite: false,
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
	if ($(window).width() > 1440) { 
		$('.js-angle-slider__list .slick-current').prev().css({
			'transform': 'translate3d(-8%, 100px, 0px) rotate(-14deg)'
		});
		$('.js-angle-slider__list .slick-current').next().css({
			'transform': 'translate3d(8%, 100px, 0px) rotate(14deg)'
		});
	} else if ($(window).width() >= 1024) { 
		$('.js-angle-slider__list .slick-current').prev().css({
			'transform': 'translate3d(-4%, 55px, 0px) rotate(-14deg)'
		});
		$('.js-angle-slider__list .slick-current').next().css({
			'transform': 'translate3d(4%, 55px, 0px) rotate(14deg)'
		});
	} else if ($(window).width() >= 768) { 
		$('.js-angle-slider__list .slick-current').prev().css({
			'transform': 'translate3d(-4%, 55px, 0px) rotate(-14deg)'
		});
		$('.js-angle-slider__list .slick-current').next().css({
			'transform': 'translate3d(4%, 55px, 0px) rotate(14deg)'
		});
	}
});
$('.paginator .next.slick-arrow').on('click', function(){
	var currentIndex = $('.js-angle-slider__list').slick('slickCurrentSlide');
        if(currentIndex === 2) {
            $('.js-angle-slider__list .slick-slide:nth-child(1)').css('transform', 'translate3d(-15%, 40%, 0px) rotate(-28deg)');
			$('.js-angle-slider__body .paginator li.next').addClass('slick-disabled');
        } else {
            $('.js-angle-slider__list .slick-slide:nth-child(1)').css('transform', '');
			$('.js-angle-slider__body .paginator li.next').removeClass('slick-disabled');
        }

});
$('.paginator .prev.slick-arrow').on('click', function(){
	var currentIndex = $('.js-angle-slider__list').slick('slickCurrentSlide');
        if(currentIndex === 0) {
            $('.js-angle-slider__list .slick-slide:nth-child(3)').css('transform', 'translate3d(15%, 40%, 0px) rotate(28deg)');
			$('.js-angle-slider__body .paginator li.prev').addClass('slick-disabled');
        } else {
            $('.js-angle-slider__list .slick-slide:nth-child(3)').css('transform', '');
			$('.js-angle-slider__body .paginator li.prev').removeClass('slick-disabled');
        }

});
if ($(window).width() < 768) { 
	$('.paginator .next').on('click', function(){
	var currentIndex = $('.js-angle-slider__list').slick('slickCurrentSlide');
        if(currentIndex === 2) {
			$('.js-angle-slider__body .paginator li.next').addClass('slick-disabled slick-arrow');
        } else {
			$('.js-angle-slider__body .paginator li.next').removeClass('slick-disabled slick-arrow');
			$('.js-angle-slider__body .paginator li.prev').removeClass('slick-disabled slick-arrow');
        }

});
$('.paginator .prev').on('click', function(){
	var currentIndex = $('.js-angle-slider__list').slick('slickCurrentSlide');
        if(currentIndex === 0) {
			$('.js-angle-slider__body .paginator li.prev').addClass('slick-disabled slick-arrow');
        } else {
			$('.js-angle-slider__body .paginator li.prev').removeClass('slick-disabled slick-arrow');
			$('.js-angle-slider__body .paginator li.next').removeClass('slick-disabled slick-arrow');
        }

});
}

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

//fancyBox
$(document).ready(function() {
    function setupGalleryItems() {
        $(".gallery-list a.gallery-item").each(function() {
            var $galleryItem = $(this);
            var galleryId = $galleryItem.closest(".gallery-list").attr('id');
            $galleryItem.attr("data-fancybox", galleryId);
            $galleryItem.attr("data-caption", $galleryItem.find("img").attr("alt"));
            $galleryItem.attr("title", $galleryItem.find("img").attr("alt"));
        });
        $(".gallery-list a.gallery-item").fancybox();
    }

    setupGalleryItems();

    $(".see-more").click(function() {
		setTimeout(function() { 
			$.fancybox.close();
			$(".gallery-list a.gallery-item").removeAttr("data-fancybox");
			setupGalleryItems();
		}, 1000);
        
    });
});



jQuery(document).ready(function() {
    jQuery(window).on("scroll", function () {
        console.log(jQuery(this).scrollTop(),'top');
        if ($(window).width() < 768){
            var height_counter = jQuery(".block_counter_registration").offset().top - 200;
            console.log(2);
        }else{
            var height_counter = jQuery(".block_counter_registration").offset().top - 300;
            console.log(1);
        }  
        console.log(height_counter,'height_counter');
        if(jQuery(this).scrollTop() > height_counter){
            jQuery(".block_counter_registration").addClass("animation");

        }else{
            jQuery(".block_counter_registration").removeClass("animation");

        }
        
    });

    jQuery(document).ready(function(){
		if ($(window).width() < 768){
            jQuery(".arctext_text .elementor-heading-title").arctext({radius: 600, dir: -1}); 
        }else if ($(window).width() < 993) {
            jQuery(".arctext_text .elementor-heading-title").arctext({radius: 800, dir: -1});
        }else if ($(window).width() < 1024) {
            jQuery(".arctext_text .elementor-heading-title").arctext({radius: 500, dir: -1});
        }else if ($(window).width() < 1400){
            jQuery(".arctext_text .elementor-heading-title").arctext({radius: 1200, dir: -1});
        }else if ($(window).width() < 1600){
            jQuery(".arctext_text .elementor-heading-title").arctext({radius: 1600, dir: -1}); 
        }else {
            jQuery(".arctext_text .elementor-heading-title").arctext({radius: 2000, dir: -1});	
        }
        
    });
});

$('.filter-close').click(function(){
    $(this).toggleClass('dropdown');
	$('.frm-gallery').toggleClass('dropdown');
	if($(this).hasClass('dropdown')) {
		$(this).html('<i class="fa fa-chevron-down" aria-hidden="true"></i>');
	}
	else {
		$(this).html('<i class="fa fa-times" aria-hidden="true"></i>');
	}
})


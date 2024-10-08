$(document).ready(function() {
	if ($(window).width() >= 768) {
	   
		var $cols = $('.sponsor_benefits.sponsor_benefits_slider .item');
		var maxHeight = 0;

		$cols.each(function() {
			var height = $(this).outerHeight();
			console.log(height);
			maxHeight = Math.max(maxHeight, height);
		});
        console.log(maxHeight*2-200,'height');
		$cols.css('height', maxHeight*2-250 + 'px');
		var numLabels = $(".testimonials .item").length;
		if(numLabels == 4 || numLabels == 6) {
			$('.testimonials').css('height', maxHeight*2 + 'px');
		} else {
			$('.testimonials').css('height', maxHeight*2-50 + 'px');
		}
	}



});
//slide homepage
$(document).ready(function() {
    if ($(window).width() >= 768) {
        function setTestimonial(positions, targetIndices, numItems, index) {
            $(".testimonials .item").removeClass("active").eq(index).addClass("active");

            for (let i = 0; i < numItems; i++) {
                $(".testimonials .item[for='t-" + (targetIndices[i] === 0 ? numItems : targetIndices[i]) + "']").css(positions[i]);
            }
        }
		
		const positionsSix = [
            { transform: "translate3d(0, 0, -0) rotateY(-0deg)", zIndex: 4, margin: '0', width: '45%' },
            { transform: "translate3d(25%, 33.33px, -0px) rotateY(-0deg)", zIndex: 3, margin: '0 0 0 5%', width: '45%' },
            { transform: "translate3d(50%, 66.66px, -0px) rotateY(-0deg)", zIndex: 2, margin: '0 0 0 10%', width: '45%' },
            { transform: "translate3d(0%, 100px, -0px) rotateY(-0deg)", zIndex: 1, margin: '0', width: '45%' },
            { transform: "translate3d(-50%, 66.66px, -0px) rotateY(-0deg)", zIndex: 2, margin: '0 10% 0 0', width: '45%' },
            { transform: "translate3d(-25%, 33.33px, -0px) rotateY(-0deg)", zIndex: 3, margin: '0 5% 0 0', width: '45%' }
        ];

        const positionsFive = [
            { transform: "translate3d(0, 0, -0) rotateY(-0deg)", zIndex: 4, margin: '0', width: '45%' },
            { transform: "translate3d(25%, 25px, -0px) rotateY(-0deg)", zIndex: 3, margin: '0 0 0 5%', width: '45%' },
            { transform: "translate3d(50%, 50px, -0px) rotateY(-0deg)", zIndex: 2, margin: '0 0 0 10%', width: '45%' },
            { transform: "translate3d(-50%, 50px, -0px) rotateY(-0deg)", zIndex: 2, margin: '0 10% 0 0', width: '45%' },
            { transform: "translate3d(-25%, 25px, -0px) rotateY(-0deg)", zIndex: 3, margin: '0 5% 0 0', width: '45%' }
        ];

        const positionsFour = [
            { transform: "translate3d(0, 0, -0) rotateY(-0deg)", zIndex: 4, margin: '0', width: '45%' },
            { transform: "translate3d(50%, 50px, -0px) rotateY(-0deg)", zIndex: 3, margin: '0 0 0 10%', width: '45%' },
            { transform: "translate3d(0px, 100px, 0px) rotateY(0deg)", zIndex: 2, margin: '0', width: '45%' },
            { transform: "translate3d(-50%, 50px, -0px) rotateY(0deg)", zIndex: 3, margin: '0 10% 0 0', width: '45%' }
        ];

        const positionsThree = [
            { transform: "translate3d(0, 0, -0) rotateY(-0deg)", zIndex: 4, margin: '0', width: '45%' },
            { transform: "translate3d(50%, 50px, -0px) rotateY(-0deg)", zIndex: 3, margin: '0 0 0 10%', width: '45%' },
            { transform: "translate3d(-50%, 50px, -0px) rotateY(-0deg)", zIndex: 3, margin: '0 10% 0 0', width: '45%' }
        ];

        const numLabels = $(".testimonials .item").length;
        const index = 1;

        if (numLabels === 6) {
            setTestimonial(positionsSix, [(index + 1) % 6, (index + 2) % 6, (index + 3) % 6, (index + 4) % 6, (index + 5) % 6, (index + 6) % 6], 6, index);
        } else if (numLabels === 5) {
            setTestimonial(positionsFive, [(index + 1) % 5, (index + 2) % 5, (index + 3) % 5, (index + 4) % 5, (index + 5) % 5], 5, index);
        } else if (numLabels === 4) {
            setTestimonial(positionsFour, [(index + 1) % 4, (index + 2) % 4, (index + 3) % 4, (index + 4) % 4], 4, index);
        } else if (numLabels === 3) {
            setTestimonial(positionsThree, [(index + 1) % 3, (index + 2) % 3, (index + 3) % 3], 3, index);
        }

        $(".testimonials .item").on("click", function() {
            const index = $(this).index();
            if (numLabels === 6) {
                setTestimonial(positionsSix, [(index + 1) % 6, (index + 2) % 6, (index + 3) % 6, (index + 4) % 6, (index + 5) % 6, (index + 6) % 6], 6, index);
            } else if (numLabels === 5) {
                setTestimonial(positionsFive, [(index + 1) % 5, (index + 2) % 5, (index + 3) % 5, (index + 4) % 5, (index + 5) % 5], 5, index);
            } else if (numLabels === 4) {
                setTestimonial(positionsFour, [(index + 1) % 4, (index + 2) % 4, (index + 3) % 4, (index + 4) % 4], 4, index);
            } else if (numLabels === 3) {
                setTestimonial(positionsThree, [(index + 1) % 3, (index + 2) % 3, (index + 3) % 3], 3, index);
            }
        });
    }
});


$('.js-angle-slider__list').slick({
  dots: false,
  infinite: true,
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
		infinite: true,
        centerPadding: '15px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
		infinite: true,
        centerPadding: '15px',
        slidesToShow: 1
      }
    }
  ]
});

$(window).on("load", function() {
    if ($(window).width() > 1440) { 
        $('.js-angle-slider__list .slick-current').prev().prev().css({
            'transform': 'translate3d(-16%, 40%, 0px) rotate(-28deg)'
        });
        $('.js-angle-slider__list .slick-current').prev().css({
            'transform': 'translate3d(-8%, 100px, 0px) rotate(-14deg)'
        });
        $('.js-angle-slider__list .slick-current').next().next().css({
            'transform': 'translate3d(16%, 40%, 0px) rotate(28deg)'
        });
    } else if ($(window).width() >= 768) { 
        $('.js-angle-slider__list .slick-current').prev().prev().css({
            'transform': 'translate3d(-8%, 30%, 0px) rotate(-28deg)'
        });
        $('.js-angle-slider__list .slick-current').prev().css({
            'transform': 'translate3d(-4%, 55px, 0px) rotate(-14deg)'
        });
        $('.js-angle-slider__list .slick-current').next().next().css({
            'transform': 'translate3d(8%, 30%, 0px) rotate(28deg)'
        });
    }
});

$('.js-angle-slider__body .slick-arrow').click(function() {
	var currentSlide = $('.slick-current');
        if (currentSlide.css('transform') !== 'none') {
            currentSlide.css('transform', '');
        }
	if ($(window).width() > 1440) { 
        $('.js-angle-slider__list .slick-current').prev().prev().css({
            'transform': 'translate3d(-16%, 40%, 0px) rotate(-28deg)'
        });
		$('.js-angle-slider__list .slick-current').prev().css({
			'transform': 'translate3d(-8%, 100px, 0px) rotate(-14deg)'
		});
		$('.js-angle-slider__list .slick-current').next().css({
			'transform': 'translate3d(8%, 100px, 0px) rotate(14deg)'
		});
        $('.js-angle-slider__list .slick-current').next().next().css({
            'transform': 'translate3d(16%, 40%, 0px) rotate(28deg)'
        });
	} else if ($(window).width() >= 768) { 
		$('.js-angle-slider__list .slick-current').prev().prev().css({
            'transform': 'translate3d(-8%, 30%, 0px) rotate(-28deg)'
        });
        $('.js-angle-slider__list .slick-current').prev().css({
            'transform': 'translate3d(-4%, 55px, 0px) rotate(-14deg)'
        });
        $('.js-angle-slider__list .slick-current').next().css({
            'transform': 'translate3d(4%, 55px, 0px) rotate(14deg)'
        });
        $('.js-angle-slider__list .slick-current').next().next().css({
            'transform': 'translate3d(8%, 30%, 0px) rotate(28deg)'
        });
	} else if ($(window).width() < 767) {
        $('.js-angle-slider__list .slick-current').prev().css({
            'transform': 'translate3d(-8%, 100px, 0px) rotate(-14deg)'
        });
        $('.js-angle-slider__list .slick-current').next().css({
            'transform': 'translate3d(8%, 100px, 0px) rotate(14deg)'
        });
    }
});
$('.paginator .next.slick-arrow').on('click', function(){
	var currentIndex = $('.js-angle-slider__list').slick('slickCurrentSlide');
    var slideCount = $('.js-angle-slider__list').slick('getSlick').slideCount;
    if(currentIndex === slideCount - slideCount) {
        if ($(window).width() > 1440) { 
            $('.slick-slide[data-slick-index="'+ (slideCount + 1)+'"]').css({'transform': 'translate3d(8%, 100px, 0px) rotate(14deg)'});
            $('.slick-slide[data-slick-index="'+ (slideCount)+ '"]').css({
                'transform': 'none',
                'opacity': '1'
            });
            $('.slick-slide[data-slick-index="'+ (slideCount - 1)+'"]').css({'transform': 'translate3d(-8%, 100px, 0px) rotate(-14deg)'});
            $('.slick-slide[data-slick-index="'+ (slideCount - 2)+'"]').css({'transform': 'translate3d(-16%, 40%, 0px) rotate(-28deg)'});
            setTimeout(function() {
                $('.slick-slide[data-slick-index="'+(slideCount - 1)+'"]').css({'transform': 'translate3d(16%, 40%, 0px) rotate(28deg)'});
                $('.slick-slide[data-slick-index="'+ (slideCount - 2)+'"]').css({
                    'transform': 'translate3d(8%, 100px, 0px) rotate(14deg)',
                    'transition': 'all 0s'
                });
                $('.slick-slide[data-slick-index="'+ (slideCount)+ '"]').css({
                    'opacity': '0.2'
                });
            }, 1000);
            setTimeout(function() {
                $('.slick-slide[data-slick-index="'+ (slideCount - 2)+'"]').css('transition', 'all 0.3s');
            }, 1200);
        } else if ($(window).width() >= 768) { 
            $('.slick-slide[data-slick-index="'+ (slideCount + 1)+'"]').css({'transform': 'translate3d(4%, 55px, 0px) rotate(14deg)'});
            $('.slick-slide[data-slick-index="'+ (slideCount)+ '"]').css({
                'transform': 'none',
                'opacity': '1'
            });
            $('.slick-slide[data-slick-index="'+ (slideCount - 1)+'"]').css({'transform': 'translate3d(-4%, 55px, 0px) rotate(-14deg)'});
            $('.slick-slide[data-slick-index="'+ (slideCount - 2)+'"]').css({'transform': 'translate3d(-8%, 30%, 0px) rotate(-28deg)'});
            setTimeout(function() {
                $('.slick-slide[data-slick-index="'+(slideCount - 1)+'"]').css({'transform': 'translate3d(8%, 30%, 0px) rotate(28deg)'});
                $('.slick-slide[data-slick-index="'+ (slideCount - 2)+'"]').css({
                    'transform': 'translate3d(4%, 55px, 0px) rotate(14deg)',
                    'transition': 'all 0s'
                });
                $('.slick-slide[data-slick-index="'+ (slideCount)+ '"]').css({
                    'opacity': '0.2'
                });
            }, 1000);
            setTimeout(function() {
                $('.slick-slide[data-slick-index="'+ (slideCount - 2)+'"]').css('transition', 'all 0.3s');
            }, 1200);
        }
    }

});
$('.paginator .prev.slick-arrow').on('click', function(){
	var currentIndex = $('.js-angle-slider__list').slick('slickCurrentSlide');
    var slideCount = $('.js-angle-slider__list').slick('getSlick').slideCount;
        if(currentIndex === slideCount - 1) {
            if ($(window).width() > 1440) { 
                $('.slick-slide[data-slick-index="1"]').css({'transform': 'translate3d(16%, 40%, 0px) rotate(28deg)'});
                $('.slick-slide[data-slick-index="0"]').css({'transform': 'translate3d(8%, 100px, 0px) rotate(14deg)'});
                $('.slick-slide[data-slick-index="-1"]').css({
                    'transform': 'none',
                    'opacity': '1'
                });
                $('.slick-slide[data-slick-index="-2"]').css({'transform': 'translate3d(-8%, 100px, 0px) rotate(-14deg)'});
                setTimeout(function() {
                    $('.slick-slide[data-slick-index="0"]').css({'transform': 'translate3d(-16%, 40%, 0px) rotate(-28deg)'});
                    $('.slick-slide[data-slick-index="1"]').css({
                        'transform': 'translate3d(-8%, 100px, 0px) rotate(-14deg)',
                        'transition': 'all 0s'
                    });
                    $('.slick-slide[data-slick-index="-1"]').css({
                        'opacity': '0.2'
                    });
                }, 1000);
                setTimeout(function() {
                    $('.slick-slide[data-slick-index="1"]').css('transition', 'all 0.3s');
                }, 1200);
            } else if ($(window).width() >= 768) { 
                $('.slick-slide[data-slick-index="1"]').css({'transform': 'translate3d(8%, 30%, 0px) rotate(28deg)'});
                $('.slick-slide[data-slick-index="0"]').css({'transform': 'translate3d(4%, 55px, 0px) rotate(14deg)'});
                $('.slick-slide[data-slick-index="-1"]').css({
                    'transform': 'none',
                    'opacity': '1'
                });
                $('.slick-slide[data-slick-index="-2"]').css({'transform': 'translate3d(-4%, 55px, 0px) rotate(-14deg)'});
                setTimeout(function() {
                    $('.slick-slide[data-slick-index="0"]').css({'transform': 'translate3d(-8%, 30%, 0px) rotate(-28deg)'});
                    $('.slick-slide[data-slick-index="1"]').css({
                        'transform': 'translate3d(-4%, 55px, 0px) rotate(-14deg)',
                        'transition': 'all 0s'
                    });
                    $('.slick-slide[data-slick-index="-1"]').css({
                        'opacity': '0.2'
                    });
                }, 1000);
                setTimeout(function() {
                    $('.slick-slide[data-slick-index="1"]').css('transition', 'all 0.3s');
                }, 1200);
            }
            
        }
});

if ($(window).width() < 768) { 
	$('.paginator .next').on('click', function(){
        $('.js-angle-slider__list .slick-current').prev().css({
            'transform': 'translate3d(-8%, 100px, 0px) rotate(-14deg)'
        });
        $('.js-angle-slider__list .slick-current').next().css({
            'transform': 'translate3d(8%, 100px, 0px) rotate(14deg)'
        });

        var currentIndex = $('.js-angle-slider__list').slick('slickCurrentSlide');
        var slideCount = $('.js-angle-slider__list').slick('getSlick').slideCount;
        if(currentIndex === slideCount - slideCount) {
            $('.slick-slide[data-slick-index="'+ (slideCount + 1)+'"]').css({'transform': 'translate3d(8%, 100px, 0px) rotate(14deg)'});
            $('.slick-slide[data-slick-index="'+ (slideCount)+ '"]').css({
                'transform': 'none',
                'opacity': '1'
            });
            $('.slick-slide[data-slick-index="'+ (slideCount - 1)+'"]').css({'transform': 'translate3d(-8%, 100px, 0px) rotate(-14deg)'});
            $('.slick-slide[data-slick-index="'+ (slideCount - 2)+'"]').css({'transform': 'translate3d(-16%, 40%, 0px) rotate(-28deg)'});
            setTimeout(function() {
                $('.slick-slide[data-slick-index="'+(slideCount - 1)+'"]').css({'transform': 'translate3d(16%, 40%, 0px) rotate(28deg)'});
                $('.slick-slide[data-slick-index="'+ (slideCount - 2)+'"]').css({
                    'transform': 'translate3d(8%, 100px, 0px) rotate(14deg)',
                    'transition': 'all 0s'
                });
                $('.slick-slide[data-slick-index="'+ (slideCount)+ '"]').css({
                    'opacity': '0.2'
                });
            }, 1000);
            setTimeout(function() {
                $('.slick-slide[data-slick-index="'+ (slideCount - 2)+'"]').css('transition', 'all 0.3s');
            }, 1200);
        }

	});
	$('.paginator .prev').on('click', function(){
        $('.js-angle-slider__list .slick-current').prev().css({
            'transform': 'translate3d(-8%, 100px, 0px) rotate(-14deg)'
        });
        $('.js-angle-slider__list .slick-current').next().css({
            'transform': 'translate3d(8%, 100px, 0px) rotate(14deg)'
        });

		var currentIndex = $('.js-angle-slider__list').slick('slickCurrentSlide');
        var slideCount = $('.js-angle-slider__list').slick('getSlick').slideCount;
        if(currentIndex === slideCount - 1) {
            $('.slick-slide[data-slick-index="1"]').css({'transform': 'translate3d(16%, 40%, 0px) rotate(28deg)'});
            $('.slick-slide[data-slick-index="0"]').css({'transform': 'translate3d(8%, 100px, 0px) rotate(14deg)'});
            $('.slick-slide[data-slick-index="-1"]').css({
                'transform': 'none',
                'opacity': '1'
            });
            $('.slick-slide[data-slick-index="-2"]').css({'transform': 'translate3d(-8%, 100px, 0px) rotate(-14deg)'});
            setTimeout(function() {
                $('.slick-slide[data-slick-index="0"]').css({'transform': 'translate3d(-16%, 40%, 0px) rotate(-28deg)'});
                $('.slick-slide[data-slick-index="1"]').css({
                    'transform': 'translate3d(-8%, 100px, 0px) rotate(-14deg)',
                    'transition': 'all 0s'
                });
                $('.slick-slide[data-slick-index="-1"]').css({
                    'opacity': '0.2'
                });
            }, 1000);
            setTimeout(function() {
                $('.slick-slide[data-slick-index="1"]').css('transition', 'all 0.3s');
            }, 1200);
            
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

$(document).ready(function() {
  // add all to same gallery
  $(".event_format a.gallery-item").attr("data-fancybox","mygallery");
  // assign captions and title from alt-attributes of images:
  $(".event_format a.gallery-item").each(function(){
    $(this).attr("data-caption", $(this).find("img").attr("alt"));
    $(this).attr("title", $(this).find("img").attr("alt"));
  });
  // start fancybox:
    $(".gallery a").fancybox();
});


jQuery(document).ready(function() {
    jQuery(window).on("scroll", function () {
        //console.log(jQuery(this).scrollTop(),'top');
        if ($(window).width() < 768){
            var height_counter = jQuery(".block_counter_registration").offset().top - 200;
            //console.log(2);
        }else{
            var height_counter = jQuery(".block_counter_registration").offset().top - 300;
            //console.log(1);
        }  
        //console.log(height_counter,'height_counter');
        if(jQuery(this).scrollTop() > height_counter){
            jQuery(".block_counter_registration").addClass("animation");

        }else{
            jQuery(".block_counter_registration").removeClass("animation");

        }
        
    });

    jQuery(document).ready(function(){
		if ($(window).width() < 768){
            jQuery(".arctext_text .elementor-heading-title").arctext({radius: 650, dir: -1}); 
        }else if ($(window).width() < 993) {
            jQuery(".arctext_text .elementor-heading-title").arctext({radius: 800, dir: -1});
        }else if ($(window).width() <= 1024) {
            jQuery(".arctext_text .elementor-heading-title").arctext({radius: 1000, dir: -1});
        }else if ($(window).width() < 1400){
            jQuery(".arctext_text .elementor-heading-title").arctext({radius: 900, dir: -1});
        }else if ($(window).width() < 1600){
            jQuery(".arctext_text .elementor-heading-title").arctext({radius: 1400, dir: -1}); 
        }else {
            jQuery(".arctext_text .elementor-heading-title").arctext({radius: 2100, dir: -1});	
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

jQuery(document).ready(function($) {
        $('.tab_gallery_country .tabs > .tab:first-child .tab_parent').addClass('is-active');

        $('.tab_gallery_country .tabs .tab').click(function() {
            $('.tab_gallery_country .tabs .tab').removeClass('is-active');
            $(this).addClass('is-active');
            $('.tab_gallery_country .tab-content-container .tab-content').css('display', 'none');
            $('.tab_gallery_country .sub_tab').removeClass('is-active');
            if ($('.tab_gallery_country .sub_tab').data('tab') == 'tab-0') {
                $('.tab_gallery_country .sub_tab[data-tab="tab-0"]').addClass('is-active');
            }

            
            var pValue = $(this).find('p').text();
            
            $('.tab_gallery_country [id="tab-0"]').each(function() {
                if ($(this).attr('class') && $(this).attr('class').includes(pValue)) {
                    $(this).css('display', 'block');
                } else {
                    $(this).css('display', 'none');
                }
            });
        });


        $('.tab_gallery_country .tabs .tab .tab_parent').click(function() {
            $('.tab_gallery_country .tabs .tab .tab_parent').removeClass('is-active');
            $(this).addClass('is-active');
        });
        $('.tab_gallery_country .sub_tab').click(function(event) {
            if ($(this).data('tab') !== 'tab-0') {
                event.stopPropagation();
                
                $(this).siblings().removeClass('is-active');
                $('.tab_gallery_country #tab-0').css('display', 'none');
                
                $(this).addClass('is-active');
            }
            else {
                $(this).siblings().removeClass('is-active');
                $('.tab_gallery_country #tab-0').css('display', 'none');
                
                $(this).addClass('is-active');
            }
        });
        $('.tab_gallery_country .sub_tabs').each(function() {
            var $tabList = $(this);
            var $subTabItems = $tabList.find('li.sub_tab');

            if ($subTabItems.length > 4) {
                $tabList.addClass('more_location');
                $('.tab_gallery_country .tabs').addClass('more_location');
            }
        });
        $('.tab_gallery_country li.sub_tab').on('click', function() {
            var value = $(this).text();
            var newText = value === 'All' ? 'Asia Pacific' : value;
            //$('.tab_gallery_country .banner_category h2').text(newText);
        });
        $('.tab_gallery_country li.tab').on('click', function() {
            //$('.tab_gallery_country .banner_category h2').text('Asia Pacific');
        });
    });
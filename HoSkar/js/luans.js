// $('.sponsor_benefits_slider').slick({
//     slidesToShow: 1,
// 	slidesToScroll: 1,
//     fade: true,
// 	arrows: false,
//     asNavFor: '.sponsor_benefits_slider2'
   
// });
// $('.sponsor_benefits_slider2').slick({
//   slidesToShow: 2,
//   slidesToScroll: 1,
//   asNavFor: '.sponsor_benefits_slider',
//   dots: false,
//   centerMode: false,
//   focusOnSelect: true,
//   arrows: false
// });
$(document).ready(function() {
    var $cols = $('.sponsor_benefits.sponsor_benefits_slider .item');
    var maxHeight = 0;
    
    // Tìm chiều cao lớn nhất
    $cols.each(function() {
        var height = $(this).outerHeight();
		console.log(height);
        maxHeight = Math.max(maxHeight, height);
    });
    
    // Đặt chiều cao của tất cả các cột thành chiều cao lớn nhất
    $cols.css('height', maxHeight*2 + 'px');
});


$('.sponsor_benefits.sponsor_benefits_slider .item:nth-child(2)')
$(document).on('click', '.sponsor_benefits_slider .item', function() {
    var currentIndex = $('.sponsor_benefits_slider .item').index($(this));
    console.log(currentIndex,'currentIndex');
    $(this).css('order', 1);
    switch(currentIndex) {
        case 0:
            $('.sponsor_benefits_slider .item').eq(1).css('order', 2);
            $('.sponsor_benefits_slider .item').eq(2).css('order', 0);
        break;
        case 1:
            $('.sponsor_benefits_slider .item').eq(0).css('order', 0);
            $('.sponsor_benefits_slider .item').eq(2).css('order', 2);
        break;
        case 2:
            $('.sponsor_benefits_slider .item').eq(0).css('order', 2);
            $('.sponsor_benefits_slider .item').eq(1).css('order', 0);
        break;
        default:
        // code block
    }
	$('.sponsor_benefits_slider .item').not('[style*="order: 1"]').css({
		'width': '50%',
		'position': 'unset',
        'z-index': 1,
        'margin': '50px 50px 0',
		"left": 'none'
	});
	
	var elementWithOrder1 = $('.sponsor_benefits_slider .item').filter(function() {
		return $(this).css('order') === '1';
	}).first();
    var elementorWidth = $(".sponsor_benefits.sponsor_benefits_slider").width();
    var slickSlideLeft = elementorWidth / 4;
	elementWithOrder1.css({
		'width': '50%',
		'position': 'absolute',
        'z-index': 2,
        'margin': 'auto',
		"left": slickSlideLeft
	});
});


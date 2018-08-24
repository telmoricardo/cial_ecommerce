$(function () {
//    var slideAuto = setInterval(slideGo, 3000);
    $('.slide_product.go').click(function () {
//        clearInterval(slideAuto);        
        productGo();
    });
    $('.slide_product.back').click(function () {
//        clearInterval(slideAuto);
        slideBack();
    });
//
//    $('.slide_nav.go').dblclick(function () {
//        slideAuto = setInterval(slideGo, 3000);
//    });
    function productGo() {
        if ($('.product_slider.first').next().length) {
            $('.product_slider.first').fadeOut(100, function () {
                $(this).removeClass('first').next().fadeIn().addClass('first');
            });
        } else {
            $('.product_slider.first').fadeOut(100, function () {
                $('.product_slider').removeClass('first');
                $('.product_slider:eq(0)').fadeIn().addClass('first');
            });
        }
    }
    function slideBack() {
        if ($('.product_slider.first').index() >= $('.product_slider').length) {
            $('.product_slider.first').fadeOut(100, function () {
                $(this).removeClass('first').prev().fadeIn().addClass('first');
            });
        } else {
            $('.product_slider.first').fadeOut(100, function () {
                $('.product_slider').removeClass('first');
                $('.product_slider:last-of-type').fadeIn().addClass('first');
            });
        }
    }
});


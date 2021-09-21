jQuery(document).ready(function($) {
    "use strict";
    $('.vow-topbar.v2.sticky').hide();
    //menu change icon and dropdown
    $(".js-menubar li .js-plus-icon").on("click", function() {
        $(this).toggleClass('minus');
        $(this).parent().find(".dropdown-menu").slideToggle(function() {
            $(this).next().stop(true).toggleClass('open', $(this).is(":visible"));
        });
    });

    $(".js-filter-menu li .js-plus-icon").on("click", function() {
        $(this).toggleClass('minus');
        $(this).parent().find(".filter-menu").slideToggle(function() {
            $(this).next().stop(true).toggleClass('open', $(this).is(":visible"));
        });
    });

    $(".filter .js-drop").on("click", function() {
        $(this).parent().find(".ion-ios-arrow-down").toggleClass('ion-ios-arrow-up');
        $(this).parent().find("ul").slideToggle(function() {
            $(this).next().stop(true).toggleClass('open', $(this).is(":visible"));
        });
        $(this).parent().find(".sidebar-product-list").slideToggle(function() {
            $(this).next().stop(true).toggleClass('open', $(this).is(":visible"));
        });
    });

    $(".checkout-page .js-drop").on("click", function() {
        $(this).toggleClass('active');

        $(this).parent().find(".filter-content").slideToggle(function() {
            $(this).next().stop(true).toggleClass('open', $(this).is(":visible"));
        });
    });
    // Product detail
    $(".js-close-tab").on("click", function() {
        $(this).removeClass('open')
        $('.detail-content').removeClass('active');
        $('.detail-tab').removeClass('open');

    });
    $('.js-tabs a').on("click", function() {
        $(".js-close-tab").addClass('open');
        $('.detail-tab').addClass('open');
        $('.detail-content').addClass('active');

    })
    if ($('.js-tabs > li').hasClass('active')) {
        $(".js-close-tab").addClass('open');
        $('.detail-tab').addClass('open');
        $('.detail-content').addClass('active');
    }

    // Product Grid
    $(".js-filter-menu li .js-plus-icon").on("click", function() {
        $(this).toggleClass('minus');
        $(this).parent().find(".filter-menu").slideToggle(function() {
            $(this).next().stop(true).toggleClass('open', $(this).is(":visible"));
        });
    });
    // Open menu dropdown home 5
    $(".js-menubar > li > a").on("click", function() {
        $(this).toggleClass('active');
        $(this).parent().find(".js-open-menu").slideToggle(function() {
            $(this).next().stop(true).toggleClass('open', $(this).is(":visible"));
        });
    });
    // Open menu other page. Header-v2
    $(".js-menu").on("click", function() {
        $(this).toggleClass('active');
        $('.js-open-menu').toggleClass('open');
    });


    // Push menu home 5
    var menuLeft = $('.pushmenu-left');
    var menuHome6 = $('.menu-home5');
    var nav_list = $('.open-cart');
    var nav_click = $('.icon-pushmenu');
    nav_list.on("click", function(event) {
        event.stopPropagation();
        $(this).toggleClass('active');
        $('body').toggleClass('pushmenu-push-toright-cart');
        menuLeft.toggleClass('pushmenu-open');
        $(".container").toggleClass("canvas-container");
    });
    nav_click.on("click", function(event) {
        event.stopPropagation();
        $(this).toggleClass('active');
        $('body').toggleClass('pushmenu-push-toleft');
        menuHome6.toggleClass('pushmenu-open');
    });
    $(".wrappage").on("click", function() {
        $(this).removeClass('active');
        $('body').removeClass('pushmenu-push-toright-cart').removeClass('pushmenu-push-toleft');
        menuLeft.removeClass('pushmenu-open');
        menuHome6.removeClass('pushmenu-open');
    });
    $(".close-left").on("click", function() {
        $(this).removeClass('active');
        $('body').removeClass('pushmenu-push-toright-cart');
        menuLeft.removeClass('pushmenu-open');
    });
    $(".close-left").on("click", function() {
        $('body').removeClass('pushmenu-push-toleft');
        menuHome6.removeClass('pushmenu-open');
    });
    // SHOPPING CART Quantity increment buttons

    var quantitiy = 0;
    $('.js-plus').on("click", function(e) {

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('.js-number').val(), 10);

        // If is not undefined

        $('.js-number').val(quantity + 1);


        // Increment    
    });

    $('.js-minus').on("click", function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('.js-number').val(), 10);

        // If is not undefined

        // Increment
        if (quantity > 0) {
            $('.js-number').val(quantity - 1);
        }
    });

    //SHOP LISTING FILTER
    // Price Slider
    if ($('.price-slider').length > 0) {
        $('.price-slider').slider({
            min: 100,
            max: 700,
            step: 10,
            value: [100, 400],


        });
    }
    //SHOP GRID
    $(".view-mode .col").on("click", function() {
        $(this).toggleClass('active');
        $(".product-grid").removeClass("product-list");

        $(".view-mode .list").removeClass("active");
    });
    $(".view-mode .list").on("click", function() {
        $(this).toggleClass("active");
        $(".product-grid").addClass("product-list");

        $(".view-mode .col").removeClass("active");
    });
    // Open zipcode
    $(".calculate").on('click', function() {
        $(this).next().slideToggle();
        $(this).toggleClass("active");
    });
    // Checkout : open login box
    $(".js-showlogin").on('click', function() {
        $(".js-openlogin").slideToggle();
        $(this).toggleClass("active");
    });
    // Checkout : open coupon
    $(".js-showcp").on('click', function() {
        $(".js-opencp").slideToggle();
        $(this).toggleClass("active");

    });
    //Open filter
    $(".js-filter").on('click', function(e) {
        // e.preventDefault();
        $(".js-filter-open").show();

    });
    //Open filter
    $(".js-close").on('click', function(e) {
        e.preventDefault();
        $(".js-filter-open").hide();
        return false;
    });
    // Scroll slider

    $('.scroll-down').on('click', function() {
        $('html, body').animate({ scrollTop: $('section#main-content').offset().top }, 'slow');
        return false;
    });
    // Scroll to TOP
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scroll_top').fadeIn();
        } else {
            $('.scroll_top').fadeOut();
        }
    });

    $('.scroll_top').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    

    // product carousel
    $('.js-owl-product').owlCarousel({
        margin: 30,
        autoplay: true,
        autoplayTimeout: 3000,
        loop: true,
        dots:false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'></span>", "<span class='fa fa-angle-right'></span>"],
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            1024: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    });

    $('.js-owl-blog').owlCarousel({
        margin: 30,
        autoplay: true,
        autoplayTimeout: 3000,
        loop: true,
        dots:false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'></span>", "<span class='fa fa-angle-right'></span>"],
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            1024: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });
    $('.js-owl-quote').owlCarousel({
        nav: false,
        items: 1,
        dots: true,
        singleItem: true,
    });

    // Instagram carousel
    $('.js-owl-instagram').owlCarousel({
        margin: 0,
        autoplay: true,
        autoplayTimeout: 3000,
        loop: true,
        nav: false,
        navText: ["", ""],
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            1000: {
                items: 5
            }
        }
    });




    // Slider collectiion full
    var $status = $('.pagingInfo');
    var $slickElement = $('.js-slider-collectionf');
    $slickElement.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide) {
        //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
        var i = (currentSlide ? currentSlide : 0) + 1;
        $status.text('0' + i);
    });
    $('.js-slider-collectionf').on('afterChange', function(event, slick, currentSlide) {
        $('.slick-active').append('<div class="pagingInfo"');
    });
    $('.js-slider-collectionf').slick({
        autoplay:true,
        dots: true,
        centerMode: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        appendDots: $('.post-fade'),
        dotsClass: 'custom_paging',
        customPaging: function(slider, i) {
            var thumb = $(slider.$slides[i]).data();
            return '<a class="dots"></a>';
        },

    });

    // Slider collectiion full
    var $status = $('.pagingInfo');
    var $slickElement = $('.js-slider-home4');
    $slickElement.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide) {
        //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
        var i = (currentSlide ? currentSlide : 0) + 1;
        $status.text('0' + i);
    });
    $('.js-slider-home4').on('afterChange', function(event, slick, currentSlide) {
        $('.slick-active').append('<div class="pagingInfo"');
    });
    $('.js-slider-home4').slick({
        autoplay: true,
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        appendDots: $('.post-fade'),
        dotsClass: 'custom_paging',
        customPaging: function(slider, i) {
            var thumb = $(slider.$slides[i]).data();
            return '<a class="dots"></a>';
        },
    });
    // Slider collection detail
    $('.js-slider-collectiond').slick({
        autoplay:true,
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        appendDots: $('.post-fade'),
        dotsClass: 'custom_paging',
        customPaging: function(slider, i) {
            var thumb = $(slider.$slides[i]).data();
            return '<a class="dots"></a>';
        },

    });
    // slider home 3 and home 2
    $('.js-slider-home3').slick({
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        nextArrow: $('.btn-next'),
    });
    // slider home 1
    $('.js-slider-home1').slick({
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        arrows: true,
        prevArrow: $('.top-arrow'),
        nextArrow: $('.bottom-arrow')
    });

    // JS owl team Carousel 
    $('.js-owl-test').owlCarousel({
        items: 1,
        singleItem: true,
        nav: true,
        navText: ["<span class='fa fa-angle-left'></span>", "<span class='fa fa-angle-right'></span>"],
        dots: false,
    });
    // Scroll slide homepage 2

    $('.slide-scroll').on('click', function() {
        $('html, body').animate({ scrollTop: $('section#contenthome2').offset().top }, 'slow');
        return false;
    });
    var handleScrollTop = function(e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 250);
    };
    // Footer to top
    $('footer > .scroll-top').on('click', function(e) {
        handleScrollTop(e);
    });

    $('.backto.vow-top').on('click', function(e) {
        handleScrollTop(e);
    }); 
    $(window).scroll(function() {
        var sticky = $('#header'),
            removeh = $('.header-v2 .vow-topbar.v2.v-remove'),
            removeh2 = $('.header-v5 .vow-topbar.v2.v-remove'),
            sticky2 = $('.header-v1'),
            sticky3 = $('.header-v2.v-sidebar'),
            sticky5 = $('.header-v5.v-sidebar'),
            sticky4 = $('.header-v2.box-shawdow'),
            pageleft =$('.page-left-sidebar'),
            fixcontainer = ('.container-df'),
            awemenu =$('.headroom'),
            scroll = $(window).scrollTop();
            if (scroll >= 100)
                 removeh.css("display", "none"),
                removeh2.css("display", "none"),
                sticky5.find('.container-df').removeClass('container-df').addClass('container-75'),
                 awemenu.css("position", "fixed"),
                 $('.vow-topbar.v2.sticky').show(),
                sticky2.addClass('fixed-header-home3 animated fadeInDown'),
                sticky4.addClass('fixed-header-home2 animated fadeInDown'),
                sticky.addClass('navbar-fixed-top animated fadeInDown'),
                sticky.find('.topbar-mobile-l').hide()
            else 
                sticky2.removeClass('fixed-header-home3 animated fadeInDown'),
                sticky5.find('.container-75').removeClass('container-75').addClass('container-df'),
                sticky4.removeClass('fixed-header-home2 animated fadeInDown'),
                sticky.removeClass('navbar-fixed-top animated fadeInDown'),
                sticky.find('.topbar-mobile-l').show(),
                removeh.css("display", "block"),
                removeh2.css("display", "block"),
                awemenu.css("position", "unset"),
                $('.vow-topbar.v2.sticky').hide()
    });

});
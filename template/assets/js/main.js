/***************************************************
==================== JS INDEX ======================
****************************************************
01. PreLoader Js
02. Mobile Menu Js
03. Sidebar Js
04. Body overlay Js
05. Search Js
06. Sticky Header Js
07. Data CSS Js
08. Nice Select Js
09. Hero Js
10. testimonials slider style 1
11. testimonials slider style 2
12. Cart js Increase product quantity on cart page
13. Cart js Decrease product quantity on cart page
14. Project Slider Style 2
15. news-ticker ul Js
16. Masonary Js
17. magnificPopup img view js
18. magnificPopup video view js
19. Wow Js
20. Cart Quantity Js
21. Show Login Toggle Js
22. Show Coupon Toggle Js
23. Create An Account Toggle Js
24. Shipping Box Toggle Js
25. Counter Js
26. Parallax Js
27. filterable portfolio Masonary Js
28. InHover Active Js
29. Wish List Btn and add to card  Hover js
30. Pricing table toggle js
****************************************************/
(function ($) {
	"use strict";
	var windowOn = $(window);
	////////////////////////////////////////////////////
	// 01. PreLoader Js
    $(window).on("load", function () {
        $(".preloader").fadeOut(500);
    });
	if ($(".preloader").length > 0) {
        $(".preloaderCls").each(function () {
            $(this).on("click", function (e) {
                e.preventDefault();
                $(".preloader").css("display", "none");
            });
        });
    }
	////////////////////////////////////////////////////
	// 02. Mobile Menu Js
	$('#mobile-menu').meanmenu({
		meanMenuContainer: '.mobile-menu',
		meanScreenWidth: "1199",
		meanExpand: ['<i class="fal fa-plus"></i>'],
	});
	////////////////////////////////////////////////////
	// 03. Sidebar Js
	$(".offcanvas-toggle-btn").on("click", function () {
		$(".offcanvas__area").addClass("opened");
		$(".body-overlay").addClass("opened");
	});
	$(".offcanvas__close-btn").on("click", function () {
		$(".offcanvas__area").removeClass("opened");
		$(".body-overlay").removeClass("opened");
	});
	////////////////////////////////////////////////////
	// 04. Body overlay Js
	$(".body-overlay").on("click", function () {
		$(".offcanvas__area").removeClass("opened");
		$(".body-overlay").removeClass("opened");
	});
	////////////////////////////////////////////////////
	// 05. Search Js
	$(".search-toggle").on("click", function () {
		$(".search__area").addClass("opened");
	});
	$(".search-close-btn").on("click", function () {
		$(".search__area").removeClass("opened");
	});
	////////////////////////////////////////////////////
	// 06. Sticky Header Js
	windowOn.on('scroll', function () {
		var scroll = $(window).scrollTop();
		if (scroll < 100) {
			$("#header-sticky").removeClass("header-sticky");
		} else {
			$("#header-sticky").addClass("header-sticky");
		}
	});
	////////////////////////////////////////////////////
	// 07. Data CSS Js
	$("[data-background").each(function () {
		$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
	});
	$("[data-width]").each(function () {
		$(this).css("width", $(this).attr("data-width"));
	});
	$("[data-bg-color]").each(function () {
		$(this).css("background-color", $(this).attr("data-bg-color"));
	});
	////////////////////////////////////////////////////
	// 08. Nice Select Js
	$('select').niceSelect();
	////////////////////////////////////////////////////
	// 09. Hero Js
	function mainSlider() {		
		var BasicSlider = $('.cl-hero-block__slider');
		BasicSlider.on('init', function (e, slick) {
			var $firstAnimatingElements = $('.cl-hero-block__slider__single:first-child').find('[data-animation]');
			doAnimations($firstAnimatingElements);
		});
		BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
			var $animatingElements = $('.cl-hero-block__slider__single[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
			doAnimations($animatingElements);
		});
		BasicSlider.slick({
			autoplay: true,
			autoplaySpeed: 4000,
			dots: false,
			fade: true,
			arrows: true,
			prevArrow: '<button type="button" class="cl-hero-block__slider__prev-arrow"><i class="far fa-arrow-left-long"></i></button>',
			nextArrow: '<button type="button" class="cl-hero-block__slider__next-arrow"><i class="far fa-arrow-right-long"></i></button>',
			responsive: [{
				breakpoint: 767,
				settings: {
					dots: false,
					arrows: false
				}
			}]
		});
		////////////////////////////////////////////////////
		// 10. testimonials slider style 1
		var BasicSlider = $('.testimonial-s1-slider-active');
		BasicSlider.on('init', function (e, slick) {
			var $firstAnimatingElements = $('.testimonial-card:first-child').find('[data-animation]');
			doAnimations($firstAnimatingElements);
		});
		BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
			var $animatingElements = $('.testimonial-card[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
			doAnimations($animatingElements);
		});
		BasicSlider.slick({
			autoplay: false,
			autoplaySpeed: 4000,
			dots: true,
			vertical: true,
			verticalSwiping: true,
			fade: false,
			arrows: false,
			responsive: [{
				breakpoint: 767,
				settings: {
				}
			}]
		});
		////////////////////////////////////////////////////
		// 11. testimonials slider style 2
		var tmS2images = $('.testimonial-s2-img-slider-active');
		var tmS2content = $('.testimonial-s2-content-slider-active');
		tmS2images.slick({
			asNavFor: '.testimonial-s2-content-slider-active',
			autoplay: false,
			autoplaySpeed: 4000,
			dots: false,
			fade: false,
			arrows: false,
			responsive: [{
				breakpoint: 767,
				settings: {
				}
			}]
		});
		tmS2content.slick({
			asNavFor: '.testimonial-s2-img-slider-active',
			autoplay: false,
			autoplaySpeed: 4000,
			dots: false,
			fade: false,
			arrows: true,
			nextArrow: '<button type="button" class="testimonial-s2-next-arrow"><i class="far fa-arrow-left"></i></button>',
			prevArrow: '<button type="button" class="testimonial-s2-prev-arrow"><i class="far fa-arrow-right"></i></button>',
			responsive: [{
				breakpoint: 767,
				settings: {
				}
			}]
		});
		function doAnimations(elements) {
			var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
			elements.each(function () {
				var $this = $(this);
				var $animationDelay = $this.data('delay');
				var $animationType = 'animated ' + $this.data('animation');
				$this.css({
					'animation-delay': $animationDelay,
					'-webkit-animation-delay': $animationDelay
				});
				$this.addClass($animationType).one(animationEndEvents, function () {
					$this.removeClass($animationType);
				});
			});
		}
		////////////////////////// Cart js////////////////////////////
		var minVal = 1, maxVal = 2220; // Set Max and Min values
		////////////////////////////////////////////////////
		// 12. Cart js Increase product quantity on cart page
		$(".plus").on('click', function () {
			var $parentElm = $(this).parents(".quantity");
			$(this).addClass("clicked");
			setTimeout(function () {
				$(".clicked").removeClass("clicked");
			}, 100);
			var value = $parentElm.find(".input-text").val();
			if (value < maxVal) {
				value++;
			}
			$parentElm.find(".input-text").val(value);
		});
		////////////////////////////////////////////////////
		// 13. Cart js Decrease product quantity on cart page
		$(".minus").on('click', function () {
			var $parentElm = $(this).parents(".quantity");
			$(this).addClass("clicked");
			setTimeout(function () {
				$(".clicked").removeClass("clicked");
			}, 100);
			var value = $parentElm.find(".input-text").val();
			if (value > 1) {
				value--;
			}
			$parentElm.find(".input-text").val(value);
		});
		////////////////////////////////////////////////////
		// 14. Project Slider Style 2
		$('.project-slider-wrapper').slick({
			centerMode: false,
			slidesToShow: 4,
			slidesToScroll: 1,
			dots: true,
			arrows: true,
			swipe: true,
			infinite: true,
			swipeToSlide: true,
			adaptiveHeight: true,
			autoplay:true,
			speed: 1000,
			prevArrow: $('.project-slider-arrow__left-arrow'),
			nextArrow: $('.project-slider-arrow__next-arrow'),
			responsive: [
				{
					breakpoint: 1600,
					settings: {
						slidesToShow: 4,
						slidesToScroll: 3,
					}
				},
				{
					breakpoint: 1400,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
					}
				},
				{
					breakpoint: 1300,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
					}
				},
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 574,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 3
					}
				}
			]
		});
	}
	mainSlider();
	////////////////////////////////////////////////////
	// 15. news-ticker ul Js
	$('.news-ticker ul').slick({
		dots: false,
		arrows: false,
		infinite: true,
		speed: 4000,
		respondTo: 'container',
		cssEase: 'linear',
		autoplay: true,
		autoplaySpeed: 0,
		variableWidth: true,
		items: 7
	});
	////////////////////////////////////////////////////
	// 16. Masonary Js
	$('.grid').imagesLoaded(function () {
		// init Isotope
		var $grid = $('.grid').isotope({
			itemSelector: '.grid-item',
			percentPosition: true,
			masonry: {
				// use outer width of grid-sizer for columnWidth
				columnWidth: '.grid-item',
			}
		});
		// filter items on button click
		$('.masonary-menu').on('click', 'button', function () {
			var filterValue = $(this).attr('data-filter');
			$grid.isotope({ filter: filterValue });
		});
		//for menu active class
		$('.masonary-menu button').on('click', function (event) {
			$(this).siblings('.active').removeClass('active');
			$(this).addClass('active');
			event.preventDefault();
		});
	});
	////////////////////////////////////////////////////
	// 17. magnificPopup img view js
	$('.popup-image').magnificPopup({
		type: 'image',
		gallery: {
			enabled: true
		}
	});
	$('.popup-gallery-image').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		image: {
			verticalFit: true
		}
		
	});
	////////////////////////////////////////////////////
	// 18. magnificPopup video view js
	$(".popup-video").magnificPopup({
		type: "iframe",
	});
	////////////////////////////////////////////////////
	// 19. Wow Js
	new WOW().init();
	////////////////////////////////////////////////////
	// 20. Cart Quantity Js
	$('.cart-minus').click(function () {
		var $input = $(this).parent().find('input');
		var count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();
		return false;
	});
	$('.cart-plus').click(function () {
		var $input = $(this).parent().find('input');
		$input.val(parseInt($input.val()) + 1);
		$input.change();
		return false;
	});
	////////////////////////////////////////////////////
	
	// 23. Create An Account Toggle Js
	$('#cbox').on('click', function () {
		$('#cbox_info').slideToggle(900);
	});
	////////////////////////////////////////////////////
	// 24. Shipping Box Toggle Js
	$('#ship-box').on('click', function () {
		$('#ship-box-info').slideToggle(1000);
	});
	////////////////////////////////////////////////////
	// 25. Counter Js
	$('.counter').counterUp({
		delay: 10,
		time: 1000
	});
	////////////////////////////////////////////////////
	// 26. Parallax Js
	if ($('.scene').length > 0) {
		$('.scene').parallax({
			scalarX: 10.0,
			scalarY: 15.0,
		});
	};
	///////////////////////////////////////////////////
	// 27. filterable portfolio Masonary Js 
	var $gridFilter = $('.filterable-grid').isotope({
		itemSelector: '.element-item',
		layoutMode: 'fitRows'
	});
	// filter items on button click
	$('.filter-button-group .fl-button').on('click', function () {
		$('.filter-button-group .fl-button').removeClass('active');
		$(this).addClass('active');
		var value = $(this).attr('data-filter');
		$gridFilter.isotope({
			filter: value
		})
	});
	////////////////////////////////////////////////////
	// 28. InHover Active Js
	$('.hover__active').on('mouseenter', function () {
		$(this).addClass('active').parent().siblings().find('.hover__active').removeClass('active');
	});
	////////////////////////////////////////////////////
	// 29. Wish List Btn and add to card  Hover js
	$(".wishlistBtn").click(function () {
		$(this).removeClass("fa-regular fa-heart").addClass("fa-solid fa-heart");
	});
	$(".addToCardButton").click(function () {
		$(this).css({
			backgroundColor: "var(--cl-color-primary)",
		});
	});
	////////////////////////////////////////////////////
	// 30. Pricing table toggle js
	const tableWrapper = document.querySelector(".pricing-table-cards--switcher-active");
	const switchInputs = document.querySelectorAll(".switch-wrapper input");
	const prices = tableWrapper?.querySelectorAll(".pricing-table-cards--switcher-active .single-pt-card__price");
	const toggleClass = "d-none";
	for (const switchInput of switchInputs) {
		switchInput.addEventListener("input", function () {
			for (const price of prices) {
				price.classList.add(toggleClass);
			}
			const activePrices = tableWrapper.querySelectorAll(
				`.pricing-table-cards--switcher-active .single-pt-card__price.${switchInput.id}`
			);
			for (const activePrice of activePrices) {
				activePrice.classList.remove(toggleClass);
			}
		});
	}

	
	/////////////////// Animatin /////////////////////////////////
	AOS.init();

})(jQuery);


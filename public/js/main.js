 AOS.init({
 	duration: 800,
 	easing: 'slide'
 });

(function($) {

	"use strict";

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};


	$(window).stellar({
    responsive: true,
    parallaxBackgrounds: true,
    parallaxElements: true,
    horizontalScrolling: false,
    hideDistantElements: false,
    scrollProperty: 'scroll'
  });


	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	// loader
	var loader = function() {
		setTimeout(function() {
			if($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();

	// Scrollax
   $.Scrollax();

	var carousel = function() {

		$('.product-slider').owlCarousel({
			autoplay: true,
			loop: true,
			items:1,
			margin: 30,
			stagePadding: 0,
			nav: false,
			dots: true,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 2
				},
				1000:{
					items: 3
				}
			}
		});
		$('.carousel-testimony').owlCarousel({
			autoplay: true,
			loop: true,
			items:1,
			margin: 0,
			stagePadding: 0,
			nav: false,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 1
				},
				1000:{
					items: 1
				}
			}
		});

	};
	carousel();

	$('nav .dropdown').hover(function(){
		var $this = $(this);
		// 	 timer;
		// clearTimeout(timer);
		$this.addClass('show');
		$this.find('> a').attr('aria-expanded', true);
		// $this.find('.dropdown-menu').addClass('animated-fast fadeInUp show');
		$this.find('.dropdown-menu').addClass('show');
	}, function(){
		var $this = $(this);
			// timer;
		// timer = setTimeout(function(){
			$this.removeClass('show');
			$this.find('> a').attr('aria-expanded', false);
			// $this.find('.dropdown-menu').removeClass('animated-fast fadeInUp show');
			$this.find('.dropdown-menu').removeClass('show');
		// }, 100);
	});


	$('#dropdown04').on('show.bs.dropdown', function () {
	  console.log('show');
	});

	// scroll
	var scrollWindow = function() {
		$(window).scroll(function(){
			var $w = $(this),
					st = $w.scrollTop(),
					navbar = $('.ftco_navbar'),
					sd = $('.js-scroll-wrap');

			if (st > 150) {
				if ( !navbar.hasClass('scrolled') ) {
					navbar.addClass('scrolled');
				}
			}
			if (st < 150) {
				if ( navbar.hasClass('scrolled') ) {
					navbar.removeClass('scrolled sleep');
				}
			}
			if ( st > 350 ) {
				if ( !navbar.hasClass('awake') ) {
					navbar.addClass('awake');
				}

				if(sd.length > 0) {
					sd.addClass('sleep');
				}
			}
			if ( st < 350 ) {
				if ( navbar.hasClass('awake') ) {
					navbar.removeClass('awake');
					navbar.addClass('sleep');
				}
				if(sd.length > 0) {
					sd.removeClass('sleep');
				}
			}
		});
	};
	scrollWindow();


	var counter = function() {

		$('#section-counter').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
				$('.number').each(function(){
					var $this = $(this),
						num = $this.data('number');
						console.log(num);
					$this.animateNumber(
					  {
					    number: num,
					    numberStep: comma_separator_number_step
					  }, 7000
					);
				});

			}

		} , { offset: '95%' } );

	}
	counter();

	var contentWayPoint = function() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});

				}, 100);

			}

		} , { offset: '95%' } );
	};
	contentWayPoint();


	// navigation
	var OnePageNav = function() {
		$(".smoothscroll[href^='#'], #ftco-nav ul li a[href^='#']").on('click', function(e) {
		 	e.preventDefault();

		 	var hash = this.hash,
		 			navToggler = $('.navbar-toggler');
		 	$('html, body').animate({
		    scrollTop: $(hash).offset().top
		  }, 700, 'easeInOutExpo', function(){
		    window.location.hash = hash;
		  });


		  if ( navToggler.is(':visible') ) {
		  	navToggler.click();
		  }
		});
		$('body').on('activate.bs.scrollspy', function () {
		  console.log('nice');
		})
	};
	OnePageNav();


	// magnific popup
	$('.image-popup').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
     gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });

  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false
  });



	var goHere = function() {

		$('.mouse-icon').on('click', function(event){

			event.preventDefault();

			$('html,body').animate({
				scrollTop: $('.goto-here').offset().top
			}, 500, 'easeInOutExpo');

			return false;
		});
	};
	goHere();


})(jQuery);

 $(".open-edit-btn").on("click", function () {

     $(this).find("i").toggle();
     $(this).parent(".product-adm-btns").parent(".product-cont").find(".sign-up-content").slideToggle(200);
 });

 $(".content-panel").find(".navbar-body").find("ul").find("li").find("a").on("click", function (e) {
    e.preventDefault();
    var section = $(this).data("section");

    $(".other-content").hide();
    $("."+section+"-content").show();
 });

 // bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
 // $('.product_images_all').slick({
 //     infinite: false,
 //     slidesToShow: 3,
 //     slidesToScroll: 3,
 //     arrows: false,
 //     dots: false
 // });

 $('.slider_big').slick({
     slidesToShow: 1,
     slidesToScroll: 1,
     arrows: false,
     fade: true,
     asNavFor: '.product_images_all'
 });
 $('.product_images_all').slick({
     infinite: false,
     slidesToShow: 3,
     slidesToScroll: 1,
     asNavFor: '.slider_big',
     arrows: false,
     dots: false,
     focusOnSelect: true
 });

 $(".quantity-right-plus").on("click", function () {
     var current_num = $("input[name='quantity']").val();

     current_num++;
     $("input[name='quantity']").val(current_num);
 });

 $(".quantity-left-minus").on("click", function () {
     var current_num = $("input[name='quantity']").val();

     if(current_num == 1) return false
     current_num--;
     $("input[name='quantity']").val(current_num);
 });

 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });

 $(".add-to-cart").on("click", function (e) {
     e.preventDefault();

     var product_id = $(".product-details").find(".product-info").find("input[name='product_id']").val();
     var size = $(".product-details").find(".product-info").find("select[name='size']").val();
     var quantity = $(".product-details").find(".product-info").find("input[name='quantity']").val();
     var total = $(".product-details").find(".product-info").find("input[name='product_price']").val();

     $.ajax({
         url: "/cart/add-product",
         type: "POST",
         data: ({
             product_id: product_id,
             size: size,
             quantity: quantity,
             total: total
         }),
         success: function (result) {
            console.log(result["success"]);

            $(".shop-cart").html('<i class="fas fa-shopping-cart"></i>['+result["total"]+']');
         }
     });
 });

 $(".add-to-cart-fast").on("click", function (e) {
     e.preventDefault();

     var product_id = $(this).parent(".bottom-area").find("input[name='product_id']").val();
     var size = $(this).parent(".bottom-area").find("select[name='size']").val();
     var price = $(this).parent(".bottom-area").find("input[name='price']").val();

     var this_but = $(".cart_but_"+product_id);

     $.ajax({
         url: "/cart/add-product",
         type: "POST",
         data: ({
             product_id: product_id,
             size: size,
             quantity: 1,
             total: price
         }),
         success: function (result) {
             console.log(result["success"]);

             $(".shop-cart").html('<i class="fas fa-shopping-cart"></i>['+result["total"]+']');
             this_but.find("span").find("i").toggle();
             this_but.find("span").css("color", "#3aab53");
         }
     });
 });

 $("td.quantity").find("input[name='quantity']").on("change", function() {
     var product_id = $(this).data("pid");
     var quantity = $(this).val();
     var price = $(this).data("price");

     $.ajax({
         url: "/cart/update-product",
         type: "POST",
         data: ({
             product_id: product_id,
             quantity: quantity,
             price: price
         }),
         success: function (result) {
             console.log(result["success"]);

             location.reload();
             // if(discount)
             //     done_price = parseInt(result["product_total"])*(1-discount/100);
             // else
             //     done_price = parseInt(result["product_total"]);
             //
             // $(".cart_product_"+product_id).find("td.total").html("$"+done_price);
         }
     });
 });

 $(".like_product").on("click", function() {
     var product_id = $(this).parent(".like_prod").parent(".bottom-area").find("input[name='product_id']").val();

     $.ajax({
         url: "/catalog/like-product",
         type: "POST",
         data: ({
             product_id: product_id
         }),
         success: function (result) {
             $(".like_prod_"+product_id).html('<i class="fas fa-heart" style="color: #ff0000;"></i>');

             $(".flying_message").fadeIn(350);
             $(".flying_message").find(".alert").html(result["success"]);

             setTimeout(function () {
                 $(".flying_message").fadeOut(350);
             }, 2000);
         },
         error: function(){
             location.href = "/login"
         }
     });
 });

 $(".delete_like").on("click", function() {
     var id = $(this).data("id");
     var product_id = $(this).parent(".ml-auto").parent(".bottom-area").find("input[name='product_id']").val();

     $.ajax({
         url: "/catalog/delete-like",
         type: "POST",
         data: ({
             id: id
         }),
         success: function (result) {
             $(".del_prod_"+product_id).html('<i class="far fa-heart"></i>');

             $(".flying_message").fadeIn(350);
             $(".flying_message").find(".alert").html(result["success"]);

             setTimeout(function () {
                 $(".flying_message").fadeOut(350);
             }, 2000);
         },
         error: function(){
             location.href = "/login"
         }
     });
 });

 $(".sortable_images").sortable();
 $(".sortable_images").on("sortupdate", function() {
     sorting_result = $(this).sortable("toArray");

     $.ajax({
         url: "/admin/sorting-photos",
         type: "POST",
         data: ({
             sorting_result : sorting_result
         }),
         success: function(result){
            console.log(result["success"]);
         }
     });
 });




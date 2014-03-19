jQuery(document).ready(function(jQuery) {
	"use strict";
	var $ = jQuery;
	/*global jQuery:false, ajaxObj:false, alert:false */

	/*----------------------------------------------------*/
	/* VARIABLE DECLARATION
	/*----------------------------------------------------*/

	var testMobile, parallax_speed;

	/*----------------------------------------------------*/
	/* NAVIGATION
	/*----------------------------------------------------*/	
	
	$('ul.navigation li').localScroll( { duration: 1200, easing: 'easeInOutExpo' } );
	$('ul.nav li a').click(function() {
		$('ul.nav li').removeClass('current');
		$(this).parent().addClass('current');
	});
	$("#navbar_menu_fixed").sticky({topSpacing:0});
	$('#navigation').onePageNav({
		filter: ':not(.page_external_url)',
		begin: function() {
		},
		end: function() {
		},
		scrollOffset: 0
	});

	/*----------------------------------------------------*/
	/* JAVASCRIPT CUSTOM TAB
	/*----------------------------------------------------*/

	$('#faqs_content li, #position_content > li').hide();
	$('#faqs_content li#faq_1, #position_content > li#position_1').fadeIn(1000);
	$('#faqs_title li a').on("click", function(e) {
		e.preventDefault();
		var id_split = this.id.split('_');
		var id = id_split[1]+'_'+id_split[2];
		$('#faqs_content > li').hide();
		$('#faqs_content > li#'+id).fadeIn(1000);
		$('#faqs_title li a').removeClass('active');
		$(this).addClass("active");
	});

	$('#position_title li a').on("click", function(e) {
		e.preventDefault();
		var id_split = this.id.split('_');
		var id = id_split[1]+'_'+id_split[2];
		$('#position_content > li').hide();
		$('#position_content > li#'+id).fadeIn(1000);
		$('#position_title li a').removeClass('active');
		$(this).addClass("active");
	});

	/*----------------------------------------------------*/
	/* MOBILE DETECT FUNCTION
	/*----------------------------------------------------*/

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

	/*----------------------------------------------------*/
	/* FORM CALL
	/*----------------------------------------------------*/

	$('#email_subscribe').val('');

	$("#emailSubscribeForm").validate({ // USE TO SEND SUBSCRIPTION EMAIL VIA AJAX REQUEST
		rules: {
			email_subscribe : {
				email: true,
				required: true
			}
		},
		submitHandler: function() {
			var awesome_app_nonce = ajaxObj.awesome_app_nonce;
			var email_subscribe = $('#email_subscribe').val();
			$.ajax({ 
				type: 'POST',
				data: { awesome_app_nonce : awesome_app_nonce, action : 'signUpForDemo', email_subscribe : email_subscribe },
				url: ajaxObj.ajaxurl,
				success: function(data) {
					if(data.success) {
						alert("Request sent!");
					}
				}
			});
			return false;
		}
	});

	$('#contactForm').validate({ // USE TO SEND CONTACT REQUEST EMAIL VIA AJAX REQUEST
		rules: {
			contact_name : {
				required: true
			}, 
			contact_email : {
				email: true,
				required: true
			}, 
			contact_subject : {
				required: true
			}, 
			contact_message : {
				required: true
			}
		},
		submitHandler: function() {
			var awesome_app_nonce = ajaxObj.awesome_app_nonce;
			var con_name = jQuery('#contact_name').val();
			var con_email = jQuery('#contact_email').val();
			var con_subject = jQuery('#contact_subject').val();
			var con_message = jQuery('#contact_message').val();
			if(typeof con_name !== "undefined" && con_name !== "" && typeof con_email !== "undefined" && con_email !== "" && typeof con_subject !== "undefined" && con_subject !== "" && typeof con_message !== "undefined" && con_message !== "") {
				$.ajax({ 
					type: 'POST',
					data: { awesome_app_nonce : awesome_app_nonce,  action : 'sendEmail', contact_name: con_name, contact_email : con_email, contact_message: con_message, contact_subject : con_subject },
					url: ajaxObj.ajaxurl,
					beforeSend: function() {
						jQuery('#request_results').html('<img src="'+ajaxObj.ajaxloader+'" alt="loading" />');
					},
					success: function(data) {
						if(data.success) {
							jQuery('#request_results').html('<span style="color: #0041ba;">Request Sent!</span>');
							setTimeout( function() {
								jQuery('#request_results span').fadeOut('slow');
							}, 5000);
						}
					}
				});
			} else {
				jQuery('#request_results').html('<span style="color: #f30000;">Please fill all fields.</span>');
				setTimeout( function() {
					jQuery('#request_results span').fadeOut('slow');
				}, 5000);
			}	
		}
	});

	$('.up_vote, .up_voteaccord').on('click', function(e) { // USE TO VOTE 'yes' FOR FAQS VIA AJAX REQUEST
		e.preventDefault();
		var awesome_app_nonce = ajaxObj.awesome_app_nonce;
		var faq_id_split = $(this).attr('id').split('_');

		var faq_id = faq_id_split[1];

		$.ajax({ 
			type: 'POST',
			data: { awesome_app_nonce : awesome_app_nonce,  action : 'vote_yes', id : faq_id },
			url: ajaxObj.ajaxurl,
			success: function(data) {
				if(data.success) {
					$('.polling_faq_'+faq_id).html('<span style="color: #2f8347; font-size: 13px;">'+data.msg+'</span>');
					setTimeout( function() {
						$('.polling_faq_'+faq_id+' span').fadeOut('slow');
					}, 5000);
					$('.vote_yes_'+faq_id).find('strong').html(data.vote_count);
				} else {
					$('.polling_faq_'+faq_id).html('<span style="color: #db0000; font-size: 13px;">'+data.msg+'</span>');
					setTimeout( function() {
						$('.polling_faq_'+faq_id+' span').fadeOut('slow');
					}, 5000);
				}
			}
		});
	});

	$('.down_vote, .down_voteaccord').on('click', function(e) { // USE TO VOTE 'no' FOR FAQS VIA AJAX REQUEST
		e.preventDefault();
		var awesome_app_nonce = ajaxObj.awesome_app_nonce;
		var faq_id_split = $(this).attr('id').split('_');

		var faq_id = faq_id_split[1];

		$.ajax({ 
			type: 'POST',
			data: { awesome_app_nonce : awesome_app_nonce,  action : 'vote_no', id : faq_id },
			url: ajaxObj.ajaxurl,
			success: function(data) {
				if(data.success) {
					$('.polling_faq_'+faq_id).html('<span style="color: #2f8347; font-size: 13px;">'+data.msg+'</span>');
					setTimeout( function() {
						$('.polling_faq_'+faq_id+' span').fadeOut('slow');
					}, 5000);
					$('.vote_no_'+faq_id).find('strong').html(data.vote_count);
				} else {
					$('.polling_faq_'+faq_id).html('<span style="color: #db0000; font-size: 13px;">'+data.msg+'</span>');
					setTimeout( function() {
						$('.polling_faq_'+faq_id+' span').fadeOut('slow');
					}, 5000);
					
				}
			}
		});
	});

	/*----------------------------------------------------*/
	/* SLIDER
	/*----------------------------------------------------*/

	testMobile = isMobile.any();
	var slide_margin = 0, minItems = 0;
	if(testMobile === null) {
		slide_margin = 20;
		minItems = 3;
	} else {
		slide_margin = 0;
		minItems = 1;
	}

	$(".post_slider").flexslider({
		animation: "slide",
		easing: "swing",
		useCSS: false,
		pauseOnAction: false, 
		animationLoop: true,
		slideshowSpeed: 5000,
		animationSpeed: 600,
		itemWidth: 370,
		itemMargin: slide_margin,
		directionNav: false,
		slideshow: true,
		minItems: minItems,
		maxItems: 3,
		before: function() {
			if(testMobile === null) {
				$('.post_slider .slides li').css( { 'margin-left': '30px' } );
				$('.post_slider .slides li:nth-child(3n+1)').css( { 'margin-left': '0' } );
			}
		},
		end: function() {
			if(testMobile === null) {
				$('.post_slider .slides li:nth-child(3n+1)').css( { 'margin-left': '0' } );
				$('.post_slider .slides li:nth-last-child(1)').css( { 'margin-left': '30px' } );
				$('.post_slider .slides li:nth-last-child(2)').css( { 'margin-left': '30px' } );
				$('.post_slider .slides li:nth-last-child(3)').css( { 'margin-left': '0px' } );
				if($('.post_slider .slides > li').length % 3 === 1) {
					$('.post_slider .slides li:nth-last-child(4)').css( { 'margin-left': '0' } );
				} else if($('.post_slider .slides > li').length % 3 === 2) {
					$('.post_slider .slides li:nth-last-child(4)').css( { 'margin-left': '20px' } );
				}
			}
		}
	});

	$("#clients_slider").flexslider({
		animation: "slide",
		easing: "swing",
		useCSS: false,
		animationLoop: true,
		itemWidth: 0,
		itemMargin: 0,
		minItems: 1,
		maxItems: 2, 
		keyboard: true,
		controlNav: false,
		slideshowSpeed: 5000, 
		animationSpeed: 500, 
		directionNav: false,
		pauseOnAction: false,
		slideshow: true,
		startAt: 0,
		start:function() {
			$("#next").addClass("active");
		}, 
		after: function(slider) {
			if(slider.currentSlide === 0) {
				$("#previous").removeClass("active");
				if((slider.count - 1) > 0) {
					$("#next").addClass("active");
				}
			} else {
				$("#previous").addClass("active");
				if((slider.count - 1) !== slider.currentSlide) {
					$("#next").addClass("active");
				} else {
					$("#next").removeClass("active");
				}
			}
		}
	});

	$('#flexi_next').click(function(e) { // CALL NEXT SLIDE TO SHOW
		e.preventDefault();
		jQuery('#clients_slider').flexslider("next");
	});
	$('#flexi_prev').click(function(e) { // CALL PREVIOUS SLIDE TO SHOW
		e.preventDefault();
		jQuery('#clients_slider').flexslider("prev");
	});
	
	/*----------------------------------------------------*/
	/* BANNER ANIMATION
	/*----------------------------------------------------*/

	$('.theme_col').mouseenter(function() {
		var this_id = $(this).find('.hover_overlay').attr('id');
		$('#'+this_id).css({ "z-index": "90" });
		$(this).css({ "cursor" : "pointer" });
	}).mouseleave(function() {
		var this_id = $(this).find('.hover_overlay').attr('id');
		$('.hover_overlay').css({ "z-index": "100" });
		checkEmailSubscribeFieldIsEmpty(this_id);
	});

	/*----------------------------------------------------*/
	/* ADDING CLASS FOR FORM FIELDS
	/*----------------------------------------------------*/

	$('.form-submit input[type="submit"]').addClass('btn btn-large btn-inverse');
	$('.comments-area #respond').addClass('row-fluid');
	$('.comments-area #reply-title').addClass('span2');
	$('.comments-area #commentform').addClass('span10');

	/*----------------------------------------------------*/
	/* CHECK IF EMAIL IS SUPPLIED IN EMAIL SUBSCRIPTION FORM
	/*----------------------------------------------------*/

	function checkEmailSubscribeFieldIsEmpty(this_id) {
		var email_subscribe = $('#email_subscribe').val();
		if(typeof email_subscribe !== 'undefined' && email_subscribe !== '') {
			$('#'+this_id).css({ "z-index": "90" });
		} else {
			$('.hover_overlay').css({ "z-index": "100" });
		}
	}

	/*----------------------------------------------------*/
	/* WINDOWS EVENTS
	/*----------------------------------------------------*/

	
	$(window).resize(function() {
		resizeBanner();
	});
	$(window).resize();
	function resizeBanner() {
		$('#page .theme_col').each(function() {
			var h1_height = $(this).height();
			var h1_height_sub = $(this).find('.abs_heading_text').height();
			var h1_mtop_1 = (h1_height + h1_height_sub) / 2;

			$(this).find('.abs_heading_text').css({ "margin-top" : "-"+h1_mtop_1+"px" });
			var t=0;
			var t_elem;
			$(".page_content h3").each(function () {
				var column_heading = $(this);
				if ( column_heading.height() > t ) {
					t_elem=this;
					t=column_heading.height();
				}
			});
			$('.page_content h3').css({ 'height': t+'px' });
		});
	}

	/*----------------------------------------------------*/
	// PARALLAX INITIALIZATION 
	/*----------------------------------------------------*/

	$(window).bind('load', function () {
		testMobile = isMobile.any();
		if (testMobile === null) {
			parallaxInit();
		} else {
			$('.theme_col .hover_overlay').each(function() {
				if($(this).hasClass('fixedratio_h1')) {
					$(this).parent().addClass('headerbg_1_themecol_mobile');
				}
				if($(this).hasClass('fixedratio_h2')) {
					$(this).parent().addClass('headerbg_2_themecol_mobile');
				}
				resizeBanner();
			});
		}		
	});
	function parallaxInit() {
		parallax_speed = ajaxObj.parallax_speed;
		$('.theme_col .hover_overlay').each(function() {
			var parallax_div_id = this.id;
			$('#'+parallax_div_id).parent().parallax("50%", parallax_speed);
		});
	}
});

/*----------------------------------------------------*/
// RESIZING THE BANNER CONTENT TO FIT IN MOBILE DEVICES
/*----------------------------------------------------*/

jQuery(window).load(function() {
	"use strict";	
	var $ = jQuery;
	$('#page .theme_col').each(function() {
		var h1_height = $(this).height();
		var h1_height_sub = $(this).find('.abs_heading_text').height();
		var h1_mtop_1 = (h1_height + h1_height_sub) / 2;

		$(this).find('.abs_heading_text').css({ "margin-top" : "-"+h1_mtop_1+"px" });
		var t=0;
		var t_elem;
		$(".page_content h3").each(function () {
			var column_heading = $(this);
			if( column_heading.height() > t ) {
				t_elem=this;
				t=column_heading.height();
			}
		});
		$('.page_content h3').css({ 'height': t+'px' });
	});
});
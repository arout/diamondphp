jQuery(document).ready( function($){
	$.fn.evenElements = function() {	
		var heights  = [];
		
		$(this).removeAttr("style").height('auto');
		
		this.each( function() {
			if($(this).css('transition-duration')){
				transition_duration = (typeof transition_duration == "undefined" ? $(this).css('transition-duration') : transition_duration);
				$(this).css('transition-duration', '0s');
			}
			
			var height = $(this).height('auto').outerHeight();
			
			heights.push(height);
		});	
		
		var largest = Math.max.apply(Math, heights);
	
		return this.each(function() {
            $(this).height(largest);
				
			$(this).css('transition-duration', transition_duration);
        });
	}
	
	jQuery.fn.extend({
	  	renameAttr: function( name, newName, removeData ) {
			var val;
			return this.each(function() {
			  	val = jQuery.attr( this, name );
		  		jQuery.attr( this, newName, val );
		  		jQuery.removeAttr( this, name );
		  		// remove original data
		  		if (removeData !== false){
					jQuery.removeData( this, name.replace('data-','') );
		  		}
			});
	  	}
	});
	
	function debouncer( func , timeout ) {
	   var timeoutID , timeout = timeout || 200;
	   return function () {
	      var scope = this , args = arguments;
	      clearTimeout( timeoutID );
	      timeoutID = setTimeout( function () {
	          func.apply( scope , Array.prototype.slice.call( args ) );
	      } , timeout );
	   }
	}
			
	function commaSeparateNumber(val){
		while (/(\d+)(\d{3})/.test(val.toString())){
		  val = val.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		}
		return val;
	}
	
	if($("div.inventory").length){
		//$("div.inventory").evenElements();
	}
	
	// if wow exists
	if(typeof WOW == 'function'){
		WOW = new WOW({
				boxClass: 'scroll_effect',
				offset: 15
			});
		
		WOW.init();
	}
	
	// animate progress bars
	$(".progress-bar[data-width]").each( function(){
		$(this).css("width", $(this).data('width') + "%");
	});
	
	$(".portfolioFilter li a").click( function(e){
		e.preventDefault();
		$(".portfolioFilter li.active").removeClass("active");
		$(this).parent().addClass('active');
	});
	
	$(document).on({
		mouseenter: function(){
			var elm = $('ul:first', this);
			var off = elm.offset();
			
			if(typeof off != "undefined"){	
				var l = off.left;
				var w = elm.width();
				var docW = $("body").outerWidth(true);
			
				var isEntirelyVisible = (l+ w <= docW);
			
				if ( ! isEntirelyVisible ) {
					$(this).addClass('other_side');
				}
			}
		},
		
		mouseleave: function(){
			if($(this).hasClass('other_side')){
				$(this).removeClass('other_side');	
			}
		}
	}, ".dropdown li");
	
	// testimonial slider
	if($(".testimonial_slider").length){
		$('.testimonial_slider').bxSlider({
			mode: 'horizontal',
			slideMargin: 3,
			minSlides: 1,
			maxSlides: 1,
			auto: true,
			autoHover: true,
			speed: 500,
			pager: false,
			controls: false
		});
	}
	
	// featured service hover
	if($(".featured-service .featured").length){
		$('.featured-service .featured').hover( function() {
			var image = $(this).find('img');
			
			image.data('img', image.attr('src'));
			image.attr('src', image.data('hoverimg'));
		}, function(){
			var image = $(this).find('img');
			
			image.attr('src', image.data('img'));
		});
	}
	
	// faq sort
	if($(".faq-sort").length){
		// faq shortcode
		if(window.location.hash) {
			var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
			
			$(".list_faq a").each( function(index, element){
				if($(this).text().indexOf(hash) !== -1){
					$(this).parent().addClass("active");
				}
			});
			
			if(hash != "All"){
				$(".faq-sort div.panel").each(function(index, element) {
					var in_categories = $(this).data('categories');
					
					if(in_categories.indexOf(hash) === -1){
						$(this).hide({effect: "fold", duration: 600});
					} else {
						$(this).show({effect: "fold", duration: 600});
					}
				});
			}
		} else {
			$(".list_faq li").first().addClass("active");
		}
		
		$("a[data-action='sort']").click( function(){
			var category = $(this).attr("href").replace("#", "");
			var faqs     = $(".faq-sort div.panel");
												
			$(".list_faq li.active").removeClass("active");
			
			$(this).parent().addClass("active");
			
			if(category == "All"){
				faqs.each(function(index, element) {
					$(this).show({effect: "fold", duration: 600});
				});
			} else {
				faqs.each(function(index, element) {
					var in_categories = $(this).data('categories');
					
					if(in_categories.indexOf(category) === -1){
						$(this).hide({effect: "fold", duration: 600});
					} else {
						$(this).show({effect: "fold", duration: 600});
					}
				});
			}
		});
	}
	
	// portfolio sorting
	if($(".portfolioContainer").length){
		$(".portfolioContainer").mixItUp({
			callbacks: {
				onMixLoad: function(state){
					//$(".portfolioContainer .mix").each( function(i, n){ $(this).css("float", "none"); });
				}/*,
				onMixStart: function(state){
					$(".portfolioContainer .mix").each( function(i, n){ $(this).height($(".portfolioContainer .mix").height()); });
				}*/
			}
		});
	}
	
	// social likes
	if($('.social-likes').length){
		$('.social-likes').socialLikes({
			zeroes: 'yes'
		});
	}
	
	// select box
	if($(".css-dropdowns").length){
		$(".css-dropdowns").selectbox();
	}
	
	// fancy box
	if($(".fancybox").length){
		$(".fancybox").fancybox();
	}
	
	// parallax effect
	if($(".parallax_scroll").length){
		$(".parallax_scroll").parallax({ speed: 0.15 });
		
		/*$(".parallax_scroll").each( function(index, element){
			$(this).scrolly({ bgParallax: true });
		});*/
		
		$(".parallax_parent").each( function(){
			$(this).height($(this).find(".parallax_scroll").height());
		});
	}


	$( window ).resize( debouncer( function ( e ) {
	    $(".parallax_parent").each( function(){
	    	$(this).height($(this).find(".parallax_scroll").height());
	    });
	} ) );
	
	function animate_number(el, value){		
		var original = value;
		    value    = parseInt(value);
	
		$({ someValue: 0 }).animate({ someValue: value }, {
			duration: 3000,
			easing: 'easeOutExpo', 
			step: function() { 
				el.text(commaSeparateNumber(Math.round(this.someValue)));
			},
			complete: function(){
				// ensure correct number appears after animate, wierd bugs in cause larger numbers to lose a few digits //
				el.text(commaSeparateNumber(Math.round(original)));
			}
		});
	}
	
	// animate numbers
	if($(".animate_number").length){
		$(".animate_number").each( function(){					
			var el 	  = $(this).find(".number");
			
			el.data('value', el.text());
			el.text(0);
			
			$(this).one('inview', function(event, isInView, visiblePartX, visiblePartY){
				var value = el.data('value').replace(/[^0-9]/gi, '');					
				
				if(isInView){
					setTimeout( function(){
						animate_number(el, value);
					}, 500);
				}
				
			});
		});
	}
	
	// fullwidth functionality
	$(".fullwidth_element").each( function(index, element){
		var height = $(this).height();

		$(this).closest(".fullwidth_element_parent").height(height);
	});
	
	// dropdown menu
	if($(".dropdown .dropdown").length){
		$('.dropdown .dropdown').each(function(){
			var $self = $(this);
			var handle = $self.children('[data-toggle="dropdown"]');
			$(handle).click(function(){
				var submenu = $self.children('.dropdown-menu');
				$(submenu).toggle();
				return false;
			});
		});
	}
	
	// grid switch
	if($('#grid-switch-control li a').length){
		$('#grid-switch-control li a').click(function(e) {
			e.preventDefault();
			var _sidebar = $(this).attr('data-sidebar');
			var _boxview = $(this).attr('data-boxview');
			$('#grid-switch').removeClass('no-sidebar').removeClass('left-sidebar').removeClass('right-sidebar').removeClass('list-view').removeClass('grid-view');
			$('#grid-switch').addClass(_sidebar).addClass(_boxview);
		});
	}
	
	// sliders
	if($('.carasouel-slider').length){
		$('.carasouel-slider').bxSlider({
			slideWidth: 155,
			minSlides: 1,
			maxSlides: 6,
			slideMargin: 30,
			infiniteLoop:false,
			pager:false,
			nextSelector:jQuery('#slideControls>.next-btn'),
			prevSelector:jQuery('#slideControls>.prev-btn')
		});
	}
	
	if($('.carasouel-slider3').length){
		$('.carasouel-slider3').bxSlider({
			slideWidth: 170,
			minSlides: 1,
			maxSlides: 6,
			slideMargin: 30,
			infiniteLoop:false,
			pager:false,
			prevSelector:jQuery('#slideControls3>.prev-btn'),
			nextSelector:jQuery('#slideControls3>.next-btn'),
		});
	}
	
	if($('.flexslider2').length){
		$('.flexslider2').flexslider({
			animation: "slide",
			directionNav:true,
			controlNav: false,
			prevText:"",
			nextText:""		
		});
	}
	
	// inventory listing slider
	if($('#home-slider-canvas').length){
		$('#home-slider-canvas').flexslider({
			animation: "slide",
			controlNav: false,
			directionNav:false,
			animationLoop: false,
			slideshow: false,
			sync: "#home-slider-thumbs",
			after: function(){				
				if(!$(".home-banner > i.flex-active-slide > a > img").length){
					$(".home-banner").find("li.flex-active-slide > img").wrap("<a class='fancybox fancybox_listing_link' href='" + $("li.flex-active-slide img").data("full-image") + "'></a>");
					$(".fancybox").fancybox();
				}
			},
			start: function(){
				$(".home-banner").find("li.flex-active-slide > img").wrap("<a class='fancybox fancybox_listing_link' href='" + $("li.flex-active-slide img").data("full-image") + "'></a>");
				$(".fancybox").fancybox();
			}
		});
	}
	
	if($('#home-slider-thumbs').length){
		$('#home-slider-thumbs').flexslider({
			animation: "slide",
			controlNav: false,
			directionNav:true,
			animationLoop: false,
			slideshow: false,
			itemWidth: 171,
			itemMargin: 5,
			asNavFor: '#home-slider-canvas'
		}); 
	}
	
	
  	if($('.recent_blog_posts').length){
		$('.recent_blog_posts').bxSlider({
			mode: 'vertical',
			moveSlides: 1,
			auto: false,
			speed: 500,
			pager: false,
			minSlides: 2,
			maxSlides: 2,
			nextSelector: '.blog_post_controls',
			prevSelector: '.blog_post_controls',
			nextText: '<i class=" fa fa-chevron-up"></i>',
			prevText: '<i class=" fa fa-chevron-down"></i>',
			adaptiveHeight: true
		});
	}
	
	// my tab
	if($('#myTab a').length){
		$('#myTab a').click(function (e) {
			e.preventDefault()
			$(this).tab('show');
		});
		
		$('#myTab a').on('shown.bs.tab', function (e) {			
			if($("div.inventory").length){
				//$("div.inventory").evenElements();
			}
		})
	}
	
	// fix parent nav links
	/*$("header li.dropdown a.dropdown-toggle").each( function(index, element){
		if(typeof $(this).attr("href") !== "undefined"){
			$(this).addClass("disabled");
		}
	});*/
	
	$(".flip").on({
		mouseenter: function(){	
			if($(this).css('border-top-color') != 'rgb(0, 255, 0)'){
				$(this).find('.card').addClass('flipped');
			}
		},
		mouseleave: function(){
			if($(this).css('border-top-color') != 'rgb(0, 255, 0)'){
				$(this).find('.card').removeClass('flipped');
			}
		}
	});
	
	if($(".fancybox_div").length){
		$(".fancybox_div").each( function(index, element){
			$(this).fancybox({
				'width' : '600',
				'type'  : 'ajax'
			});
		});
	}
	
	if($(".view-video").length){
		$(".view-video").each(function() {
			var ele = $(this);
			
			$(this).fancybox({
				'href'       : '#youtube_video',
				'height'     : '320',
				'width'      : '560',
				'fitToView'  : false,
				'autoSize'   : false,
				'maxWidth'	 : '90%',
				'beforeLoad' : function(){
					var youtube_url = 'http://www.youtube.com/embed/' + ele.data("youtube-id") + '?vq=hd720&autoplay=1';
					
					$("#youtube_video iframe").attr("src", youtube_url);
				},
				'afterClose' : function(){
					$("#youtube_video iframe").attr("src", "#");
				}
			});
		});
	}
	
	function flip_card_size(){
		$(".flip").each( function(index, element){	
			var frontHeight = $(this).find('.front img').outerHeight();
			var frontWidth  = $(this).find('.front img').outerWidth();
			
			$(this).find('.flip, .back, .front, .card').height(frontHeight);
			$(this).height(frontHeight);
			
			$(this).find('.flip, .back, .front, .card').width(frontWidth);
			$(this).width(frontWidth);
		});
	}
	
	function flip_card_reset_size(){
		$(".flip").each( function(index, element){				
			$(this).find('.flip, .back, .front, .card').removeAttr("style").css("width", "auto");
			$(this).removeAttr("style").css("width", "auto"); 
		});
	}
	

	//\\flip_card_size();
	
	if($(".back_to_top").length){
		$(".back_to_top").click(function() {
		   $("html, body").animate({ scrollTop: 0 }, "slow");
		   return false;
		});
		
		$(window).scroll(function() {
			var height = $(window).scrollTop();
		
			if(height > 300) {
				$(".back_to_top").fadeIn();
			} else {
				$(".back_to_top").fadeOut();
			}
		});
	}
	
	if($(".portfolioContainer").length){
		//$(".portfolioContainer > div").evenElements();
	}
	
	// ajax_form
	$(document).on("submit", ".ajax_form", function(e){
		e.preventDefault();
		
		var empty_input = false;
		
		$(this).find("*:not(input[type='submit'])").filter(":input").each( function(index, element){
			if(!$(this).val().trim()){
				empty_input = true;
				
				$(this).css("border", "1px solid #F00");
			} else {
				$(this).attr("style", "");
			}
		});
			
		//check recaptcha
		// if($("#recaptcha").length){
		// 	var recaptcha_challenge_field = $(this).find("input[name='recaptcha_challenge_field']").val();
		// 	var recaptcha_response_field  = $(this).find("input[name='recaptcha_response_field']").val();
			
		// 	$.ajax({
		// 		type: "POST",
		// 		url: "includes/recaptcha_check.php",
		// 		data: {recaptcha_challenge_field: recaptcha_challenge_field, recaptcha_response_field: recaptcha_response_field },
		// 		success: function(data){
		// 			if(data != "success"){
		// 				if(!$(".recaptcha_message").length){
		// 					$("#recaptcha").after( "<div class='recaptcha_message'>" + data + "</div>" );
		// 				} else {
		// 					$(".recaptcha_message").html(data);
		// 				}
		// 				return false;
		// 			}
		// 		}
		// 	});
		// }
		
		if(empty_input == false){
			var form_values  = $(this).serialize();
			var form_name    = $(this).attr("name");
			var current_form = $(this);
			
			$.ajax({
				type: "POST",
				url: "ajax_form.php",
				data: form_values + "&form=" + form_name,
				success: function(data){
					if(data == "Sent Successfully"){
						$.fancybox.close();				
					} else {
						if($(".error_list").length){
							$(".error_list").remove();
						}
						
						current_form.prepend(data);
					}
				}
			});
		}
	});
	
	function print_tabs(){
		if(!$(".print_tabs").length){
			// generate google map
			var longitude  = $("#google-map-listing").data("longitude");
			var latitude   = $("#google-map-listing").data("latitude");
			var zoom       = $("#google-map-listing").data("zoom");
			
			var google_map = "<img src='http://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude + "&zoom=" + zoom + "&size=700x200&markers=color:blue|label:S|" + latitude + "," + longitude + "&sensor=false'>";
			
			$(".example-tabs").each( function() {		
				var tabs_html = "";			
				$(this).find(".nav-tabs li").each( function(index, element) {			
					tabs_html += "<div><h2>" + $(this).text() + "</h2><br />";			
					
					tabs_html += ($(this).find("a").attr("href") == "#location" ? google_map : $(".tab-content .tab-pane").eq(index).html()) + "</div><br /><br />";			
				});
				
				$(this).after("<div class='print_friendly print_tabs'>" + tabs_html + "</div>");		
			});
		}
	}
	
	function print_header(){
		if(!$(".print_header").length){
			var header_html = "";
			
			header_html += $(".logo").html();
			header_html += $(".company_info").html();
			
			$("body").prepend("<div class='print_friendly print_header'>" + header_html + "</div>");
			
			$(".inventory-heading").append("<div style='clear: both;'></div>");
		}
	}
	
	function print_images(){
		if(!$(".print_image").length){
			var images_html = "";
			
			$("#home-slider-thumbs li").slice(0, 6).each( function(index, element){
				images_html += $(this).html() + (index == 1 || index == 3 ? "<br>" : "");
			});
			
			var car_info = $(".car-info").clone().html();
			
			$(".print_tabs").prepend("<div class='print_friendly print_image'>" + images_html + "<br></div><div class='car-info'>" + car_info + "</div><div style='clear: both;'></div>");
		}
	}
	
	$(".print_page").click( function(){
		print_tabs();
		print_header();
		print_images();
		
		window.print();
	});
	
	if($(".financing_calculator").length){
		// Financing Calculator
		$(document).on("click", '.financing_calculator .calculate', function() {		
			var calculator   = $(this).closest(".financing_calculator");
			
			var cost         = calculator.find(".cost").val();
			var down_payment = calculator.find(".down_payment").val();
			var interest     = calculator.find(".interest").val();
			var loan_years   = calculator.find(".loan_years").val();
			var frequency    = calculator.find(".frequency").val();
			
			if( !cost || !down_payment || !interest || !loan_years  || isNaN(cost) || isNaN(down_payment) || isNaN(interest) || isNaN(loan_years) ){
				if(!cost || isNaN(cost)){
					calculator.find(".cost").addClass("error");
				} else { 
					calculator.find(".cost").removeClass("error");
				}
				
				if(!down_payment || isNaN(down_payment)){
					calculator.find(".down_payment").addClass("error");
				} else { 
					calculator.find(".down_payment").removeClass("error");
				}	
					
				if(!interest || isNaN(interest)){
					calculator.find(".interest").addClass("error");
				} else { 
					calculator.find(".interest").removeClass("error");
				}	
						
				if(!loan_years || isNaN(loan_years)){
					calculator.find(".loan_years").addClass("error");
				}	 else { 
					calculator.find(".loan_years").removeClass("error");
				}	
								
				return;
			}
			
			calculator.find("input").removeClass("error");
			
			switch(frequency) {
				case "0":
					frequency_rate = 26;
					break;
				case "1":
					frequency_rate = 52;
					break;
				case "2":
					frequency_rate = 12;
					break;			
			}
			
			interest_rate = (interest) / 100;
			rate          = interest_rate / frequency_rate;
			payments      = loan_years * frequency_rate;
			difference    = cost - down_payment;
		
			payment = Math.floor((difference*rate)/(1-Math.pow((1+rate),(-1*payments)))*100)/100;
			
			calculator.find(".payments").text(payments);
			calculator.find(".payment_amount").text("$" + payment);
		});
	}
	
});
	
// have to wait until DOM is fully loaded (images too)
$(window).load(function(){ 
	
	
	$('#myTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
		
		var index = $(this).parent().index();
		
		if(index == 3){
			setTimeout( function(){
				init_google_map();
			}, 500);
		}
	});
	
	
	// google map
	function init_google_map(){		
		
		if($("#google-map-listing").length){
			var latitude     = $("#google-map-listing").data('latitude');
			var longitude    = $("#google-map-listing").data('longitude');
			var zoom         = $("#google-map-listing").data('zoom');
			var scroll_wheel = $("#google-map-listing").data('scroll');
			var style        = $("#google-map-listing").data('style');
			var parallax     = $("#google-map-listing").data('parallax');
			
			if(latitude && longitude){				
				var myLatlng = new google.maps.LatLng(latitude, longitude);
				var myOptions = {
					zoom: zoom,
					center: myLatlng,
					popup: true,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				}

				if(parallax != false && typeof parallax == "undefined"){
					myOptions.scroll = {
						x:$(window).scrollLeft(),
						y:$(window).scrollTop()
					}
				}
				
				if(scroll_wheel == false && typeof scroll_wheel != "undefined"){
					myOptions.scrollwheel = false;
				}
				
				if(typeof style != "undefined"){
					myOptions.styles = style;
				}				
				
				var map = new google.maps.Map(document.getElementById("google-map-listing"), myOptions);
				
				var marker = new google.maps.Marker({
					position: myLatlng, 
					map: map,
					title: "Our Location"
				});

				if(parallax != false && typeof parallax == "undefined"){
					var offset = $("#google-map-listing").offset();
				    map.panBy(((myOptions.scroll.x-offset.left)/3),((myOptions.scroll.y-offset.top)/3));
				      
				    google.maps.event.addDomListener(window, 'scroll', function(){
					    var scrollY = $(window).scrollTop(),
					        scrollX = $(window).scrollLeft(),
					        scroll  = map.get('scroll');
					    
					    if(scroll){
							map.panBy(-((scroll.x-scrollX)/3),-((scroll.y-scrollY)/3));
					    }

					    map.set('scroll',{
					    	x:scrollX,
					    	y:scrollY
					    });
					});
				}

				google.maps.event.addListener(marker, 'click', function() {
					map.setZoom(zoom);
				});
			}
		}
	}
	
	init_google_map();
});
	
function rev_iframe(){
	jQuery('.tp-banner').revolution().revnext();
}
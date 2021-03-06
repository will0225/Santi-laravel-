jQuery(function() {
	'use strict';
	document.addEventListener("touchstart", function() {}, false);
	jQuery(function() {
		jQuery('body').wrapInner('<div class="horizontalMenucontainer" />');
		jQuery('<div class="horizontal-overlapbg"></div>').prependTo('.horizontalMenu');
		jQuery('.horizontal-navtoggle').click(function() {
			jQuery('body').toggleClass('active menu-open');
		});
		jQuery('.horizontal-overlapbg').click(function() {
			jQuery("body").removeClass('active menu-open');
		});
		jQuery('.horizontalMenu > .horizontalMenu-list > li').has('.sub-menu').prepend('<span class="horizontalMenu-click"><i class="horizontalMenu-arrow fe fe-chevron-down"></i></span>');
		jQuery('.horizontalMenu > .horizontalMenu-list > li').has('.horizontal-megamenu').prepend('<span class="horizontalMenu-click"><i class="horizontalMenu-arrow fe fe-chevron-down"></i></span>');
		jQuery('.horizontalMenu-click').click(function() {
			jQuery(this).toggleClass('horizontal-activearrow').parent().siblings().children().removeClass('horizontal-activearrow');
			jQuery(".horizontalMenu > .horizontalMenu-list > li > .sub-menu, .horizontal-megamenu").not(jQuery(this).siblings('.horizontalMenu > .horizontalMenu-list > li > .sub-menu, .horizontal-megamenu')).slideUp('slow');
			jQuery(this).siblings('.sub-menu').slideToggle('slow');
			jQuery(this).siblings('.horizontal-megamenu').slideToggle('slow');
		});
		jQuery('.horizontalMenu > .horizontalMenu-list > li > ul > li').has('.sub-menu').prepend('<span class="horizontalMenu-click02"><i class="horizontalMenu-arrow fe fe-chevron-down"></i></span>');
		jQuery('.horizontalMenu > .horizontalMenu-list > li > ul > li > ul > li').has('.sub-menu').prepend('<span class="horizontalMenu-click02"><i class="horizontalMenu-arrow fe fe-chevron-down"></i></span>');
		jQuery('.horizontalMenu-click02').click(function() {
			jQuery(this).children('.horizontalMenu-arrow').toggleClass('horizontalMenu-rotate');
			jQuery(this).siblings('li > .sub-menu').slideToggle('slow');
		});
		jQuery(window).on('resize', function() {
			if (jQuery(window).outerWidth() < 992) {
				jQuery('.horizontalMenu').css('height', jQuery(this).height() + "px");
				jQuery('.horizontalMenucontainer').css('min-width', jQuery(this).width() + "px");
			} else {
				jQuery('.horizontalMenu').removeAttr("style");
				jQuery('.horizontalMenucontainer').removeAttr("style");
				jQuery('body').removeClass("active menu-open");
				jQuery('.horizontalMenu > .horizontalMenu-list > li > .horizontal-megamenu, .horizontalMenu > .horizontalMenu-list > li > ul.sub-menu, .horizontalMenu > .horizontalMenu-list > li > ul.sub-menu > li > ul.sub-menu, .horizontalMenu > .horizontalMenu-list > li > ul.sub-menu > li > ul.sub-menu > li > ul.sub-menu').removeAttr("style");
				jQuery('.horizontalMenu-click').removeClass("horizontal-activearrow");
				jQuery('.horizontalMenu-click02 > i').removeClass("horizontalMenu-rotate");
			}
		});
		jQuery(window).trigger('resize');
	});
	
	
	
	//sticky-header
		$(window).on("scroll", function(e){
		if ($(window).scrollTop() >= 70) {
			$('.hor-header').addClass('fixed-header');
			$('.hor-header').addClass('visible-title');
		}
		else {
			$('.hor-header').removeClass('fixed-header');
			$('.hor-header').removeClass('visible-title');
		}
    });
	//sticky-header
		$(window).on("scroll", function(e){
		if ($(window).scrollTop() >= 70) {
			$('.hor-menu').addClass('fixed-header');
			$('.hor-menu').addClass('visible-title');
		}
		else {
			$('.hor-menu').removeClass('fixed-header');
			$('.hor-menu').removeClass('visible-title');
		}
    });
}());
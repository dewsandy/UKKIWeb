
/*!
 * jQuery Cookie Plugin
 */
!function(e){if("function"==typeof define&&define.amd)define(e);else if("object"==typeof exports)module.exports=e();else{var n=window.Cookies,t=window.Cookies=e();t.noConflict=function(){return window.Cookies=n,t}}}(function(){function e(){for(var e=0,n={};e<arguments.length;e++){var t=arguments[e];for(var o in t)n[o]=t[o]}return n}function n(t){function o(n,r,i){var c;if(arguments.length>1){if(i=e({path:"/"},o.defaults,i),"number"==typeof i.expires){var s=new Date;s.setMilliseconds(s.getMilliseconds()+864e5*i.expires),i.expires=s}try{c=JSON.stringify(r),/^[\{\[]/.test(c)&&(r=c)}catch(a){}return r=t.write?t.write(r,n):encodeURIComponent(String(r)).replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g,decodeURIComponent),n=encodeURIComponent(String(n)),n=n.replace(/%(23|24|26|2B|5E|60|7C)/g,decodeURIComponent),n=n.replace(/[\(\)]/g,escape),document.cookie=[n,"=",r,i.expires&&"; expires="+i.expires.toUTCString(),i.path&&"; path="+i.path,i.domain&&"; domain="+i.domain,i.secure?"; secure":""].join("")}n||(c={});for(var p=document.cookie?document.cookie.split("; "):[],d=/(%[0-9A-Z]{2})+/g,u=0;u<p.length;u++){var f=p[u].split("="),l=f[0].replace(d,decodeURIComponent),m=f.slice(1).join("=");'"'===m.charAt(0)&&(m=m.slice(1,-1));try{if(m=t.read?t.read(m,l):t(m,l)||m.replace(d,decodeURIComponent),this.json)try{m=JSON.parse(m)}catch(a){}if(n===l){c=m;break}n||(c[l]=m)}catch(a){}}return c}return o.get=o.set=o,o.getJSON=function(){return o.apply({json:!0},[].slice.call(arguments))},o.defaults={},o.remove=function(n,t){o(n,"",e(t,{expires:-1}))},o.withConverter=n,o}return n(function(){})});



/**	STYLE SWITCHER
*************************************************** **/
jQuery(document).ready(function() {
	"use strict";

		var _sw =
				'<div id="switcher" class="hide hidden-xs">'
				+ '	<div class="content-switcher">'
				+ '		<h4>STYLE SWITCHER</h4>'

				+ '		<ul class="list-unstyled">'
				+ '			<li><a href="#" onclick="setActiveStyleSheet(\'green\'); return false;" title="green" class="color"><img src="assets/plugins/styleswitcher/color_schemes/6.png" alt="" width="30" height="30" /></a></li>'
				+ '			<li><a href="#" onclick="setActiveStyleSheet(\'red\'); return false;" title="red" class="color"><img src="assets/plugins/styleswitcher/color_schemes/2.png" alt="" width="30" height="30" /></a></li>'
				+ '			<li><a href="#" onclick="setActiveStyleSheet(\'orange\'); return false;" title="orange" class="color"><img src="assets/plugins/styleswitcher/color_schemes/1.png" alt="" width="30" height="30" /></a></li>'
				+ '			<li><a href="#" onclick="setActiveStyleSheet(\'pink\'); return false;" title="pink" class="color"><img src="assets/plugins/styleswitcher/color_schemes/3.png" alt="" width="30" height="30" /></a></li>'
				+ '			<li><a href="#" onclick="setActiveStyleSheet(\'yellow\'); return false;" title="yellow" class="color"><img src="assets/plugins/styleswitcher/color_schemes/4.png" alt="" width="30" height="30" /></a></li>'
				+ '			<li><a href="#" onclick="setActiveStyleSheet(\'darkgreen\'); return false;" title="darkgreen" class="color"><img src="assets/plugins/styleswitcher/color_schemes/5.png" alt="" width="30" height="30" /></a></li>'
				+ '			<li><a href="#" onclick="setActiveStyleSheet(\'darkblue\'); return false;" title="darkblue" class="color"><img src="assets/plugins/styleswitcher/color_schemes/7.png" alt="" width="30" height="30" /></a></li>'
				+ '			<li><a href="#" onclick="setActiveStyleSheet(\'blue\'); return false;" title="blue" class="color"><img src="assets/plugins/styleswitcher/color_schemes/8.png" alt="" width="30" height="30" /></a></li>'
				+ '			<li><a href="#" onclick="setActiveStyleSheet(\'brown\'); return false;" title="brown" class="color"><img src="assets/plugins/styleswitcher/color_schemes/9.png" alt="" width="30" height="30" /></a></li>'
				+ '			<li><a href="#" onclick="setActiveStyleSheet(\'lightgrey\'); return false;" title="lightgrey" class="color"><img src="assets/plugins/styleswitcher/color_schemes/10.png" alt="" width="30" height="30" /></a></li>'
				+ '		</ul>'

				+ '		<div class="margin-top-10 text-left">'

				+ '			<div class="clearfix">'
				+ '				<label class="radio"><input class="dark_switch" type="radio" name="color_skin" id="is_light" value="light" checked="checked"><i></i> Light</label>'
				+ '				<label class="radio"><input class="dark_switch" type="radio" name="color_skin" id="is_dark" value="dark"><i></i> Dark</label>'
				+ '			</div>'

				+ '			<hr class="hidden-xs" />'

				+ '			<div class="clearfix hidden-xs">'
				+ '				<label class="radio"><input class="boxed_switch" type="radio" name="layout_style" id="is_wide" value="wide" checked="checked"><i></i> Wide</label>'
				+ '				<label class="radio"><input class="boxed_switch" type="radio" name="layout_style" id="is_boxed" value="boxed"><i></i> Boxed</label>'
				+ '			</div>'

				+ '			<hr />'

				+ '			<div class="clearfix">'
				+ '				<label class="radio"><input class="rtl_switch" type="radio" name="layout_rtl" id="is_ltr" value="ltr" checked="checked"><i></i> LTR</label>'
				+ '				<label class="radio"><input class="rtl_switch" type="radio" name="layout_rtl" id="is_rtl" value="rtl"><i></i> RTL</label>'
				+ '			</div>'

				+ '		</div>'

				+ '		<p class="nomargin-bottom">Patterns for Boxed Version</p>'
				+ '		<div>'
				+ '			<button onclick="pattern_switch(\'none\');" class="pointer switcher_thumb"><img src="assets/images/patterns/none.jpg" width="27" height="27" alt="" /></button>'
				+ '			<button onclick="pattern_switch(\'pattern2\');" class="pointer switcher_thumb"><img src="assets/images/patterns/pattern2.png" width="27" height="27" alt="" /></button>'
				+ '			<button onclick="pattern_switch(\'pattern3\');" class="pointer switcher_thumb"><img src="assets/images/patterns/pattern3.png" width="27" height="27" alt="" /></button>'
				+ '			<button onclick="pattern_switch(\'pattern4\');" class="pointer switcher_thumb"><img src="assets/images/patterns/pattern4.png" width="27" height="27" alt="" /></button>'
				+ '			<button onclick="pattern_switch(\'pattern5\');" class="pointer switcher_thumb"><img src="assets/images/patterns/pattern5.png" width="27" height="27" alt="" /></button>'
				+ '		</div>'

				+ '		<div>'
				+ '			<button onclick="pattern_switch(\'pattern6\');" class="pointer switcher_thumb"><img src="assets/images/patterns/pattern6.png" width="27" height="27" alt="" /></button>'
				+ '			<button onclick="pattern_switch(\'pattern7\');" class="pointer switcher_thumb"><img src="assets/images/patterns/pattern7.png" width="27" height="27" alt="" /></button>'
				+ '			<button onclick="pattern_switch(\'pattern8\');" class="pointer switcher_thumb"><img src="assets/images/patterns/pattern8.png" width="27" height="27" alt="" /></button>'
				+ '			<button onclick="pattern_switch(\'pattern9\');" class="pointer switcher_thumb"><img src="assets/images/patterns/pattern9.png" width="27" height="27" alt="" /></button>'
				+ '			<button onclick="pattern_switch(\'pattern10\');" class="pointer switcher_thumb"><img src="assets/images/patterns/pattern10.png" width="27" height="27" alt="" /></button>'
				+ '		</div>'

				+ '		<p class="nomargin-bottom">Images for Boxed Version</p>'
				+ '		<button onclick="background_switch(\'none\');" class="pointer switcher_thumb"><img src="assets/images/demo/boxed_background/none.jpg" width="27" height="27" alt="" /></button>'
				+ '		<button onclick="background_switch(\'assets/images/demo/boxed_background/1.jpg\');" class="pointer switcher_thumb"><img src="assets/images/demo/boxed_background/1_thumb.jpg" width="27" height="27" alt="" /></button>'
				+ '		<button onclick="background_switch(\'assets/images/demo/boxed_background/2.jpg\');" class="pointer switcher_thumb"><img src="assets/images/demo/boxed_background/2_thumb.jpg" width="27" height="27" alt="" /></button>'
				+ '		<button onclick="background_switch(\'assets/images/demo/boxed_background/3.jpg\');" class="pointer switcher_thumb"><img src="assets/images/demo/boxed_background/3_thumb.jpg" width="27" height="27" alt="" /></button>'
				+ '		<button onclick="background_switch(\'assets/images/demo/boxed_background/4.jpg\');" class="pointer switcher_thumb"><img src="assets/images/demo/boxed_background/4_thumb.jpg" width="27" height="27" alt="" /></button>'

				+ '		<hr />'

				+ '		<div class="text-center">'
				+ '			<button onclick="resetSwitcher();" class="btn btn-primary btn-sm">Reset Styles</button>'
				+ '		</div>'

				+ '		<div id="hideSwitcher">&times;</div>'
				+ '	</div>'
				+ '</div>'

				+ '<div id="showSwitcher" class="styleSecondColor hide hidden-xs"><i class="fa fa-paint-brush styleColor"></i></div>';

	// ADD CLASS
	jQuery("head").append('<link href="assets/plugins/styleswitcher/styleswitcher.css" rel="stylesheet" type="text/css" />');
	jQuery("body").append(_sw);
	jQuery("#switcher, #showSwitcher").removeClass('hide');

    if (localStorage.getItem("color_skin") === 'dark') {
        jQuery("#css_dark_skin").remove();
		jQuery("head").append('<link id="css_dark_skin" href="assets/css/layout-dark.css" rel="stylesheet" type="text/css" title="dark" />');
        jQuery(".navbar-collapse").addClass("submenu-dark");
        jQuery("#header").addClass("dark");
		jQuery("a.logo img").attr('src', 'assets/images/logo_light.png');
		jQuery("#is_dark").prop("checked", true);
    }
    
    if (localStorage.getItem("direction") === 'rtl') {
        jQuery("#rtl_ltr").remove();
		jQuery("#rtl_ltr_b1").remove();
		jQuery("#rtl_ltr_b2").remove();
        jQuery("#is_rtl").prop("checked", true);
		jQuery("head").append('<link href="assets/plugins/bootstrap/RTL/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" id="rtl_ltr_b1" />');
		jQuery("head").append('<link href="assets/plugins/bootstrap/RTL/bootstrap-flipped.min.css" rel="stylesheet" type="text/css" id="rtl_ltr_b2" />');
		jQuery("head").append('<link href="assets/css/layout-RTL.css" rel="stylesheet" type="text/css" id="rtl_ltr" />');
    }
    
    if (localStorage.getItem("is_boxed") === 'boxed') {
        jQuery("body").removeClass('boxed');
		jQuery("body").addClass('boxed');
		jQuery("#is_boxed").prop("checked", true);
    }
    
    if (localStorage.getItem("style") === 'none') {
        jQuery("#color_scheme").attr('href', 'assets/css/color_scheme/pink.css');
    }

    jQuery("#hideSwitcher, #showSwitcher").click(function () {

        if (jQuery("#showSwitcher").is(":visible")) {

			var _identifier = "#showSwitcher";
            jQuery("#switcher").animate({"margin-left": "0px"}, 500).show();
			createCookie("switcher_visible", 'true', 365);

        } else {

			var _identifier = "#switcher";
            jQuery("#showSwitcher").show().animate({"margin-left": "0"}, 500);
			createCookie("switcher_visible", 'false', 365);

        }

		jQuery(_identifier).animate({"margin-left": "-500px"}, 500, function () {
			jQuery(this).hide();
		});

    });


	/**
		COLOR SKIN [light|dark]
	**/
	jQuery("input.dark_switch").bind("click", function() {
		var color_skin = jQuery(this).attr('value');

		if(color_skin == 'dark') {
			jQuery("#css_dark_skin").remove();
			jQuery("head").append('<link id="css_dark_skin" href="assets/css/layout-dark.css" rel="stylesheet" type="text/css" title="dark" />');
            jQuery(".navbar-collapse").addClass("submenu-dark");
            jQuery("#header").addClass("dark");
            jQuery("a.logo img").attr('src', 'assets/images/logo_light.png');
			localStorage.setItem("color_skin", 'dark');
		} else {
			jQuery("#css_dark_skin").remove();
			jQuery(".navbar-collapse").removeClass("submenu-dark");
            jQuery("#header").removeClass("dark");
			jQuery("a.logo img").attr('src', 'assets/images/logo_dark.png');
			localStorage.setItem("color_skin", 'light');
		}
	});



	/**
		RTL|LTR
	**/
	jQuery("input.rtl_switch").bind("click", function() {
		var _direction = jQuery(this).attr('value');

		if(_direction == 'rtl') {
			jQuery("#rtl_ltr").remove();
			jQuery("#rtl_ltr_b1").remove();
			jQuery("#rtl_ltr_b2").remove();

			jQuery("head").append('<link href="assets/plugins/bootstrap/RTL/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" id="rtl_ltr_b1" />');
			jQuery("head").append('<link href="assets/plugins/bootstrap/RTL/bootstrap-flipped.min.css" rel="stylesheet" type="text/css" id="rtl_ltr_b2" />');
			jQuery("head").append('<link href="assets/css/layout-RTL.css" rel="stylesheet" type="text/css" id="rtl_ltr" />');

			localStorage.setItem("direction", 'rtl');
		} else {
			jQuery("#rtl_ltr").remove();
			jQuery("#rtl_ltr_b1").remove();
			jQuery("#rtl_ltr_b2").remove();

			localStorage.setItem("direction", 'ltr');
		}
	});


	/**
		LAYOUT STYLE [wide|boxed]
	**/
	jQuery("input.boxed_switch").bind("click", function() {
		var boxed_switch = jQuery(this).attr('value');

		if(boxed_switch == 'boxed') {
			jQuery("body").removeClass('boxed');
			jQuery("body").addClass('boxed');
			localStorage.setItem("is_boxed", 'boxed');
		} else {
			jQuery("body").removeClass('boxed');
			localStorage.setItem("is_boxed", false);
			jQuery('body').removeClass('transparent');
            pattern_switch('none');
            background_switch('none');
		}

		/*
			IE Fix - boxed & sticky header
			@Styleswitcher bug only.
		*/
		if(jQuery('html').hasClass('ie')) {
			jQuery(window).scroll(function() {
				if(jQuery('body').hasClass('boxed')) {
					jQuery("#header").removeClass('sticky');
					jQuery("#header").removeClass('affix');
				}
			});
		}

	});


});



	/** ********************************************************************************************************** **/
	/** ********************************************************************************************************** **/
	/** ********************************************************************************************************** **/
	function setActiveStyleSheet(title) {
		if(title != 'null' && title != null) {
			jQuery("#color_scheme").attr('href', 'assets/css/color_scheme/' + title + '.css');
			localStorage.setItem("style", title);


			// DARK SKIN
			/**
			var color_skin = readCookie('color_skin');
			if(color_skin == 'dark') {
				jQuery("#css_dark_skin").remove();
				jQuery("head").append('<link id="css_dark_skin" href="assets/css/layout-dark.css" rel="stylesheet" type="text/css" title="dark" />');
				jQuery("#is_dark").trigger('click');
				jQuery("a.logo img").attr('src', 'assets/images/logo_dark.png');
			}
			**/
		}
	}

	function getActiveStyleSheet() {

		return null;
	}

	function getPreferredStyleSheet() {
		var i, a;
		for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
			if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("rel").indexOf("alt") == -1 && a.getAttribute("title")) {
				return a.getAttribute("title");
			}
		}

		return null;
	}

	function createCookie(name,value,days) {
		/**
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
		} else {
			expires = "";
		}	document.cookie = name+"="+value+expires+"; path=/";
		**/
	}

	function readCookie(name) {
		/**
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];

			while (c.charAt(0)==' ') {
				c = c.substring(1,c.length);
			}

			if (c.indexOf(nameEQ) == 0) {
				return c.substring(nameEQ.length,c.length);
			}
		}
		**/

		return null;
	}

	jQuery("select#headerLayout").click(function() {

		var type = jQuery(this).attr('value');

		if (jQuery("#css_navigation_style").length > 0){
			jQuery("#css_navigation_style").remove();
		}

		jQuery("head").append("<link>");
		jQuery("head").children(":last").attr({
			rel:  	"stylesheet",
			type: 	"text/css",
			id: 	"css_navigation_style",
			href: 	"css/navigation-style-" + type + ".css"
		});

	});


	/**
		Pattern Background
	**/
	function pattern_switch(pattern) {
		if(pattern == 'none' || pattern == '') {
			createCookie("pattern_switch", pattern, -1);
			remove_pattern();
		} else {

			if(!jQuery('body').hasClass('boxed')) {
				jQuery('body').addClass('boxed');
				jQuery("#is_boxed").trigger('click');
				createCookie("is_boxed", 'true', 365);
			}

			createCookie("background_switch", '', -1);
			jQuery('body').attr('data-background', '');
			jQuery('.backstretch').remove();
			jQuery('body').removeClass('transparent');
			remove_pattern();

			remove_pattern();
			jQuery('body').addClass(pattern);
			createCookie("pattern_switch", pattern, 365);
		}
	}
	function remove_pattern() {
		jQuery('body').removeClass('pattern1');
		jQuery('body').removeClass('pattern2');
		jQuery('body').removeClass('pattern3');
		jQuery('body').removeClass('pattern4');
		jQuery('body').removeClass('pattern5');
		jQuery('body').removeClass('pattern6');
		jQuery('body').removeClass('pattern7');
		jQuery('body').removeClass('pattern8');
		jQuery('body').removeClass('pattern9');
		jQuery('body').removeClass('pattern10');
		createCookie("pattern_switch", '', -1);
	}



	/**
		Image Background
	**/
	function background_switch(imgbkg) {
		if(imgbkg == 'none' || imgbkg == '') {

			createCookie("background_switch", '', -1);
			jQuery('body').attr('data-background', '');
			jQuery('.backstretch').remove();
			jQuery('body').removeClass('transparent');
			remove_pattern();

		} else {

			if(!jQuery('body').hasClass('boxed')) {
				jQuery('body').addClass('boxed');
				jQuery("#is_boxed").trigger('click');
				createCookie("is_boxed", 'true', 365);
			}

			jQuery('body').attr('data-background', imgbkg);
			createCookie("background_switch", imgbkg, 365);
			remove_pattern();

			var data_background = jQuery('body').attr('data-background');
			if(data_background) {

				loadScript(plugin_path + 'jquery.backstretch.min.js', function() {

					if(data_background) {
						jQuery.backstretch(data_background);
						jQuery('body').addClass('transparent'); // remove backround color of boxed class
					}

				});

			}
		}
	}



	/**
		Reset Switcher
	**/
	function resetSwitcher() {
		//remove_pattern();
		jQuery('body').removeClass('boxed');
		jQuery("#css_dark_skin").remove();
		jQuery('body').attr('data-background', '');
		jQuery('.backstretch').remove();
		jQuery("a.logo img").attr('src', 'assets/images/logo_light.png');
		jQuery("#color_scheme").attr('href', 'assets/css/color_scheme/pink.css');


		jQuery("#is_light").trigger('click');
		jQuery("#is_wide").trigger('click');
		jQuery("#is_ltr").trigger('click');

		// delete cookies!
		localStorage.setItem("style", 'none');
		localStorage.setItem("is_boxed", null);
		localStorage.setItem("direction", null);
		localStorage.setItem("color_skin", null);
		//location.reload();
	}

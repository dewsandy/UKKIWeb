/** ********************************************** **
	@Swiper Slider
	@URL			http://nivo.dev7studios.com
	
	REQUIRED:
		CSS
		<link href="assets/plugins/slider.camera/css/camera.css" rel="stylesheet" type="text/css" />

		JS
		<script type="text/javascript" src="assets/plugins/slider.camera/scripts/jquery.camera.js"></script>
		<script type="text/javascript" src="assets/js/view/demo.camera_slider.js"></script>
*************************************************** **/
	'use strict';

	jQuery(document).ready(function() {

		if(jQuery(".camera_wrap").length > 0) {
			_cameraInit();
		}

	});



	/**	_cameraInit() 
	******************************* **/
	function _cameraInit() {

		var _slider = jQuery('#camera_wrap_1'),
			_height	= _slider.attr('data-height') || '40%';

		jQuery(_slider).camera({
			thumbnails: true,
			height: 		_height,
			loader: 		'pie',
			loaderPadding: 	1,
			loaderStroke: 	5,
			onLoaded: function() {
				$('#camera_wrap_1 .camera_next').html('<i class="fa fa-angle-right"></i>');
				$('#camera_wrap_1 .camera_prev').html('<i class="fa fa-angle-left"></i>');
			}
		});

	}
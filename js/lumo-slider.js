jQuery(function($){
	$(window).load(function(){

		/* start the slider */
		height = 600/1600 * device_size;

		$('#lumo-slider').plusSlider({
			createArrows: true,
			fullWidth: true,
			createPagination: false,
			sliderType: 'slider', //'slider' or 'fader'
			infiniteSlide: true,
			displayTime: 8000,
			onInit:	function(){
				if( device_size > 1366 ){
					$('#lumo-slider').find('li img').each(function(){
						$(this).prop('src', $(this).data('fullrez'));
						$(this).load($.noop()); /* wait until image loads */
					});
				}
			}
		});
	});
});



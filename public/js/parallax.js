$(document).ready(function() {
	// $('.jumbotron').css({ height: ($(window).height()) +'px' });

	var mountainCentr = $('div.jumbotron');
	var mountainRight = $('div.parallax-mountain-2');
	var mountainLeft = $('div.parallax-mountain-3');
	var fog = $('div.parallax-fog');


	// User scrolling the page
	// $(window).scroll(function(event) {
	// 	let offset = event.clientY;

	// 	// Fog options
	// 	let currentPosFog = fog.offset().top;
	// 	let newPosFog = (currentPosFog + offset) / 30;
	// 	fog.css('transform', 'translate3d(0, '+newPosFog+'px, 0)');

	// 	// Central mountain options
	// 	let currentPos1 = mountainCentr.offset().top;
	// 	let newPos1 = (currentPos1 + offset) / 150;
	// 	mountainCentr.css('transform', 'translate3d(0, '+newPos1+'px, 0)');

	// 	// Right mountain options
	// 	let currentPos2 = mountainRight.offset().top;
	// 	let newPos2 = (currentPos2 + offset) / 80; 
	// 	mountainRight.css('transform', 'translate3d(0, '+newPos2+'px, 0)');

	// 	// Left mountain options
	// 	let currentPos3 = mountainLeft.offset().top;
	// 	let newPos3 = (currentPos3 + offset) / 80;
	// 	mountainLeft.css('transform', 'translate3d(0, '+newPos3+'px, 0)');	
	// });

	// User moving mouse
	$(window).mousemove(function(event) {
		let offset = event.clientX;

		// Fog options
		let currentPosFog = fog.offset().left;
		let newPosFog = (currentPosFog + offset) / 30;
		fog.css('transform', 'translate3d('+newPosFog+'px, 0, 0)');

		// Central mountain options
		let currentPos1 = mountainCentr.offset().left;
		let newPos1 = (currentPos1 + offset) / 120;
		mountainCentr.css('transform', 'translate3d('+newPos1+'px, 0, 0)');

		// Right mountain options
		let currentPos2 = mountainRight.offset().left;
		let newPos2 = (currentPos2 + offset) / 80;
		mountainRight.css('transform', 'translate3d('+newPos2+'px, 0, 0)');

		// Left mountain options
		let currentPos3 = mountainLeft.offset().left;
		let newPos3 = (currentPos3 + offset) / 80;
		mountainLeft.css('transform', 'translate3d('+newPos3+'px, 0, 0)');		
	});
});
$(document).ready(function() {
    var currentPos1 = 0.0;
    var currentPos2 = 0.0;
    var currentPos3 = 0.0;
    var currentPosFog = 0.0;
    var canMove = true;

    // User scrolling the page
    $(window).scroll(function(event) {
        let verOffset = $(this).scrollTop();
        // If the user does not scroll down,
        // then parallax through mousemove is possible
        if (verOffset != 0) {
            canMove = false;
        } else {
            canMove = true;
        }
        // Document options
        let windowWidth = $(this).outerWidth();
        let contentHeight = $('div.content').outerHeight();
        let parallaxHeight = $('div.parallax').outerHeight();
        // Evaluating scrolling coefficiens of the page
        let scrollContentCoef = verOffset / contentHeight * 100;
        let scrollParallaxCoef= verOffset / parallaxHeight * 100;
        // Fog options
        let fog = $('div.parallax-fog');
        let opacityCoef = 1 - 1 / 100 * scrollParallaxCoef;
        let zoomFog = 1 + (windowWidth / 10000 * scrollParallaxCoef);
        fog.css('transform', 'scale('+zoomFog+')');
        fog.css('opacity', opacityCoef);
        currentPosFog = fog.offset().left;
        // Central mountain options
        let mountainCentr = $('div.parallax-mountain-1');
        let zoomMount1 = 1 + (windowWidth / 5000000 * scrollContentCoef);
        mountainCentr.css('transform', 'scale('+zoomMount1+')');
        currentPos1 = mountainCentr.offset().left;
        // Right mountain options
        let mountainRight = $('div.parallax-mountain-2');
        let horOffset1 = windowWidth / 2000 * scrollParallaxCoef;
        let zoomMount2 = 1 + (windowWidth * 0.000005 * scrollContentCoef);
        mountainRight.css('transform', 'translate3d('+horOffset1+'px,0,0) scale('+zoomMount2+')');
        currentPos2 = mountainRight.offset().left;
        // Left mountain options
        let mountainLeft = $('div.parallax-mountain-3');
        let horOffset2 = windowWidth / 1500 * scrollParallaxCoef;
        let zoomMount3 = 1 + (windowWidth * 0.00001 * scrollContentCoef);
        mountainLeft.css('transform', 'translate3d('+horOffset2+'px,0,0) scale('+zoomMount3+')');
        currentPos3 = mountainLeft.offset().left;

        // User scrolling the page to the bottom
        if ($(window).scrollTop() > $(window).height()) {
            fog.css('display', 'none');
            mountainCentr.css('display', 'none');
            mountainRight.css('display', 'none');
            mountainLeft.css('display', 'none');

        } else {
            fog.css('display', 'block');
            mountainCentr.css('display', 'block');
            mountainRight.css('display', 'block');
            mountainLeft.css('display', 'block');
        }
    });

    // User moving mouse
    $(window).mousemove(function(event) {
        if (canMove) {
            let offset = event.clientX;
            // Fog options
            let newPosFog = (currentPosFog + offset) / 30;
            let fog = $('div.parallax-fog');
            fog.css('transform', 'translate3d('+newPosFog+'px, 0, 0)');
            // Central mountain options
            let newPos1 = (currentPos1 + offset) / 150;
            let mountainCentr = $('div.parallax-mountain-1');
            mountainCentr.css('transform', 'translate3d('+newPos1+'px, 0, 0)');
            // Right mountain options
            let newPos2 = (currentPos2 + offset) / 80;
            let mountainRight = $('div.parallax-mountain-2');
            mountainRight.css('transform', 'translate3d('+newPos2+'px, 0, 0)');
            // Left mountain options
            let newPos3 = (currentPos3 + offset) / 80;
            let mountainLeft = $('div.parallax-mountain-3');
            mountainLeft.css('transform', 'translate3d('+newPos3+'px, 0, 0)');
        }
    });
});
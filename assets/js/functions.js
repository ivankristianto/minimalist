jQuery(document).ready(function($){
	var $body, $window, $sidebar, adminbarOffset, headerHeight, top = false,
		bottom = false, windowWidth, windowHeight, lastWindowPos = 0,
		topOffset = 0, bodyHeight, sidebarHeight, sidebarWidth, resizeTimer;

	// Sidebar scrolling.
	function resize() {
		windowWidth   = $window.width();
		windowHeight  = $window.height();
		bodyHeight    = $body.height();
		sidebarHeight = $sidebar.height();
		headerHeight  = $( '#header' ).height() + $( '#nav' ).height();
		sidebarWidth  = $sidebar.width() + 20;

		if ( 955 > windowWidth ) {
			top = bottom = false;
			$sidebar.removeAttr( 'style' );
		}
	}

	function scroll() {
		var windowPos = $window.scrollTop();

		if ( 955 > windowWidth ) {
			return;
		}

		if ( sidebarHeight + adminbarOffset > windowHeight ) {
			if ( windowPos > lastWindowPos ) {
				if ( top ) {
					top = false;
					$sidebar.attr( 'style', 'top: 0px;' ); 
				} else if ( ! bottom && windowPos + windowHeight > sidebarHeight + $sidebar.offset().top && sidebarHeight + adminbarOffset < bodyHeight ) {
					bottom = true;
					$sidebar.attr( 'style', 'position: fixed; bottom: 0; width: ' + sidebarWidth + 'px' );
				}
			} else if ( windowPos < lastWindowPos ) { //scroll up
				if ( bottom ) {
					bottom = false;
					topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;
					$sidebar.attr( 'style', 'top: ' + topOffset + 'px;' );
				} else if ( ! top && windowPos + adminbarOffset < $sidebar.offset().top ) {
					top = true;
					$sidebar.attr( 'style', 'position: fixed; width: '  + sidebarWidth + 'px; color: #100;' );
				}
			} else{
				top = bottom = false;
				$sidebar.attr( 'style', 'top: 0px;' );
			}
		} else if ( ! top ) {
			top = true;
			$sidebar.attr( 'style', 'position: fixed;  width: '  + sidebarWidth + 'px' );
		}
		lastWindowPos = windowPos;
	}

	function resizeAndScroll() {
			resize();
		scroll();
	}

	$( document ).ready( function() {
		$body			= $( document.body );
		$window			= $( window );
		$sidebar		= $( '#sidebar' ).first();
		adminbarOffset  = $body.is( '.admin-bar' ) ? $( '#wpadminbar' ).height() : 0;

		$window
			.on( 'scroll.minimalist', scroll )
			.on( 'resize.minimalist', function() {
				clearTimeout( resizeTimer );
				resizeTimer = setTimeout( resizeAndScroll, 500 );
			} );
		$sidebar.on( 'click keydown', 'button', resizeAndScroll );

		resizeAndScroll();

		for ( var i = 1; i < 6; i++ ) {
			setTimeout( resizeAndScroll, 100 * i );
		}
	} );
});


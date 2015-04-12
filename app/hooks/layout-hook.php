<?php

global $calibrefx;

$calibrefx->hooks->move( 'calibrefx_post_content', 'calibrefx_before_post_title', 'calibrefx_do_post_image' );
$calibrefx->hooks->add( 'calibrefx_before_post_title', 'min_show_adsense', 11 );

function min_show_adsense(){
	$adsense_code = calibrefx_get_option( 'adsense_before_image' );
	if( $adsense_code AND is_single( ) ){
		echo "<div class='ads-after-image'>" . cap_attr( $adsense_code ) . '</div>';
	}
}
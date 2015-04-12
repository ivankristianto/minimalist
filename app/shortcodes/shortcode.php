<?php defined('CALIBREFX_URL') OR exit();

//Sample 

/*add_shortcode( 'read_more', 'cm_readmore_button');
function cm_readmore_button($atts, $content = ''){
     extract(
        shortcode_atts(array(
                'before' => '',
                'after' => '',
                'class' => '',
                'text' => 'Read More'
        ), $atts));

    $readmore_button = '[button class="readmore"]Read More[/button]';

    return $before . '<div class="'.$class.'">' . do_shortcode( $readmore_button ) . '</div>' . $after;
}*/


#https://gist.github.com/ivankristianto/6571433
/*wp_embed_register_handler( 'gist', '#https://gist\.github\.com/(.+?)/(.+?)($|&)#i', 'wp_embed_handler_gist' );

function wp_embed_handler_gist( $matches, $attr, $url, $rawattr ) {

    $embed = sprintf(
            '<script src="https://gist.github.com/%1$s/%2$s.js"></script>',
            esc_attr($matches[1]),
            esc_attr($matches[2])
            );

    return apply_filters( 'embed_gist', $embed, $matches, $attr, $url, $rawattr );
}*/

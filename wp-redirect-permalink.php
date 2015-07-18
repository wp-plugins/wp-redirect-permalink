<?php
/*
Plugin Name: WP Permalink Redirect
Plugin URI: http://nabtron.com/wp-permalink-redirect/
Description: Redirects old /postname/post_id/ links to /postname/ only 301
Author: nabtron
Version: 1.0
Author URI: http://nabtron.com/
*/

function wp_permalink_redirect()
{
	//acquire the complete url of the current page the user is on
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	//the preg_match will check for any pages having a number after the main link except for pages/ one as it's navigation
	if (preg_match("/.+?\/page\/(*SKIP)(*F)|(.+?\/)\d+\/(.*)/i", $actual_link, $matches)) {
		$new_redirect_link = $matches[1].$matches[2];
		wp_redirect( $new_redirect_link, 301 ); exit;
	}
}
add_action( 'template_redirect', 'wp_permalink_redirect' );

?>
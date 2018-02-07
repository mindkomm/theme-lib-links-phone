<?php

add_action( 'wp_head', function() {
	/**
	 * Do not detect phone links, see http://stackoverflow.com/a/31867199/1059980
	 */
	echo '<meta name="format-detection" content="telephone=no">';
} );

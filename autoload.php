<?php

require_once 'lib/functions.php';

if ( function_exists( 'add_filter' ) ) {
	require_once 'lib/twig.php';
}

if ( function_exists( 'add_action' ) ) {
	require_once 'lib/wp-head.php';
}

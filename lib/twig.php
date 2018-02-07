<?php

use Timber\Twig_Function as Timber_Twig_Function;

/**
 * Customize Twig
 *
 * @param Twig_Environment $twig
 * @return $twig
 */
add_filter( 'timber/twig', function( \Twig_Environment $twig ) {
	/**
	 * Get phone number wrapped in proper HTML attributes.
	 *
	 * @since 1.0.0
	 *
	 * @see get_phone_link_attributes()
	 */
	$twig->addFunction( new Timber_Twig_Function( 'get_phone_link_attributes', 'get_phone_link_attributes' ) );

	/**
	 * Format phone number for screenreaders.
	 *
	 * @since 1.0.0
	 *
	 * @see phone_accessible()
	 */
	$twig->addFunction( new Timber_Twig_Function( 'phone_accessible', 'phone_accessible' ) );

	return $twig;
});

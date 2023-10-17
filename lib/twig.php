<?php

declare(strict_types=1);

/**
 * Add Twig functions.
 */

add_filter('timber/twig/functions', static function (array $functions): array {
    /**
     * Get phone number wrapped in proper HTML attributes.
     *
     * @since 1.0.0
     *
     * @see get_phone_link_attributes()
     */
    $functions['get_phone_link_attributes'] = [
        'callable' => 'get_phone_link_attributes',
    ];

    /**
     * Format phone number for screenreaders.
     *
     * @since 1.0.0
     *
     * @see phone_accessible()
     */
    $functions['phone_accessible'] = [
        'callable' => 'phone_accessible',
    ];

    return $functions;
});

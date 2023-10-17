<?php

declare(strict_types=1);

/**
 * Formats phone number for screenreaders.
 *
 * Will convert `052 203 45 00` to `0 5 2. 2 0 3. 4 5. 0 0`. This makes a phone number easier to listen to. Adds
 * spaces and periods to the phone number. The spaces tell the screen reader to read each digit individually. The
 * periods tell the screen reader to pause (like at the end of a sentence).
 *
 * Add the resulting string as an aria-label to your phone number link.
 *
 * @see   http://www.jhalabi.com/blog/accessibility-phone-number-formatting/
 * @since 1.0.0
 * @example
 * ```php
 * <?php $number = '052 203 45 00'; ?>
 *
 * <a href="tel:<?php echo $number; ?>" aria-label="<?php echo phone_accessible( $number ); ?>"><?php echo $number; ?></a>
 * ```
 *
 * ```twig
 * <a href="tel:{{ number }}" aria-label="{{ phone_accessible(number) }}">{{ number }}</a>
 * ```
 *
 * @param string $phone_number Telephone number.
 *
 * @return string Formatted telephone number for accessibility.
 */
function phone_accessible($phone_number)
{
    // Remove unwanted characters
    $phone_number = preg_replace('/[^\d\s]/', '', $phone_number);

    // Replace all whitespaces with dots
    $phone_number = preg_replace('/\s/', '.', $phone_number);

    // Place a space after each of the digits, but not the ones followed by a dot
    $phone_number = preg_replace('/\d(?!\.)|\./', '${0} ', $phone_number);

    return trim($phone_number);
}

/**
 * Gets phone number without any formatting.
 *
 * Example: From '+41 052 203 45 00' to '00410524500'
 *
 * @example
 * ```php
 * <a href="tel:<?php echo phone_raw( $phone_number ); ?>"><?php echo $phone_number; ?></a>
 * ```
 *
 * @since 1.0.0
 *
 * @param string $phone_number Telephone number.
 *
 * @return string Formatted telephone number.
 */
function phone_raw($phone_number)
{
    // Turn '+' into '00'
    $phone_number = preg_replace('/\+/', '00', $phone_number);

    // Remove all non-digits
    $phone_number = preg_replace('/\D/', '', $phone_number);

    return $phone_number;
}

/**
 * Gets phone number wrapped in proper HTML attributes.
 *
 * @since 1.0.0
 * @example
 * ```php
 * <a <?php echo get_phone_link_attributes( '+41 52 203 45 00' ); ?>>+41 52 203 45 00</a>
 * ```
 *
 * will result in
 *
 * ```html
 * <a href="tel:0041522034500" rel="nofollow">+41 52 203 45 00</a>
 * ```
 *
 * ```twig
 * <a {{ get_phone_link_attributes(phone_number) }}>{{ phone_number }}</a>
 * ```
 *
 * @param string $phone_number Telephone number.
 *
 * @return string HTML attribute string.
 */
function get_phone_link_attributes($phone_number)
{

    $phone_number = phone_raw($phone_number);

    return 'href="tel:' . $phone_number . '" rel="nofollow"';
}

# Phone Links

Collection of phone link helper functions for WordPress themes.

- Provides you with a set of functions to handle phone links.
- Automatically adds a `<meta name="format-detection" content="telephone=no">` entry to your website to disable detection of phone links from third-party scripts.

## Installation

You can install the package via Composer:

```bash
composer require mindkomm/theme-lib-links-phone
```

## Usage

When you use [Timber](https://github.com/timber/timber), you can use some of the provided functions in Twig.

**Twig**

```twig
<a {{ get_phone_link_attributes(number) }} aria-label="{{ phone_accessible(number) }}">{{ number }}</a>
```

## Functions

| Name | Summary | Type | Returns/Description |
| --- | --- | --- | --- |
| [get_phone_link_attributes](#get_phone_link_attributes) | Gets phone number wrapped in proper HTML attributes. | `string` | HTML attribute string. |
| [phone_accessible](#phone_accessible) | Formats phone number for screenreaders. | `string` | Formatted telephone number for accessibility. |
| [phone_raw](#phone_raw) | Gets phone number without any formatting. | `string` | Formatted telephone number. |

### phone\_accessible

<p class="summary">Formats phone number for screenreaders.</p>

Will convert `052 203 45 00` to `0 5 2. 2 0 3. 4 5. 0 0`. This makes a phone number easier to listen to. Adds
spaces and periods to the phone number. The spaces tell the screen reader to read each digit individually. The
periods tell the screen reader to pause (like at the end of a sentence).

Add the resulting string as an aria-label to your phone number link.

`phone_accessible( string $phone_number )`

**Returns:** `string` Formatted telephone number for accessibility.

| Name | Type | Description |
| --- | --- | --- |
| $phone_number | `string` | Telephone number. |

**PHP**

```php
<?php $number = '052 203 45 00'; ?>

<a href="tel:<?php echo $number; ?>" aria-label="<?php echo phone_accessible( $number ); ?>"><?php echo $number; ?></a>
```

**Twig**

```twig
<a href="tel:{{ number }}" aria-label="{{ phone_accessible(number) }}">{{ number }}</a>
```

---

### phone\_raw

<p class="summary">Gets phone number without any formatting.</p>

Example: From '+41 052 203 45 00' to '00410524500'

`phone_raw( string $phone_number )`

**Returns:** `string` Formatted telephone number.

| Name | Type | Description |
| --- | --- | --- |
| $phone_number | `string` | Telephone number. |

**PHP**

```php
<a href="tel:<?php echo phone_raw( $phone_number ); ?>"><?php echo $phone_number; ?></a>
```

---

### get\_phone\_link\_attributes

<p class="summary">Gets phone number wrapped in proper HTML attributes.</p>

`get_phone_link_attributes( string $phone_number )`

**Returns:** `string` HTML attribute string.

| Name | Type | Description |
| --- | --- | --- |
| $phone_number | `string` | Telephone number. |

**PHP**

```php
<a <?php echo get_phone_link_attributes( '+41 52 203 45 00' ); ?>>+41 52 203 45 00</a>
```

will result in

**HTML**

```html
<a href="tel:0041522034500" rel="nofollow">+41 52 203 45 00</a>
```

**Twig**

```twig
<a {{ get_phone_link_attributes(phone_number) }}>{{ phone_number }}</a>
```

---

## Twig functions

You need [Timber](https://github.com/timber/timber) to use these functions.

- [get_phone_link_attributes](#get_phone_link_attributes)
- [phone_accessible](#phone_accessible)

## Support

This is a library that we use at MIND to develop WordPress themes. You’re free to use it, but currently, we don’t provide any support. 

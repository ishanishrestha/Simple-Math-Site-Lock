=== Simple Math Site Lock ===
Contributors: ishanishestha
Tags: access control, content restriction, math, security
Requires at least: 6.2
Tested up to: 7.1
Stable tag: 1.8
Requires PHP: 8.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: pt-pmdi

Locks website access until visitors correctly answer a simple math question.


== Description ==

Simple Math Site Lock restricts access to the public website until visitors correctly solve a randomly generated math question.

== Demo ==

Try Simple Math Site Lock on the author's website: https://ishanishrestha.com.np

Features include:

* Random math challenges
* Administrator bypass
* WordPress admin and login page exclusions
* Nonce verification for form submissions
* Server-side challenge storage
* Temporary unlock functionality
* Separate CSS and template files

== Installation ==

1. Upload the `simple-math-site-lock` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the WordPress Plugins menu.
3. Visit the website to test the math lock.


== Frequently Asked Questions ==

= How long does the website remain unlocked? =

The website remains unlocked for 1 minute after the correct answer is submitted.

= Does the lock affect administrators? =

No. Users with the `manage_options` capability can bypass the math lock.

= Does the lock affect the WordPress dashboard? =

No. The WordPress admin area and login page are excluded from the lock.



== Changelog ==

= Version 1.8 =

* Made user-facing text translatable.
* Improved internationalization by using WordPress translation functions.

= Version 1.7 =

* Changed the unlock duration to 1 minute.
* Updated the unlock cookie configuration.

= Version 1.6 =

* Added support for a separate CSS stylesheet.
* Moved the lock page HTML into a separate template file.

= Version 1.5 =

* Added a signed cookie to remember successfully unlocked visitors.
* Added automatic redirection after a correct answer.

= Version 1.4 =

* Added server-side math answer storage using WordPress transients.
* Added unique challenge IDs for each math question.
* Removed reliance on hidden form fields for answer validation.

= Version 1.3 = 

* Added nonce protection and verification for form submissions.
* Added input sanitization for submitted form data.

= Version 1.2 = 

* Added an administrator bypass using the `manage_options` capability.
* Excluded the WordPress admin area and login page from the site lock.

= Version 1.1 = 

* Improved form handling and answer validation.
* Added incorrect-answer error messages.

= Version 1.0 = 

* Initial release.
* Added a random math challenge to restrict website access.
* Added custom lock page functionality.
* Added direct-access protection.


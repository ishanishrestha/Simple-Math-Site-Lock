=== Mathlock Guard – Protect Your Site with a Math CAPTCHA ===
Contributors: ishanishr
Tags: captcha, bot protection, spam prevention, access control, math captcha
Requires at least: 6.2
Tested up to: 7.1
Stable tag: 1.8
Requires PHP: 8.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: mathlock-guard

Protects your site with a lightweight math CAPTCHA, requiring visitors to solve a simple question before accessing your content.

== Description ==

Mathlock Guard protects your site's public-facing content behind a lightweight math verification challenge. Visitors must correctly answer a simple arithmetic question before accessing your pages, providing an accessible, low-friction alternative to traditional CAPTCHA systems. Site administrators and the login page remain fully accessible at all times, ensuring uninterrupted site management, while all other visitors, including logged-in users such as editors, authors, and subscribers, are required to pass the verification screen.

== Demo ==

Try Mathlock Guard on the author's website: https://ishanishrestha.com.np

Features include:

* Random math challenges
* Administrator bypass
* Admin dashboard and login page exclusions
* Nonce verification for form submissions
* Server-side challenge storage
* Temporary unlock functionality
* Separate CSS and template files

== Installation ==

1. Upload the `mathlock-guard` folder to the `/wp-content/plugins/` directory.
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

* Added translation support with a text domain for localization.
* Improved compatibility with WordPress localization tools.

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
* Excluded the admin dashboard and login page from the mathlock.

= Version 1.1 = 

* Improved form handling and answer validation.
* Added incorrect-answer error messages.

= Version 1.0 = 

* Initial release.
* Added a random math challenge to restrict website access.
* Added custom lock page functionality.
* Added direct-access protection.


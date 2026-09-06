# Simple Math Site Lock 🔒

A lightweight WordPress plugin that protects website access with a simple math challenge.

Visitors are asked to solve a randomly generated addition problem before they can access the website. Administrators can bypass the lock and access the WordPress dashboard normally.

## Demo 🎬 

Try the plugin on my website:

View Live Demo: https://ishanishrestha.com.np

## Features

* **Random math challenges** — Generates a new addition question for visitors.
* **Access protection** — Visitors must answer the challenge correctly before accessing the site.
* **WordPress security** — Uses WordPress nonces to help protect form submissions.
* **Server-side challenge storage** — Correct answers are stored using WordPress transients rather than being exposed in the page.
* **Administrator bypass** — Administrators with the appropriate capability can access the website without completing the challenge.
* **Custom lock page** — Includes a separate template and CSS file for the lock screen.
* **Translation-ready** — User-facing text uses WordPress internationalization functions so it can be translated into other languages.
* **Lightweight** — Built with PHP and standard WordPress functionality without requiring additional plugins or libraries.

## Requirements

* **WordPress:** 6.2 or later
* **PHP:** 8.0 or later

## Installation

### Method I: Upload the plugin

1. Download this repository as a ZIP file.
2. In your WordPress dashboard, go to **Plugins → Add New Plugin**.
3. Select **Upload Plugin**.
4. Upload the ZIP file.
5. Install and activate **Simple Math Site Lock**.

### Method II: Manual installation

1. Download or clone this repository.
2. Place the `simple-math-site-lock` folder inside `wp-content/plugins/`
3. Go to **WordPress Dashboard → Plugins**.
4. Find **Simple Math Site Lock**.
5. Click **Activate**.

Once activated, visitors to the website will be presented with the math challenge.

## Project Structure

```text
simple-math-site-lock/
│
├── simple-math-site-lock.php    # Main plugin file
├── README.md                    # GitHub documentation
├── readme.txt                   # WordPress.org plugin information
│
├── assets/
│   └── style.css                # Lock page styling
│
└── templates/
    └── lock-page.php            # Lock page template
```


## How It Works

When a visitor accesses the website, the plugin:

1. Checks whether the visitor should be exempt from the lock.
2. Generates two random numbers.
3. Creates an addition challenge.
4. Stores the correct answer temporarily on the server.
5. Displays the lock page.
6. Verifies the submitted answer.
7. Unlocks the website when the correct answer is provided.

Administrators with the required capability are allowed to bypass the lock.

## Translation

The plugin uses WordPress internationalization functions for user-facing strings which makes the interface ready for translation.

For example, strings such as:

* `Access Required`
* `Please solve the math question to continue.`
* `Enter your answer`
* `Continue`

are prepared for translation using the plugin's text domain `is-smsl`.

Additional translation files can be added in the future.

## Development

This project can be tested on a local WordPress installation using a local development environment such as XAMPP.

After making changes:

1. Update the plugin version when appropriate.
2. Test the plugin on the supported WordPress/PHP versions.
3. Test both correct and incorrect answers.
4. Check administrator access.
5. Check the lock page on different screen sizes.
6. Review the changelog before creating a release.


## License

Simple Math Site Lock is free software licensed under the **GNU General Public License v2 or later (GPLv2+)**.

See the `LICENSE` information and `readme.txt` for additional details.

## Author

**Ishani**

Developed as a WordPress plugin project.



<?php
/*
Plugin Name: Mathlock Guard
Plugin URI: https://github.com/ishanishrestha/Mathlock-Guard.git
Description: Protects your site with a lightweight math CAPTCHA, requiring visitors to solve a simple question before accessing your content.
Requires at least: 6.2
Requires PHP: 8.0
Version: 1.8
Author: Ishani
Author URI: https://ishanishrestha.com.np
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: mathlock-guard
*/

if (!defined('ABSPATH')) {
    exit;
}

// Load the CSS file
add_action('wp_enqueue_scripts', 'mlg_enqueue_styles');

function mlg_enqueue_styles() {
    wp_enqueue_style(
        'mlg-style',
        plugin_dir_url(__FILE__) . 'assets/style.css'
    );
}

add_action('template_redirect', 'mlg_show_math_lock');

function mlg_show_math_lock() {

    // Don't lock the WordPress dashboard.
    if (is_admin()) {
        return;
    }

    // Let administrators bypass the lock.
    if (current_user_can('manage_options')) {
        return;
    }

    global $pagenow;

    // Don't lock the WordPress login page.
    if ($pagenow === 'wp-login.php') {
        return;
    }

    // Check whether this browser has already solved the math question.
    if (
        isset( $_COOKIE['mlg_session_unlocked'] ) &&
        hash_equals(
            hash_hmac( 'sha256', 'unlocked', wp_salt( 'auth' ) ),
            sanitize_text_field( wp_unslash( $_COOKIE['mlg_session_unlocked'] ) )
        )
    ) {
        return;
    }

    // If the user submitted an answer, process it.
    if (isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === sanitize_text_field( wp_unslash( $_SERVER['REQUEST_METHOD'] ) ))
    {

        // Check that the nonce exists and is valid.
        if (
            ! isset( $_POST['mlg_nonce'] ) ||
            ! wp_verify_nonce(
                sanitize_text_field( wp_unslash( $_POST['mlg_nonce'] ) ),
                'mlg_math_lock'
            )
        ) {
            wp_die(
                esc_html__(
                    'Security check failed. Please refresh the page and try again.',
                    'mathlock-guard'
                )
            );
        }

        // Get the challenge ID.
        $challenge_id = isset($_POST['challenge_id'])
            ? sanitize_text_field(wp_unslash($_POST['challenge_id']))
            : '';

        // Get the answer stored on the server.
        $correct_answer = get_transient('mlg_' . $challenge_id);

        // Get the answer entered by the visitor.
        $user_answer = isset( $_POST['math_answer'] )
            ? absint( wp_unslash( $_POST['math_answer'] ) )
            : -1;

        // Check that the challenge exists and that the user's answer is correct.
        if ($correct_answer !== false && $user_answer === (int) $correct_answer) {

            // Delete the challenge because it has been used.
            delete_transient('mlg_' . $challenge_id);

            // Create an "unlocked" cookie.
            setcookie(
                'mlg_session_unlocked',
                hash_hmac('sha256', 'unlocked', wp_salt('auth')),
                time() + 60,
                COOKIEPATH,
                COOKIE_DOMAIN,
                is_ssl(),
                true
            );

            // Reload the page now that it is unlocked.
            wp_safe_redirect(home_url());
            exit;
        }

        $error_message = __('Incorrect answer. Please try again.', 'mathlock-guard');
    }

    // Create a new math question.
    $a = random_int(1, 9);
    $b = random_int(1, 9);
    $c = $a + $b;

    // Create a random ID for this particular question.
    $challenge_id = wp_generate_uuid4();

    // Store the correct answer on the server for 1 minute.
    set_transient('mlg_' . $challenge_id, $c, 1 * MINUTE_IN_SECONDS);

    status_header(200);
    nocache_headers();
    include plugin_dir_path(__FILE__) . 'templates/lock-page.php';
    exit;
}

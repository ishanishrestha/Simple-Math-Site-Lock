<?php 
defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<title><?php esc_html_e( 'Access Required', 'mathlock-guard' ); ?></title>
<?php wp_head(); ?>
</head>
<body class="mlg-lock-page">
<div class="card">
    <div class="icon">🔒</div>
    <h1><?php esc_html_e('Access Required','mathlock-guard'); ?></h1>
    <p><?php esc_html_e('Please solve the math question to continue.', 'mathlock-guard'); ?></p>
    <hr>
    <div class="question">
        <?php echo esc_html($a . '+' . $b . '=?'); ?>
    </div>
    <form method="post">
        <?php wp_nonce_field('mlg_math_lock', 'mlg_nonce'); ?>
        <input
            type="text"
            name="math_answer"
            placeholder="<?php esc_attr_e('Enter your answer', 'mathlock-guard'); ?>"
            autofocus
            autocomplete="off"
        >
        <input
            type="hidden"
            name="challenge_id"
            value="<?php echo esc_attr($challenge_id); ?>"
        >
        <button type="submit"><?php esc_html_e('Continue', 'mathlock-guard'); ?> </button>
    </form>
    <?php
    if (isset($error_message)) {
        echo '<div class="error">' . esc_html($error_message) . '</div>';
    }
    ?>
</div>
<?php wp_footer(); ?>
</body>
</html>

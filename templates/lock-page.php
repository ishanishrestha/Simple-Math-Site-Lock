<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Access Required</title>
<?php wp_head(); ?>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
</head>
<body class="smsl-lock-page">
<div class="card">
    <div class="icon">🔒</div>
    <h1><?php esc_html_e('Access Required','simple-math-site-lock'); ?></h1>
    <p><?php esc_html_e('Please solve the math question to continue.', 'simple-math-site-lock'); ?></p>
    <hr>
    <div class="question">
        <?php echo esc_html($a . '+' . $b . '=?'); ?>
    </div>
    <form method="post">
        <?php wp_nonce_field('smsl_math_lock', 'smsl_nonce'); ?>
        <input
            type="text"
            name="math_answer"
            placeholder="<?php esc_attr_e('Enter your answer', 'simple-math-site-lock'); ?>"
            autofocus
            autocomplete="off"
        >
        <input
            type="hidden"
            name="challenge_id"
            value="<?php echo esc_attr($challenge_id); ?>"
        >
        <button type="submit"><?php esc_html_e('Continue', 'simple-math-site-lock'); ?> </button>
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

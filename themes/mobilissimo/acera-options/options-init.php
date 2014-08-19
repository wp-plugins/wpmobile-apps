<?php

if (is_admin()) {
    // Theme options
    include_once 'options/acera_options.php';
    include_once 'admin-helper.php';
    include_once 'ajax-image.php';
    include_once 'generate-options.php';
    new acera_theme_options_now($options);

    add_action('admin_head', 'acera_admin_head');
}
?>

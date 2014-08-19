<?php
if (!function_exists('acera_admin_head')) {

    function acera_admin_head() {
        ?>
         <link rel="stylesheet" href="<?php echo WPMOB_THEME_URL."/acera-options/"; ?>fonts/Rokkitt.css" />

        <link rel="stylesheet" href="<?php echo WPMOB_THEME_URL."/acera-options/"; ?>css/acera_css.css" />
        <link rel="stylesheet" href="<?php echo WPMOB_THEME_URL."/acera-options/"; ?>css/colorpicker.css" />
        <link rel="stylesheet" href="<?php echo WPMOB_THEME_URL."/acera-options/"; ?>css/custom_style.css" />

        <script type="text/javascript" src="<?php echo WPMOB_THEME_URL."/acera-options/"; ?>js/colorpicker.js"></script>
        <script type="text/javascript" src="<?php echo WPMOB_THEME_URL."/acera-options/"; ?>js/ajaxupload.js"></script>
        <script type="text/javascript" src="<?php echo WPMOB_THEME_URL."/acera-options/"; ?>js/mainJs.js"></script>
        <?php
    }

}
?>
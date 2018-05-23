<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

wp_deregister_style('w3css_v3');
wp_deregister_style('w3css_v4');
wp_deregister_style('w3css_mobile');
wp_deregister_style('w3css_pro');

unregister_setting('w3cssoption-group', 'css_framework');

?>
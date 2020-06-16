<?php

/**
 * Plugin Name: Custom Oxygen Elements
 */


/* load_plugin_last */
add_action('plugins_loaded', function () {
    /* check if Oxygen is active */
    if (!class_exists('OxyEl')) {
        return;
    }
    /* include our plugin main file */
    require_once __DIR__ . '/load-plugin.php';
});
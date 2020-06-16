<?php

/* main class for this plugin */
include_once 'CM_OXY_INTEGRATION.php';

global $cm_oxy_integration;
$cm_oxy_integration = new CM_OXY_INTEGRATION();

/* Our Base Oxygen Element to extend upon */
include_once 'CUSTOM_OXY_BASE_ELEMENT.php';

/* Include all of our Oxygen Elements dynamically */
$elements_filenames = glob(plugin_dir_path(__FILE__)."elements/*.php");
foreach ($elements_filenames as $filename) {
    include_once $filename;
}
<?php

if (!defined('ABSPATH')) exit;

/**
 * License manager module
 */
function bpg_updater_utility() {
    $prefix = 'BPG_';
    $settings = [
        'prefix' => $prefix,
        'get_base' =>BPG_PLUGIN_BASENAME,
        'get_slug' =>BPG_PLUGIN_DIR,
        'get_version' =>BPG_BUILD,
        'get_api' => 'https://dev.geekcodelab.com/gcl-free-plugins/',
        'license_update_class' => $prefix . 'Update_Checker'
    ];

    return $settings;
}

function bpg_updater_activate() {
    // Refresh transients
    delete_site_transient('update_plugins');
    delete_transient('bpg_plugin_updates');
    delete_transient('bpg_plugin_auto_updates');
}
require_once(BPG_PLUGIN_DIR_PATH . 'updater/class-update-checker.php');

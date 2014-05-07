<?php
/*
Plugin Name: sample-woocommerce-requirements-plugin
Description: A sample plugin to demo woocommerce requirements
Version: 0.1.0
Author: Darshan Sawardekar
Author URI: http://pressing-matters.io/
License: GPLv2
*/

require_once(__DIR__ . '/lib/WooPlugin/Requirements.php');
require_once(__DIR__ . '/lib/WooPlugin/WooRequirements.php');

use WooPlugin\WooRequirements;
use WooPlugin\FauxPlugin;
use WooPlugin\Plugin;

function sample_requirements_plugin_main() {
  $requirements = new WooRequirements();

  if ($requirements->satisfied()) {
    require_once(__DIR__ . '/lib/WooPlugin/Plugin.php');

    $plugin = new Plugin();
    $plugin->enable();
  } else {
    $plugin = new FauxPlugin('Sample WooCommerce Requirements Plugin', $requirements->getResults());
    $plugin->activate(__FILE__);
  }
}

sample_requirements_plugin_main();

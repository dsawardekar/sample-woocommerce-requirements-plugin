<?php

namespace WooPlugin;

require_once(__DIR__ . '/Requirements.php');

class WooRequirements extends Requirements {

  function getRequirements() {
    $requirements = parent::getRequirements();
    array_push($requirements, new WooRequirement());

    return $requirements;
  }

}

class WooRequirement {

  function check() {
    return is_plugin_active('woocommerce/woocommerce.php');
  }

  function message() {
    return 'WooCommerce Required';
  }

}

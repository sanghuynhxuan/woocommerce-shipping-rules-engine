<?php
if (! defined('WP_UNINSTALL_PLUGIN')) { exit; }
delete_option('woocommerce_shipping_rules_engine_enabled');

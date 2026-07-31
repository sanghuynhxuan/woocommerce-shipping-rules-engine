<?php
/**
 * Plugin Name: WooCommerce Shipping Rules Engine
 * Description: Flexible WooCommerce shipping-rule patterns for real-world fulfillment requirements.
 * Version: 0.1.0
 * Author: Sang Huynh Xuan
 * License: GPL-2.0-or-later
 */

declare(strict_types=1);

namespace SangPortfolio;

if (! defined('ABSPATH')) {
    exit;
}

final class WoocommerceShippingRulesEnginePlugin {
    public function __construct() {
        add_action('init', [$this, 'bootstrap']);
    }

    public function bootstrap(): void {
        do_action('sang_portfolio_woocommerce_shipping_rules_engine_ready');
    }
}

new WoocommerceShippingRulesEnginePlugin();

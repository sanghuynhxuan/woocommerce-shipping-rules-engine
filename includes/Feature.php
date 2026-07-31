<?php
declare(strict_types=1);
namespace SangPortfolio;
if (! defined('ABSPATH')) { exit; }
final class WoocommerceShippingRulesEngineFeature {
    private const OPTION = 'woocommerce_shipping_rules_engine_enabled';
    private const SLUG = 'woocommerce-shipping-rules-engine';
    private const TITLE = 'WooCommerce Shipping Rules Engine';
    public function register(): void {
        add_action('admin_init', [$this, 'registerSettings']);
        add_action('admin_menu', [$this, 'registerPage']);
        if (Support::enabled(self::OPTION)) { $this->registerFeature(); }
    }
    public function registerSettings(): void { register_setting(self::SLUG, self::OPTION, ['sanitize_callback' => static fn($value): string => empty($value) ? '0' : '1']); }
    public function registerPage(): void { add_options_page(self::TITLE, self::TITLE, 'manage_options', self::SLUG, [$this, 'renderPage']); }
    public function renderPage(): void { if (! current_user_can('manage_options')) { return; } echo '<div class="wrap"><h1>' . esc_html(self::TITLE) . '</h1><form method="post" action="options.php">'; settings_fields(self::SLUG); echo '<label><input type="checkbox" name="' . esc_attr(self::OPTION) . '" value="1" ' . checked(Support::enabled(self::OPTION), true, false) . '> ' . esc_html__('Enable feature', 'sang-portfolio') . '</label>'; submit_button(); echo '</form></div>'; }
    private function registerFeature(): void { add_filter('woocommerce_package_rates', [$this, 'applyThresholdRule'], 10, 2); }
    public function applyThresholdRule(array $rates, array $package): array { $subtotal = isset($package['contents_cost']) ? (float) $package['contents_cost'] : 0.0; if ($subtotal >= 100) { foreach ($rates as $rate_id => $rate) { if ('flat_rate' === $rate->method_id) { $rates[$rate_id]->cost = 0; $rates[$rate_id]->label = __('Free shipping for qualifying cart', 'sang-portfolio'); } } } return $rates; }
}

# WooCommerce Shipping Rules Engine

A package-rate rule that applies free shipping to qualifying cart totals.

## Functional scope

- Runs as a standalone WordPress plugin
- Uses a plugin-specific PHP namespace to avoid class collisions
- Includes an admin settings screen and an enable/disable option
- Implements real WordPress or WooCommerce hooks for the stated workflow
- Cleans up its option on uninstall

## Installation

Copy this repository into `wp-content/plugins/woocommerce-shipping-rules-engine`, activate it, then open **Settings → WooCommerce Shipping Rules Engine**.

## Production note

This is a working reference implementation intended for discovery and adaptation to a client’s requirements. Test on staging before deployment.

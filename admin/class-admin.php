<?php
/**
 * Admin Class
 *
 * @package Genix_Profit_Margin_Calculator
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class Genix_PMC_Admin {

    /**
     * Instance of this class
     */
    private static $instance = null;

    /**
     * Get instance
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor
     */
    private function __construct() {
        // Add admin menu
        add_action('admin_menu', array($this, 'add_admin_menu'));

        // Add settings link on plugin page
        add_filter('plugin_action_links_' . GENIX_PMC_PLUGIN_BASENAME, array($this, 'add_settings_link'));

        // Enqueue admin assets
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));
    }

    /**
     * Add admin menu
     */
    public function add_admin_menu() {
        add_menu_page(
            __('Profit Calculator', 'genix-pmc'),
            __('Profit Calculator', 'genix-pmc'),
            'manage_options',
            'genix-profit-calculator',
            array($this, 'render_docs_page'),
            'dashicons-calculator',
            80
        );

        add_submenu_page(
            'genix-profit-calculator',
            __('Documentation', 'genix-pmc'),
            __('Documentation', 'genix-pmc'),
            'manage_options',
            'genix-profit-calculator',
            array($this, 'render_docs_page')
        );
    }

    /**
     * Add settings link to plugin page
     */
    public function add_settings_link($links) {
        $settings_link = '<a href="' . admin_url('admin.php?page=genix-profit-calculator') . '">' . __('Documentation', 'genix-pmc') . '</a>';
        array_unshift($links, $settings_link);
        return $links;
    }

    /**
     * Enqueue admin assets
     */
    public function enqueue_admin_assets($hook) {
        // Only load on our admin page
        if ('toplevel_page_genix-profit-calculator' !== $hook) {
            return;
        }

        // Admin styles are inline in the documentation page
    }

    /**
     * Render documentation page
     */
    public function render_docs_page() {
        require_once GENIX_PMC_PLUGIN_DIR . 'admin/views/documentation.php';
    }
}

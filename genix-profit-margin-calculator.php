<?php
/**
 * Plugin Name: Genix Profit Margin Calculator
 * Plugin URI: https://genix.com/profit-margin-calculator
 * Description: A powerful profit margin calculator shortcode that helps calculate sale prices, profit margins, and business metrics instantly. Client-side calculations with beautiful UI.
 * Version: 1.0.0
 * Author: Genix Team
 * Author URI: https://genix.com
 * Text Domain: genix-pmc
 * Domain Path: /languages
 * Requires at least: 5.0
 * Requires PHP: 7.2
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('GENIX_PMC_VERSION', '1.0.0');
define('GENIX_PMC_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('GENIX_PMC_PLUGIN_URL', plugin_dir_url(__FILE__));
define('GENIX_PMC_PLUGIN_FILE', __FILE__);
define('GENIX_PMC_PLUGIN_BASENAME', plugin_basename(__FILE__));

/**
 * Main Plugin Class
 */
class Genix_Profit_Margin_Calculator {

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
        // Load plugin files
        $this->load_dependencies();

        // Initialize plugin
        add_action('plugins_loaded', array($this, 'init'));

        // Register activation/deactivation hooks
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
    }

    /**
     * Load required files
     */
    private function load_dependencies() {
        // Load shortcode handler
        require_once GENIX_PMC_PLUGIN_DIR . 'includes/class-shortcode.php';

        // Load admin class if in admin
        if (is_admin()) {
            require_once GENIX_PMC_PLUGIN_DIR . 'admin/class-admin.php';
        }
    }

    /**
     * Initialize plugin
     */
    public function init() {
        // Load text domain for translations
        load_plugin_textdomain('genix-pmc', false, dirname(GENIX_PMC_PLUGIN_BASENAME) . '/languages');

        // Enqueue assets
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));

        // Initialize shortcode
        Genix_PMC_Shortcode::get_instance();

        // Initialize admin if in admin area
        if (is_admin()) {
            Genix_PMC_Admin::get_instance();
        }
    }

    /**
     * Enqueue CSS and JavaScript
     */
    public function enqueue_assets() {
        // Enqueue CSS
        wp_enqueue_style(
            'genix-pmc-calculator',
            GENIX_PMC_PLUGIN_URL . 'assets/css/profit-calculator.css',
            array(),
            GENIX_PMC_VERSION,
            'all'
        );

        // Enqueue JavaScript
        wp_enqueue_script(
            'genix-pmc-calculator',
            GENIX_PMC_PLUGIN_URL . 'assets/js/profit-calculator.js',
            array('jquery'),
            GENIX_PMC_VERSION,
            true
        );
    }

    /**
     * Plugin activation
     */
    public function activate() {
        // Flush rewrite rules
        flush_rewrite_rules();

        // Set default options
        $defaults = array(
            'version' => GENIX_PMC_VERSION,
            'installed_date' => current_time('mysql')
        );
        add_option('genix_pmc_options', $defaults);
    }

    /**
     * Plugin deactivation
     */
    public function deactivate() {
        // Flush rewrite rules
        flush_rewrite_rules();
    }
}

/**
 * Initialize the plugin
 */
function genix_pmc_init() {
    return Genix_Profit_Margin_Calculator::get_instance();
}

// Start the plugin
genix_pmc_init();

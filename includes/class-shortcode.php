<?php
/**
 * Shortcode Handler Class
 *
 * @package Genix_Profit_Margin_Calculator
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class Genix_PMC_Shortcode {

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
        // Register shortcode
        add_shortcode('profit_calculator', array($this, 'render_calculator'));
        add_shortcode('genix_profit_calculator', array($this, 'render_calculator'));
    }

    /**
     * Render calculator shortcode
     *
     * @param array $atts Shortcode attributes
     * @param string $content Shortcode content
     * @return string HTML output
     */
    public function render_calculator($atts, $content = null) {
        // Extract shortcode attributes
        $atts = shortcode_atts(array(
            'title' => __('Profit Margin Calculator', 'genix-pmc'),
            'subtitle' => __('Calculate your business profit margins', 'genix-pmc'),
            'button_text' => __('Calculate Profit', 'genix-pmc'),
            'reset_text' => __('Reset', 'genix-pmc'),
            'custom_class' => '',
        ), $atts, 'profit_calculator');

        // Enqueue assets for this specific shortcode instance
        wp_enqueue_style('genix-pmc-calculator');
        wp_enqueue_script('genix-pmc-calculator');

        // Start output buffering
        ob_start();
        ?>
        <div class="pmc-container <?php echo esc_attr($atts['custom_class']); ?>" id="pmc-container__genix-profit-margin-calculator" >
            <div class="pmc-header">
                <h2 class="pmc-title"><?php echo esc_html($atts['title']); ?></h2>
                <p class="pmc-subtitle"><?php echo esc_html($atts['subtitle']); ?></p>
            </div>

            <form class="pmc-form">
                <div class="pmc-inputs-section">
                    <div class="pmc-input-group required">
                        <label for="pmc-cost" class="pmc-label">
                            <?php _e('Cost of Item', 'genix-pmc'); ?> <span class="required-mark">*</span>
                        </label>
                        <div class="pmc-input-wrapper">
                            <span class="pmc-currency-symbol">$</span>
                            <input
                                type="number"
                                id="pmc-cost"
                                class="pmc-input"
                                placeholder="0.00"
                                step="0.01"
                                min="0"
                                required
                                data-field="cost"
                            >
                        </div>
                    </div>

                    <div class="pmc-input-group required">
                        <label for="pmc-markup" class="pmc-label">
                            <?php _e('Markup Percentage', 'genix-pmc'); ?> <span class="required-mark">*</span>
                        </label>
                        <div class="pmc-input-wrapper">
                            <input
                                type="number"
                                id="pmc-markup"
                                class="pmc-input"
                                placeholder="0"
                                step="1"
                                min="0"
                                max="1000"
                                required
                                data-field="markup"
                            >
                            <span class="pmc-percent-symbol">%</span>
                        </div>
                    </div>

                    <div class="pmc-input-group">
                        <label for="pmc-acquisition" class="pmc-label">
                            <?php _e('Customer Acquisition Cost', 'genix-pmc'); ?>
                        </label>
                        <div class="pmc-input-wrapper">
                            <span class="pmc-currency-symbol">$</span>
                            <input
                                type="number"
                                id="pmc-acquisition"
                                class="pmc-input"
                                placeholder="0.00"
                                step="0.01"
                                min="0"
                                data-field="acquisition"
                            >
                        </div>
                    </div>

                    <div class="pmc-input-group">
                        <label for="pmc-shipping" class="pmc-label">
                            <?php _e('Shipping Cost', 'genix-pmc'); ?>
                        </label>
                        <div class="pmc-input-wrapper">
                            <span class="pmc-currency-symbol">$</span>
                            <input
                                type="number"
                                id="pmc-shipping"
                                class="pmc-input"
                                placeholder="0.00"
                                step="0.01"
                                min="0"
                                data-field="shipping"
                            >
                        </div>
                    </div>
                </div>

                <div class="pmc-actions">
                    <button type="button" class="pmc-btn pmc-btn-reset">
                        <?php echo esc_html($atts['reset_text']); ?>
                    </button>
                    <button type="button" class="pmc-btn pmc-btn-calculate" disabled>
                        <?php echo esc_html($atts['button_text']); ?>
                    </button>
                </div>

                <div class="pmc-results-section">
                    <h3 class="pmc-results-title"><?php _e('Profit Margin Calculator Results', 'genix-pmc'); ?></h3>

                    <div class="pmc-results">
                        <div class="pmc-result-item">
                            <span class="pmc-result-label"><?php _e('Your Sale Price', 'genix-pmc'); ?></span>
                            <span class="pmc-result-value" data-result="sale-price">-</span>
                        </div>

                        <div class="pmc-result-item">
                            <span class="pmc-result-label"><?php _e('Your Profit', 'genix-pmc'); ?></span>
                            <span class="pmc-result-value" data-result="profit">-</span>
                        </div>

                        <div class="pmc-result-item highlight">
                            <span class="pmc-result-label"><?php _e('Gross Margin', 'genix-pmc'); ?></span>
                            <span class="pmc-result-value" data-result="gross-margin">-</span>
                        </div>

                        <div class="pmc-result-item">
                            <span class="pmc-result-label"><?php _e('Total Cost', 'genix-pmc'); ?></span>
                            <span class="pmc-result-value" data-result="total-cost">-</span>
                        </div>

                        <div class="pmc-result-item">
                            <span class="pmc-result-label"><?php _e('Net Profit', 'genix-pmc'); ?></span>
                            <span class="pmc-result-value" data-result="net-profit">-</span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
        return ob_get_clean();
    }
}

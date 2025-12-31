<?php
/**
 * Profit Margin Calculator Documentation Page
 * @package Xgenious
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<div class="wrap profit-calculator-docs">
    <h1><?php echo esc_html__('Profit Margin Calculator Documentation', 'genix-pmc'); ?></h1>

    <div class="pmc-docs-container">

        <!-- Quick Start Section -->
        <div class="pmc-docs-card">
            <h2><span class="dashicons dashicons-admin-generic"></span> Quick Start</h2>
            <p>The Profit Margin Calculator is a powerful shortcode that allows your users to calculate profit margins, sale prices, and other key business metrics instantly.</p>

            <div class="pmc-docs-example">
                <h3>Basic Usage</h3>
                <p>Simply add this shortcode to any page, post, or widget:</p>
                <div class="pmc-code-block">
                    <code>[profit_calculator]</code>
                    <button class="pmc-copy-btn" onclick="pmcCopyCode(this)" data-code="[profit_calculator]">
                        <span class="dashicons dashicons-clipboard"></span> Copy
                    </button>
                </div>
            </div>
        </div>

        <!-- Shortcode Parameters Section -->
        <div class="pmc-docs-card">
            <h2><span class="dashicons dashicons-admin-settings"></span> Shortcode Parameters</h2>
            <p>Customize the calculator appearance and text with these optional parameters:</p>

            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th style="width: 20%;">Parameter</th>
                        <th style="width: 15%;">Type</th>
                        <th style="width: 30%;">Default Value</th>
                        <th style="width: 35%;">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>title</code></td>
                        <td>String</td>
                        <td>"Profit Margin Calculator"</td>
                        <td>Main heading of the calculator</td>
                    </tr>
                    <tr>
                        <td><code>subtitle</code></td>
                        <td>String</td>
                        <td>"Calculate your business profit margins"</td>
                        <td>Subtitle/description text</td>
                    </tr>
                    <tr>
                        <td><code>button_text</code></td>
                        <td>String</td>
                        <td>"Calculate Profit"</td>
                        <td>Text for the calculate button</td>
                    </tr>
                    <tr>
                        <td><code>reset_text</code></td>
                        <td>String</td>
                        <td>"Reset"</td>
                        <td>Text for the reset button</td>
                    </tr>
                    <tr>
                        <td><code>custom_class</code></td>
                        <td>String</td>
                        <td>Empty</td>
                        <td>Add custom CSS class for styling</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Usage Examples Section -->
        <div class="pmc-docs-card">
            <h2><span class="dashicons dashicons-edit"></span> Usage Examples</h2>

            <div class="pmc-docs-example">
                <h3>Example 1: Basic Calculator</h3>
                <div class="pmc-code-block">
                    <code>[profit_calculator]</code>
                    <button class="pmc-copy-btn" onclick="pmcCopyCode(this)" data-code="[profit_calculator]">
                        <span class="dashicons dashicons-clipboard"></span> Copy
                    </button>
                </div>
                <p class="description">Uses all default settings.</p>
            </div>

            <div class="pmc-docs-example">
                <h3>Example 2: Custom Title & Subtitle</h3>
                <div class="pmc-code-block">
                    <code>[profit_calculator title="Calculate Your Margins" subtitle="Get instant profit insights for your business"]</code>
                    <button class="pmc-copy-btn" onclick="pmcCopyCode(this)" data-code='[profit_calculator title="Calculate Your Margins" subtitle="Get instant profit insights for your business"]'>
                        <span class="dashicons dashicons-clipboard"></span> Copy
                    </button>
                </div>
                <p class="description">Customizes the heading and description text.</p>
            </div>

            <div class="pmc-docs-example">
                <h3>Example 3: Custom Button Text</h3>
                <div class="pmc-code-block">
                    <code>[profit_calculator button_text="Get Results" reset_text="Clear All"]</code>
                    <button class="pmc-copy-btn" onclick="pmcCopyCode(this)" data-code='[profit_calculator button_text="Get Results" reset_text="Clear All"]'>
                        <span class="dashicons dashicons-clipboard"></span> Copy
                    </button>
                </div>
                <p class="description">Changes the button labels.</p>
            </div>

            <div class="pmc-docs-example">
                <h3>Example 4: With Custom CSS Class</h3>
                <div class="pmc-code-block">
                    <code>[profit_calculator custom_class="my-custom-calculator"]</code>
                    <button class="pmc-copy-btn" onclick="pmcCopyCode(this)" data-code='[profit_calculator custom_class="my-custom-calculator"]'>
                        <span class="dashicons dashicons-clipboard"></span> Copy
                    </button>
                </div>
                <p class="description">Adds a custom CSS class for advanced styling.</p>
            </div>

            <div class="pmc-docs-example">
                <h3>Example 5: Complete Customization</h3>
                <div class="pmc-code-block">
                    <code>[profit_calculator title="Business Profit Calculator" subtitle="Calculate margins, costs, and profits instantly" button_text="Calculate Now" reset_text="Start Over" custom_class="premium-calculator"]</code>
                    <button class="pmc-copy-btn" onclick="pmcCopyCode(this)" data-code='[profit_calculator title="Business Profit Calculator" subtitle="Calculate margins, costs, and profits instantly" button_text="Calculate Now" reset_text="Start Over" custom_class="premium-calculator"]'>
                        <span class="dashicons dashicons-clipboard"></span> Copy
                    </button>
                </div>
                <p class="description">Uses all available parameters for complete customization.</p>
            </div>
        </div>

        <!-- Calculator Features Section -->
        <div class="pmc-docs-card">
            <h2><span class="dashicons dashicons-calculator"></span> Calculator Features</h2>

            <div class="pmc-features-grid">
                <div class="pmc-feature">
                    <h3><span class="dashicons dashicons-yes-alt"></span> Input Fields</h3>
                    <ul>
                        <li><strong>Cost of Item</strong> (Required) - Base cost in dollars</li>
                        <li><strong>Markup Percentage</strong> (Required) - Desired markup %</li>
                        <li><strong>Customer Acquisition Cost</strong> (Optional) - Marketing costs</li>
                        <li><strong>Shipping Cost</strong> (Optional) - Delivery expenses</li>
                    </ul>
                </div>

                <div class="pmc-feature">
                    <h3><span class="dashicons dashicons-chart-bar"></span> Calculated Results</h3>
                    <ul>
                        <li><strong>Your Sale Price</strong> - Recommended selling price</li>
                        <li><strong>Your Profit</strong> - Gross profit amount</li>
                        <li><strong>Gross Margin</strong> - Profit margin percentage</li>
                        <li><strong>Total Cost</strong> - All costs combined</li>
                        <li><strong>Net Profit</strong> - Final profit after all costs</li>
                    </ul>
                </div>

                <div class="pmc-feature">
                    <h3><span class="dashicons dashicons-smartphone"></span> User Experience</h3>
                    <ul>
                        <li>✓ Real-time validation</li>
                        <li>✓ Instant calculations (no page reload)</li>
                        <li>✓ Fully responsive design</li>
                        <li>✓ Keyboard support (Enter to calculate)</li>
                        <li>✓ Currency formatting ($1,234.56)</li>
                    </ul>
                </div>

                <div class="pmc-feature">
                    <h3><span class="dashicons dashicons-performance"></span> Technical Details</h3>
                    <ul>
                        <li>✓ Pure client-side (no server calls)</li>
                        <li>✓ Lightweight & fast</li>
                        <li>✓ No database storage</li>
                        <li>✓ No conflicts (uses <code>pmc-</code> prefix)</li>
                        <li>✓ Compatible with all page builders</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Calculation Formulas Section -->
        <div class="pmc-docs-card">
            <h2><span class="dashicons dashicons-editor-code"></span> Calculation Formulas</h2>
            <p>The calculator uses these exact formulas (matching Shopify's calculator):</p>

            <div class="pmc-formula-list">
                <div class="pmc-formula">
                    <strong>Sale Price:</strong>
                    <code>Cost × (1 + Markup / 100)</code>
                </div>
                <div class="pmc-formula">
                    <strong>Gross Profit:</strong>
                    <code>Sale Price - Cost</code>
                </div>
                <div class="pmc-formula">
                    <strong>Total Cost:</strong>
                    <code>Cost + Acquisition Cost + Shipping Cost</code>
                </div>
                <div class="pmc-formula">
                    <strong>Net Profit:</strong>
                    <code>Sale Price - Total Cost</code>
                </div>
                <div class="pmc-formula">
                    <strong>Gross Margin:</strong>
                    <code>(Gross Profit / Sale Price) × 100</code>
                </div>
            </div>

            <div class="pmc-calculation-example">
                <h3>Calculation Example</h3>
                <table class="wp-list-table widefat">
                    <tr>
                        <th>Input</th>
                        <th>Value</th>
                    </tr>
                    <tr>
                        <td>Cost of Item</td>
                        <td>$100.00</td>
                    </tr>
                    <tr>
                        <td>Markup Percentage</td>
                        <td>50%</td>
                    </tr>
                    <tr>
                        <td>Acquisition Cost</td>
                        <td>$10.00</td>
                    </tr>
                    <tr>
                        <td>Shipping Cost</td>
                        <td>$5.00</td>
                    </tr>
                </table>

                <table class="wp-list-table widefat" style="margin-top: 15px;">
                    <tr>
                        <th>Result</th>
                        <th>Value</th>
                    </tr>
                    <tr>
                        <td>Sale Price</td>
                        <td>$150.00</td>
                    </tr>
                    <tr>
                        <td>Your Profit</td>
                        <td>$50.00</td>
                    </tr>
                    <tr>
                        <td>Gross Margin</td>
                        <td>33.33%</td>
                    </tr>
                    <tr>
                        <td>Total Cost</td>
                        <td>$115.00</td>
                    </tr>
                    <tr>
                        <td>Net Profit</td>
                        <td>$35.00</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Custom Styling Section -->
        <div class="pmc-docs-card">
            <h2><span class="dashicons dashicons-art"></span> Custom Styling</h2>
            <p>You can customize the calculator's appearance using CSS. All calculator elements use the <code>pmc-</code> prefix to avoid conflicts.</p>

            <h3>Common CSS Classes:</h3>
            <div class="pmc-css-reference">
                <ul>
                    <li><code>.pmc-container</code> - Main container</li>
                    <li><code>.pmc-title</code> - Main heading</li>
                    <li><code>.pmc-subtitle</code> - Subtitle text</li>
                    <li><code>.pmc-input</code> - Input fields</li>
                    <li><code>.pmc-btn-calculate</code> - Calculate button</li>
                    <li><code>.pmc-btn-reset</code> - Reset button</li>
                    <li><code>.pmc-results</code> - Results section</li>
                    <li><code>.pmc-result-value</code> - Result values</li>
                </ul>
            </div>

            <h3>Example Custom CSS:</h3>
            <div class="pmc-code-block">
                <pre><code>/* Change calculator colors */
.pmc-btn-calculate {
    background-color: #ff5722 !important;
}

/* Customize input fields */
.pmc-input {
    border-radius: 12px !important;
}

/* Style result values */
.pmc-result-value {
    color: #2196F3 !important;
    font-size: 24px !important;
}</code></pre>
            </div>
            <p class="description">Add this CSS to Appearance → Customize → Additional CSS</p>
        </div>

        <!-- Troubleshooting Section -->
        <div class="pmc-docs-card">
            <h2><span class="dashicons dashicons-sos"></span> Troubleshooting</h2>

            <div class="pmc-troubleshooting">
                <h3>Calculator not showing?</h3>
                <ul>
                    <li>✓ Make sure the plugin is activated</li>
                    <li>✓ Clear your site cache (if using a caching plugin)</li>
                    <li>✓ Check if JavaScript is enabled in your browser</li>
                    <li>✓ Verify the shortcode is spelled correctly: <code>[profit_calculator]</code></li>
                </ul>

                <h3>Styling looks broken?</h3>
                <ul>
                    <li>✓ Clear browser cache (Ctrl+Shift+R / Cmd+Shift+R)</li>
                    <li>✓ Check for CSS conflicts with your theme</li>
                    <li>✓ Try using the <code>custom_class</code> parameter for custom styling</li>
                </ul>

                <h3>Calculations not working?</h3>
                <ul>
                    <li>✓ Ensure you've entered values in both required fields</li>
                    <li>✓ Check browser console for JavaScript errors (F12)</li>
                    <li>✓ Try disabling other plugins to check for conflicts</li>
                </ul>

                <h3>Still need help?</h3>
                <p>Contact support with:</p>
                <ul>
                    <li>→ Your WordPress version</li>
                    <li>→ Active theme name</li>
                    <li>→ List of active plugins</li>
                    <li>→ Browser console errors (if any)</li>
                </ul>
            </div>
        </div>

        <!-- Version Info -->
        <div class="pmc-docs-card pmc-version-info">
            <h2><span class="dashicons dashicons-info"></span> Version Information</h2>
            <table class="wp-list-table widefat">
                <tr>
                    <th>Feature</th>
                    <td>Profit Margin Calculator</td>
                </tr>
                <tr>
                    <th>Version</th>
                    <td>1.0.0</td>
                </tr>
                <tr>
                    <th>Shortcode</th>
                    <td><code>[profit_calculator]</code></td>
                </tr>
                <tr>
                    <th>CSS Prefix</th>
                    <td><code>pmc-</code></td>
                </tr>
                <tr>
                    <th>Calculation Type</th>
                    <td>Client-side (Instant)</td>
                </tr>
                <tr>
                    <th>Compatibility</th>
                    <td>WordPress 5.0+, All major page builders</td>
                </tr>
            </table>
        </div>

    </div>
</div>

<style>
/* Documentation Page Styles */
.profit-calculator-docs {
    max-width: 1200px;
    margin: 20px 0;
}

.pmc-docs-container {
    margin-top: 20px;
}

.pmc-docs-card {
    background: #fff;
    border: 1px solid #ccd0d4;
    border-radius: 4px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.04);
}

.pmc-docs-card h2 {
    margin-top: 0;
    font-size: 20px;
    border-bottom: 1px solid #e5e5e5;
    padding-bottom: 10px;
    margin-bottom: 15px;
}

.pmc-docs-card h2 .dashicons {
    color: #2271b1;
    font-size: 20px;
    width: 20px;
    height: 20px;
}

.pmc-docs-example {
    margin: 20px 0;
    padding: 15px;
    background: #f6f7f7;
    border-left: 4px solid #2271b1;
    border-radius: 3px;
}

.pmc-docs-example h3 {
    margin-top: 0;
    font-size: 16px;
}

.pmc-code-block {
    position: relative;
    background: #1e1e1e;
    color: #d4d4d4;
    padding: 15px;
    border-radius: 4px;
    margin: 10px 0;
    overflow-x: auto;
}

.pmc-code-block code {
    background: transparent;
    color: #d4d4d4;
    font-family: 'Courier New', monospace;
    font-size: 13px;
}

.pmc-code-block pre {
    margin: 0;
    white-space: pre-wrap;
}

.pmc-copy-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #2271b1;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
    font-size: 12px;
}

.pmc-copy-btn:hover {
    background: #135e96;
}

.pmc-copy-btn .dashicons {
    font-size: 14px;
    width: 14px;
    height: 14px;
    vertical-align: middle;
}

.pmc-features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    margin-top: 15px;
}

.pmc-feature {
    background: #f6f7f7;
    padding: 15px;
    border-radius: 4px;
}

.pmc-feature h3 {
    margin-top: 0;
    font-size: 15px;
    color: #2271b1;
}

.pmc-feature h3 .dashicons {
    vertical-align: middle;
}

.pmc-feature ul {
    margin: 10px 0;
    padding-left: 20px;
}

.pmc-feature ul li {
    margin: 5px 0;
}

.pmc-formula-list {
    background: #f6f7f7;
    padding: 15px;
    border-radius: 4px;
    margin: 15px 0;
}

.pmc-formula {
    margin: 10px 0;
    padding: 10px;
    background: #fff;
    border-radius: 3px;
}

.pmc-formula code {
    background: #1e1e1e;
    color: #d4d4d4;
    padding: 3px 8px;
    border-radius: 3px;
    font-size: 13px;
    margin-left: 10px;
}

.pmc-calculation-example {
    margin-top: 20px;
    padding: 15px;
    background: #f0f6fc;
    border-radius: 4px;
}

.pmc-calculation-example h3 {
    margin-top: 0;
}

.pmc-css-reference ul {
    columns: 2;
    -webkit-columns: 2;
    -moz-columns: 2;
}

.pmc-troubleshooting h3 {
    color: #d63638;
    margin-top: 20px;
}

.pmc-troubleshooting ul {
    margin-left: 20px;
}

.pmc-version-info {
    background: #f0f6fc;
    border-color: #2271b1;
}

@media (max-width: 768px) {
    .pmc-css-reference ul {
        columns: 1;
        -webkit-columns: 1;
        -moz-columns: 1;
    }
}
</style>

<script>
function pmcCopyCode(button) {
    var code = button.getAttribute('data-code');

    // Create temporary textarea
    var textarea = document.createElement('textarea');
    textarea.value = code;
    textarea.style.position = 'fixed';
    textarea.style.opacity = '0';
    document.body.appendChild(textarea);

    // Select and copy
    textarea.select();
    document.execCommand('copy');

    // Remove textarea
    document.body.removeChild(textarea);

    // Visual feedback
    var originalText = button.innerHTML;
    button.innerHTML = '<span class="dashicons dashicons-yes"></span> Copied!';
    button.style.background = '#00a32a';

    setTimeout(function() {
        button.innerHTML = originalText;
        button.style.background = '';
    }, 2000);
}
</script>

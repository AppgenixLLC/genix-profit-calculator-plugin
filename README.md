# Genix Profit Margin Calculator

A powerful WordPress plugin that provides a beautiful, instant profit margin calculator via shortcode.

## Description

The Genix Profit Margin Calculator is a lightweight, client-side calculator that helps your users calculate:
- Sale prices based on cost and markup
- Gross and net profits
- Profit margins
- Total costs including acquisition and shipping

Perfect for e-commerce sites, business consultants, or anyone who needs to calculate profit margins quickly.

## Features

✅ **Pure Client-Side** - Instant calculations without server calls
✅ **Beautiful UI** - Responsive design matching modern web standards
✅ **No Conflicts** - Uses `pmc-` prefix to avoid CSS/JS conflicts
✅ **Fully Responsive** - Works perfectly on desktop, tablet, and mobile
✅ **Customizable** - Multiple shortcode parameters for customization
✅ **Translation Ready** - Fully internationalized with genix-pmc text domain
✅ **Lightweight** - Minimal footprint (~10KB CSS + 5KB JS)

## Installation

1. Upload the `genix-profit-margin-calculator` folder to `/wp-content/plugins/`
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use the shortcode `[profit_calculator]` in any page, post, or widget
4. Visit **Profit Calculator → Documentation** in admin for complete usage guide

## Usage

### Basic Usage
```
[profit_calculator]
```

### Custom Title & Subtitle
```
[profit_calculator title="My Calculator" subtitle="Calculate your margins"]
```

### Custom Buttons
```
[profit_calculator button_text="Get Results" reset_text="Clear All"]
```

### Complete Customization
```
[profit_calculator
    title="Business Profit Calculator"
    subtitle="Instant margin calculations"
    button_text="Calculate Now"
    reset_text="Start Over"
    custom_class="my-style"
]
```

## Shortcode Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `title` | string | "Profit Margin Calculator" | Main heading |
| `subtitle` | string | "Calculate your business profit margins" | Subtitle text |
| `button_text` | string | "Calculate Profit" | Calculate button label |
| `reset_text` | string | "Reset" | Reset button label |
| `custom_class` | string | "" | Custom CSS class |

## Input Fields

1. **Cost of Item** (Required) - Base product cost in dollars
2. **Markup Percentage** (Required) - Desired markup percentage
3. **Customer Acquisition Cost** (Optional) - Marketing/advertising costs
4. **Shipping Cost** (Optional) - Delivery/shipping expenses

## Output Results

1. **Your Sale Price** - Recommended selling price
2. **Your Profit** - Gross profit amount
3. **Gross Margin** - Profit margin percentage (highlighted)
4. **Total Cost** - All costs combined
5. **Net Profit** - Final profit after all costs

## Calculation Formulas

```
Sale Price = Cost × (1 + Markup/100)
Gross Profit = Sale Price - Cost
Total Cost = Cost + Acquisition Cost + Shipping Cost
Net Profit = Sale Price - Total Cost
Gross Margin = (Gross Profit / Sale Price) × 100
```

## Custom Styling

All calculator elements use the `pmc-` prefix. Common classes:

- `.pmc-container` - Main container
- `.pmc-input` - Input fields
- `.pmc-btn-calculate` - Calculate button
- `.pmc-btn-reset` - Reset button
- `.pmc-results` - Results section

Example custom CSS:
```css
.pmc-btn-calculate {
    background-color: #ff5722 !important;
}

.pmc-input {
    border-radius: 12px !important;
}
```

## Requirements

- WordPress 5.0 or higher
- PHP 7.2 or higher
- jQuery (included with WordPress)

## Support

Visit **Profit Calculator → Documentation** in your WordPress admin panel for:
- Complete usage examples
- Calculation formulas
- Troubleshooting guide
- Custom styling tips

## Changelog

### 1.0.0
* Initial release
* Client-side profit margin calculator
* Responsive design
* Admin documentation page
* Full internationalization support

## License

GPL v2 or later

## Author

Genix Team

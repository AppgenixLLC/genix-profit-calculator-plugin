/**
 * Profit Margin Calculator
 * @package Xgenious
 * @since 1.0.0
 *
 * Pure client-side calculation engine
 * Matches Shopify calculator functionality
 */

;(function($){
	"use strict";

	$(document).ready(function(){

		/**
		 * Profit Margin Calculator Object
		 */
		var ProfitCalculator = {

			// Cached selectors
			$container: null,
			$form: null,
			$costInput: null,
			$markupInput: null,
			$acquisitionInput: null,
			$shippingInput: null,
			$calculateBtn: null,
			$resetBtn: null,
			$requiredInputs: null,
			$resultElements: {},

			/**
			 * Initialize calculator
			 */
			init: function() {
				// Cache selectors
				this.$container = $('.pmc-container');

				// Exit if calculator not present on page
				if (this.$container.length === 0) {
					return;
				}

				this.$form = this.$container.find('.pmc-form');
				this.$costInput = $('#pmc-cost');
				this.$markupInput = $('#pmc-markup');
				this.$acquisitionInput = $('#pmc-acquisition');
				this.$shippingInput = $('#pmc-shipping');
				this.$calculateBtn = $('.pmc-btn-calculate');
				this.$resetBtn = $('.pmc-btn-reset');
				this.$requiredInputs = $('.pmc-input[required]');

				// Cache result elements
				this.$resultElements = {
					salePrice: $('[data-result="sale-price"]'),
					profit: $('[data-result="profit"]'),
					grossMargin: $('[data-result="gross-margin"]'),
					totalCost: $('[data-result="total-cost"]'),
					netProfit: $('[data-result="net-profit"]')
				};

				// Bind events
				this.bindEvents();

				// Initial validation
				this.validateInputs();
			},

			/**
			 * Bind event handlers
			 */
			bindEvents: function() {
				var self = this;

				// Calculate button click
				this.$calculateBtn.on('click', function(e) {
					e.preventDefault();
					self.calculate();
				});

				// Reset button click
				this.$resetBtn.on('click', function(e) {
					e.preventDefault();
					self.reset();
				});

				// Input change - validate and enable/disable calculate button
				this.$requiredInputs.on('input change', function() {
					self.validateInputs();
				});

				// Allow Enter key to trigger calculation
				this.$form.find('.pmc-input').on('keypress', function(e) {
					if (e.which === 13 && !self.$calculateBtn.prop('disabled')) {
						e.preventDefault();
						self.calculate();
					}
				});
			},

			/**
			 * Validate required inputs and enable/disable calculate button
			 */
			validateInputs: function() {
				var cost = parseFloat(this.$costInput.val());
				var markup = parseFloat(this.$markupInput.val());

				// Check if required fields have valid values
				var isValid = !isNaN(cost) && cost > 0 &&
				              !isNaN(markup) && markup >= 0;

				// Enable/disable calculate button
				this.$calculateBtn.prop('disabled', !isValid);

				return isValid;
			},

			/**
			 * Perform profit margin calculations
			 */
			calculate: function() {
				// Get input values (default to 0 if empty or invalid)
				var cost = parseFloat(this.$costInput.val()) || 0;
				var markup = parseFloat(this.$markupInput.val()) || 0;
				var acquisition = parseFloat(this.$acquisitionInput.val()) || 0;
				var shipping = parseFloat(this.$shippingInput.val()) || 0;

				// Validate required fields
				if (cost <= 0 || markup < 0) {
					return;
				}

				// Perform calculations (matching Shopify formulas exactly)

				// 1. Sale Price = Cost × (1 + Markup/100)
				var salePrice = cost * (1 + markup / 100);

				// 2. Total Cost = Cost + Customer Acquisition Cost + Shipping Cost
				var totalCost = cost + acquisition + shipping;

				// 3. Gross Profit = Sale Price - Cost
				var grossProfit = salePrice - cost;

				// 4. Net Profit = Sale Price - Total Cost
				var netProfit = salePrice - totalCost;

				// 5. Gross Margin = (Gross Profit / Sale Price) × 100
				// Protect against division by zero
				var grossMargin = salePrice > 0 ? (grossProfit / salePrice) * 100 : 0;

				// Update display
				this.updateDisplay({
					salePrice: salePrice,
					profit: grossProfit,
					grossMargin: grossMargin,
					totalCost: totalCost,
					netProfit: netProfit
				});
			},

			/**
			 * Update result display
			 * @param {Object} results - Calculated results
			 */
			updateDisplay: function(results) {
				// Update sale price
				this.$resultElements.salePrice.text(this.formatCurrency(results.salePrice));

				// Update profit (gross profit)
				this.$resultElements.profit.text(this.formatCurrency(results.profit));

				// Update gross margin (percentage)
				this.$resultElements.grossMargin.text(this.formatPercentage(results.grossMargin));

				// Update total cost
				this.$resultElements.totalCost.text(this.formatCurrency(results.totalCost));

				// Update net profit (add negative class if loss)
				var $netProfit = this.$resultElements.netProfit;
				$netProfit.text(this.formatCurrency(results.netProfit));

				// Add/remove negative class for styling
				if (results.netProfit < 0) {
					$netProfit.addClass('negative');
				} else {
					$netProfit.removeClass('negative');
				}
			},

			/**
			 * Reset calculator to initial state
			 */
			reset: function() {
				// Clear all input fields
				this.$costInput.val('');
				this.$markupInput.val('');
				this.$acquisitionInput.val('');
				this.$shippingInput.val('');

				// Reset all results to "-"
				this.$resultElements.salePrice.text('-');
				this.$resultElements.profit.text('-');
				this.$resultElements.grossMargin.text('-');
				this.$resultElements.totalCost.text('-');
				this.$resultElements.netProfit.text('-').removeClass('negative');

				// Disable calculate button
				this.$calculateBtn.prop('disabled', true);

				// Focus on first input
				this.$costInput.focus();
			},

			/**
			 * Format number as currency ($1,234.56)
			 * @param {Number} value - Number to format
			 * @return {String} Formatted currency string
			 */
			formatCurrency: function(value) {
				// Ensure value is a number
				if (isNaN(value)) {
					value = 0;
				}

				// Format with 2 decimal places
				var formatted = value.toFixed(2);

				// Add thousand separators
				var parts = formatted.split('.');
				parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');

				// Return with dollar sign
				return '$' + parts.join('.');
			},

			/**
			 * Format number as percentage (25.50%)
			 * @param {Number} value - Number to format
			 * @return {String} Formatted percentage string
			 */
			formatPercentage: function(value) {
				// Ensure value is a number
				if (isNaN(value)) {
					value = 0;
				}

				// Format with 2 decimal places and add %
				return value.toFixed(2) + '%';
			}
		};

		// Initialize calculator
		ProfitCalculator.init();

	});

})(jQuery);

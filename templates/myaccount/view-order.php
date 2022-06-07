<?php

/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

defined('ABSPATH') || exit;

$notes = $order->get_customer_order_notes();
?>
<p>
	<?php
	printf(
		/* translators: 1: order number 2: order date 3: order status */
		esc_html__('Order #%1$s was placed on %2$s and is currently %3$s.', 'woocommerce'),
		'<mark class="order-number">' . $order->get_order_number() . '</mark>', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		'<mark class="order-date">' . wc_format_datetime($order->get_date_created()) . '</mark>', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		'<mark class="order-status">' . wc_get_order_status_name($order->get_status()) . '</mark>' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	);
	?>
</p>

<?php if ($notes) : ?>
	<h2><?php esc_html_e('Order updates', 'woocommerce'); ?></h2>
	<ol class="woocommerce-OrderUpdates commentlist notes">
		<?php foreach ($notes as $note) : ?>
			<li class="woocommerce-OrderUpdate comment note">
				<div class="woocommerce-OrderUpdate-inner comment_container">
					<div class="woocommerce-OrderUpdate-text comment-text">
						<p class="woocommerce-OrderUpdate-meta meta"><?php echo date_i18n(esc_html__('l jS \o\f F Y, h:ia', 'woocommerce'), strtotime($note->comment_date)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																		?></p>
						<div class="woocommerce-OrderUpdate-description description">
							<?php echo wpautop(wptexturize($note->comment_content)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
							?>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</li>
		<?php endforeach; ?>
	</ol>
<?php endif; ?>

<?php do_action('woocommerce_view_order', $order_id); ?>

Array ( [0] => WC_Meta_Data Object ( [current_data:protected] => Array ( [id] => 685 [key] => is_vat_exempt [value] => no ) [data:protected] => Array ( [id] => 685 [key] => is_vat_exempt [value] => no ) ) [1] => WC_Meta_Data Object ( [current_data:protected] => Array ( [id] => 686 [key] => _ppcp_paypal_order_id [value] => 0BJ20582GL014351R ) [data:protected] => Array ( [id] => 686 [key] => _ppcp_paypal_order_id [value] => 0BJ20582GL014351R ) ) [2] => WC_Meta_Data Object ( [current_data:protected] => Array ( [id] => 687 [key] => _ppcp_paypal_intent [value] => CAPTURE ) [data:protected] => Array ( [id] => 687 [key] => _ppcp_paypal_intent [value] => CAPTURE ) ) [3] => WC_Meta_Data Object ( [current_data:protected] => Array ( [id] => 688 [key] => _ppcp_paypal_payment_mode [value] => live ) [data:protected] => Array ( [id] => 688 [key] => _ppcp_paypal_payment_mode [value] => live ) ) [4] => WC_Meta_Data Object ( [current_data:protected] => Array ( [id] => 698 [key] => _new_order_email_sent [value] => true ) [data:protected] => Array ( [id] => 698 [key] => _new_order_email_sent [value] => true ) ) [5] => WC_Meta_Data Object ( [current_data:protected] => Array ( [id] => 699 [key] => _el_meta [value] => a:1:{s:4:"el_2";a:1:{i:0;s:35:"747D148E-AC649B89-CD56BFE8-1D5B3C0D";}} ) [data:protected] => Array ( [id] => 699 [key] => _el_meta [value] => a:1:{s:4:"el_2";a:1:{i:0;s:35:"747D148E-AC649B89-CD56BFE8-1D5B3C0D";}} ) ) [6] => WC_Meta_Data Object ( [current_data:protected] => Array ( [id] => 700 [key] => _ppcp_paypal_fees [value] => Array ( [gross_amount] => Array ( [currency_code] => GBP [value] => 1.00 ) [paypal_fee] => Array ( [currency_code] => GBP [value] => 0.33 ) [net_amount] => Array ( [currency_code] => GBP [value] => 0.67 ) ) ) [data:protected] => Array ( [id] => 700 [key] => _ppcp_paypal_fees [value] => Array ( [gross_amount] => Array ( [currency_code] => GBP [value] => 1.00 ) [paypal_fee] => Array ( [currency_code] => GBP [value] => 0.33 ) [net_amount] => Array ( [currency_code] => GBP [value] => 0.67 ) ) ) ) [7] => WC_Meta_Data Object ( [current_data:protected] => Array ( [id] => 701 [key] => PayPal Transaction Key [value] => 0.33 ) [data:protected] => Array ( [id] => 701 [key] => PayPal Transaction Key [value] => 0.33 ) ) )
<?php
/**
 * Lottery add to cart answers
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/answers.php.
 *
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product;

$use_answers        	= wc_lottery_use_answers( $product->get_id() );
$lottery_use_dropdown_answers = get_option( 'lottery_use_dropdown_answers', 'no' ); 
$answers = maybe_unserialize( get_post_meta( $product->get_id(), '_lottery_pn_answers', true ) );
$lottery_question =  get_post_meta( $product->get_id(), '_lottery_question', true );
$lottery_use_dropdown_answers = get_option( 'lottery_use_dropdown_answers', 'no' ); 

if( true === $use_answers ):

	if ( ! ( empty( $lottery_question ) || empty( $answers ) ) ) { ?>
		<!-- <h3><?php esc_html_e( 'Answer thee question:' , 'wc-lottery-pn' )?></h3> -->

	
<div class="question-container">
	<div class="q-content-container">
		<p class="lottery-question"><?php echo wp_kses_post( $lottery_question ) ?>
		<?php
		if ( is_array( $answers ) ){
			if( $lottery_use_dropdown_answers === 'yes' ) {
				echo '<select id="lottery_answer_drop" name="lottery_answer_drop">';
				echo '<option value="-1">' . esc_html__('Select answer from dropdown' , 'wc-lottery-pn' ) . '</option>';
				foreach ($answers as $key => $answer) {
					echo '<option data-answer-id='. intval( $key ) .' value="'.intval( $key ).'"" >' . wp_kses_post( $answer['text'] ) . '</option>';
				}
				echo '</select>';
				
				

			} else {
				echo '<ul class="lottery-pn-answers">';
				foreach ($answers as $key => $answer) {
					echo '<li data-answer-id='. intval( $key ) .' >' . wp_kses_post( $answer['text'] ) . '</li>';
				}
				echo '</ul>';

			}
			echo '<input type="hidden" value="" name="lottery_answer">';

		}
		
	}
?>
	</p>
		</div>
	</div>
	
	<?php if ( 'yes' === get_post_meta( $product->get_id() , '_lottery_only_true_answers', true ) ) {

		$true_answers = wc_lottery_pn_get_true_answers( $product->get_id() );
		if( is_array($true_answers) ) {
			$true_answers_value = implode(",", array_keys($true_answers));
		}
		echo '<input type="hidden" value="' . esc_attr( $true_answers_value ) . '" name="lottery_true_answers">';

	}

endif;

<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wagband_2020
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>


<aside id="secondary" class="widget-area mt-4">
	<div class="row">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="wilquote p-4">
				<h3 class="mb-3">About The Wag</h3>
				<p>
					Got songs? Got harmonies? Got fun and unbridled enthusiasm? Then you’ve got The Wag! Hailing from the Bayshore area of New Jersey, this 4-piece unit has been entertaining and moving audiences for 20 years but still sounds as fresh as it did on day one! With 4 alternating lead vocalists, catchy melodies, and sophisticated harmonies, they will take you on a journey of pop rock delight!</p>

				<p class="pt-2">&ldquo;If the Beatles and the Cowsills got it on backstage at Ed Sullivan, The Wag would totally be their love child.&rdquo;
					<i>-Wil Wheaton (Actor, Author)</i></p>
			</div>
		</div>
	</div> <!-- /row -->
</aside><!-- #secondary -->
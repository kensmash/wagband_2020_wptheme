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
			<div class="content wilquote p-4">
				<p class="pt-2">&ldquo;If the Beatles and the Cowsills got it on backstage at Ed Sullivan, The Wag would totally be their love child.&rdquo;
					<i>-Wil Wheaton (Actor, Author)</i></p>
			</div> <!-- /content -->
		</div> <!-- /col-md-12 -->
	</div> <!-- /row -->
</aside><!-- #secondary -->
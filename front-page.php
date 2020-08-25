<?php
/**
 * The front page template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wagband_2020
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'frontpage' );

		endwhile; // End of the loop.
		?>

</main>

<?php
get_sidebar();
get_footer();
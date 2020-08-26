<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wagband_2020
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
	<header>
		<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
	</header>
	<?php
			endif;

			$page = get_query_var('paged'); // get which page number we are on
			$counter = 0;


			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				$counter++; // add +1 to count for each post
				
				if ($counter === 1 AND $paged <= 1) { 
					get_template_part( 'template-parts/content' , get_post_type() ); 
				} else { 
					get_template_part( 'template-parts/content-excerpt' ); 
				}

				echo '<hr>';

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
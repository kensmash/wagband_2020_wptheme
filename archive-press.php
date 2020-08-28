<?php
/**
 * The template for displaying video archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wagband_2020
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if ( have_posts() ) : ?>

    <header class="page-header">
        <?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
    </header><!-- .page-header -->

    <?php

    $page = get_query_var('paged'); // get which page number we are on
    $counter = 0;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				$counter++; // add +1 to count for each post
				
				if ($counter === 1 AND $paged <= 1) { 
					echo "<div class='clearfix'>";
					get_template_part( 'template-parts/content' , get_post_type() ); 
					echo "</div>";
					echo "<hr/>";
				} else { 
					get_template_part( 'template-parts/content-excerpt' ); 
				}


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
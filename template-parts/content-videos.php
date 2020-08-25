<?php
/**
 * Template part for displaying videos content in archive.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wagband_2020
 */

?>

<?php if ( is_singular() ) : 
        the_title( '<h1 class="entry-title">', '</h1>' );
		the_content();
else : 
    
    the_title( '<h1 class="entry-title">', '</h1>' );
		
endif; ?>
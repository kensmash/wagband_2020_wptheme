<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wagband_2020
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header>

    <div class="entry-content">
        <?php // https://theeventscalendar.com/knowledgebase/k/using-tribe_get_events/
        global $post;
        
        $events = tribe_get_events( [ 'start_date' => 'now', 'posts_per_page' => 1 ] );
        
        foreach ( $events as $post ) {
        setup_postdata( $post );
        
        echo '<h4>' . $post->post_title . '</h4>';
        echo ' ' . tribe_get_start_date( $post ) . ' ';
       
          
       
  
        } ?>

    </div>

</article>
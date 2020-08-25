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
        <h2 class="entry-title">The Wag&rsquo;s Next Show!</h2>
    </header>
    <div class="entry-content">
        <?php // https://theeventscalendar.com/knowledgebase/k/using-tribe_get_events/
        global $post;
        
        $events = tribe_get_events( [ 'start_date' => 'now', 'posts_per_page' => 1 ] );
        
        foreach ( $events as $post ):
        setup_postdata( $post ); ?>

        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

        <hr />

        <?php 

echo tribe_event_featured_image( $post->ID, 'full' );
        
        echo ' ' . tribe_get_start_date( $post ) . ' ';

        

        echo tribe_get_venue( $post );
        echo tribe_get_address( $post );
        echo tribe_get_city( $post );

        the_content();
        endforeach; 

        wp_reset_postdata(); 
    ?>

    </div>

</article>
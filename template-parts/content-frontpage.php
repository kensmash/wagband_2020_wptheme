<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wagband_2020
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("mb-0"); ?>>
    <header class="entry-header">
        <h2 class="entry-title">The Wag&rsquo;s Next Show!</h2>
    </header>
    <hr />
    <div class="entry-content">
        <?php // https://theeventscalendar.com/knowledgebase/k/using-tribe_get_events/
        global $post;
        
        $events = tribe_get_events( [ 'start_date' => 'now', 'posts_per_page' => 1 ] );
        
        foreach ( $events as $post ):
        setup_postdata( $post ); ?>

        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

        <div class="home-event-meta mb-4 text-secondary">
            <p><?php echo tribe_get_start_date( $post ) . ' - ' . tribe_get_end_time( $post ) ?></p>
            <p><?php echo tribe_get_venue( $post ) ?></p>
            <p><?php echo tribe_get_address( $post ) ?></p>
            <p><?php echo tribe_get_city( $post ) . ' ' . tribe_get_state( $post )?></p>
        </div>

        <?php the_content();

         echo tribe_event_featured_image( $post->ID, 'full mx-auto d-block my-5 rounded' ); ?>

        <p class="font-weight-bold mb-1"><a href="<?php the_permalink(); ?>">See full show info</a></p>

        <?php endforeach; 

        wp_reset_postdata(); 
    ?>

    </div>

</article>
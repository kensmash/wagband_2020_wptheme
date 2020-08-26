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

    <div class="entry-content">
        <?php // https://theeventscalendar.com/knowledgebase/k/using-tribe_get_events/
        global $post;
        
        $events = tribe_get_events( [ 'start_date' => 'now', 'posts_per_page' => 1 ] );
        
        foreach ( $events as $post ):
        setup_postdata( $post ); ?>

        <?php echo do_shortcode("
            [tribe_event_inline id='$post->ID']
            {title:linked}
          
            Date: {start_date}
            Time: {start_time} – {end_date} @ {end_time}

            {content}
            {thumbnail}
            
            [/tribe_event_inline]
            "); 
        ?>

        <?php endforeach; 

        wp_reset_postdata(); 
    ?>

    </div>

</article>
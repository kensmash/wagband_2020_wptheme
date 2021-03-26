<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wagband_2020
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("row mb-4"); ?>>
    <div class="col-md-8 pr-md-4">
        <header class="entry-header mt-n1">
            <h2 class="entry-title">Latest News</h2>
        </header>

        <div class="entry-content">
            <?php 
                // the query
                $the_query = new WP_Query( array(
                    'posts_per_page' => 1,
                )); 
            ?>

            <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <h2 class="mb-4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <?php the_content(); ?>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

            <?php else : ?>
            <p><?php __('No News'); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-md-4 pt-4 pt-md-0 pl-md-4 homepage-nextshow">

        <header class="entry-header mt-n1">
            <h2 class="entry-title">Upcoming Event</h2>
        </header>

        <div class="entry-content">

            <?php // https://theeventscalendar.com/knowledgebase/k/using-tribe_get_events/
        global $post;
        
        $events = tribe_get_events( [ 'start_date' => 'now', 'posts_per_page' => 1 ] );
        
        foreach ( $events as $post ):
        setup_postdata( $post ); ?>
            <?php echo tribe_event_featured_image( $post->ID, 'full mx-auto d-block my-3 rounded' ); ?>

            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <div class="home-event-meta mb-4 text-secondary">

                <?php
                //Test if event categories contains virtual          
                $categories = tribe_get_text_categories(); 
                $word = "Virtual";
                if(strpos($categories, $word) !== false){
                    echo "Virtual Event";
                } else { ?>
                <p><?php echo tribe_get_venue( $post ) ?></p>
                <p><?php echo tribe_get_address( $post ) ?></p>
                <p><?php echo tribe_get_city( $post ) . ' ' . tribe_get_state( $post )?></p>
                <?php } ?>
                <p><?php echo tribe_get_start_date( $post ) . ' - ' . tribe_get_end_time( $post ) ?></p>


            </div>

            <?php the_content(); 

            endforeach; 

            wp_reset_postdata(); 
        ?>
        </div>
    </div>

</article>
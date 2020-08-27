<?php
/**
 * Template part for displaying post excerpts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wagband_2020
 */

?>

<div id="post-<?php the_ID(); ?>" class="mb-3 clearfix">

    <h4><a href="<?php the_permalink();?>" rel="bookmark"><?php the_title(); ?></a></h4>
    <p class="card-text small text-black-50">
        <?php 
            wagband_2020_posted_on(); 
            wagband_2020_posted_by();
            ?>
    </p>

    <?php the_excerpt(); ?>

    <hr>

</div>
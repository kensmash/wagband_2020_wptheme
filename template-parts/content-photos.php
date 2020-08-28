<?php
/**
 * Template part for displaying photos content in archive.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wagband_2020
 */

?>

<?php if ( is_singular() ) : 
        the_title( '<h1 class="entry-title">', '</h1>' );
		the_content();
else : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class("col-xs-12 col-sm-6 col-md-3 mb-4"); ?>>

    <div class="card h-100">
        <?php if ( has_post_thumbnail() ) { // check if the post has a Featured Image assigned to it. ?>
        <?php the_post_thumbnail('photo-thumb', ['class' => 'card-img-top', 'title' => 'Feature image']); ?>
        <?php } else { ?>
        <img src="<?php bloginfo('template_directory'); ?>/images/photo-gallery-generic-thumbnail.gif" alt="Generic Photo Gallery Thumbnail" class="card-img-top">
        <?php } ?>

        <div class="card-body">
            <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        </div>
    </div>

</article>
<?php endif; ?>
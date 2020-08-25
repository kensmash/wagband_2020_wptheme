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
<article id="post-<?php the_ID(); ?>" <?php post_class("row"); ?>>
    <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="card">
            <?php if ( has_post_thumbnail() ) { // check if the post has a Featured Image assigned to it. ?>
            <?php the_post_thumbnail('photo-thumb card-img-top'); ?>
            <?php } else { ?>
            <img src="<?php bloginfo('template_directory'); ?>/images/photo-gallery-generic-thumbnail.gif" alt="Generic Photo Gallery Thumbnail" class="card-img-top">
            <?php } ?>

            <div class="card-body">
                <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            </div>
        </div>
    </div>
</article>
<?php endif; ?>
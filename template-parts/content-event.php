<?php
/**
 * Template part for displaying event content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wagband_2020
 */

?>

<?php 
$myTemplate = "";

if (isset($_GET['tribe_event_display'])) {
	$myTemplate = $_GET['tribe_event_display']; //check the URL query string
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php the_content(); ?>

	<?php if ( $myTemplate !== 'past')  { ?>
	<div class="px-2 mt-4">
		<p>To book The Wag for a gig, private party or show, please contact us. The Wag can perform both electric & acoustic cover or original music for any occasion.</p>
		<p><a href="/shows/past">View Past Shows</a>
			<p>
	</div>
	<?php } ?>

</article>
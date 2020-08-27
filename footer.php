<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wagband_2020
 */

?>


<footer>

	<div class="container">

		<div class="row">
			<div class="col-md-6">
				<?php wp_nav_menu( array( 'menu' => 'Footer Menu', 'menu_class' => 'footer-nav' ) ); ?>
			</div> <!-- /col-md-6 -->

			<div class="col-md-6">

				<ul class="footer-links">
					<li>
						<a href="https://www.facebook.com/thewagband" target="_blank" rel="noopener" alt="Facebook" title="Facebook">
							<svg class="icon">
								<use xlink:href="<?php bloginfo('template_directory'); ?>/images/footer-icons.svg#facebook" /></svg>
						</a>
					</li>
					<li>
						<a href="https://www.youtube.com/user/TheWagBand" target="_blank" rel="noopener" alt="YouTube" title="Youtube">
							<svg class="icon">
								<use xlink:href="<?php bloginfo('template_directory'); ?>/images/footer-icons.svg#youtube" /></svg>
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com/thewagband/" target="_blank" rel="noopener" alt="Instagram" title="Instagram">
							<svg class="icon">
								<use xlink:href="<?php bloginfo('template_directory'); ?>/images/footer-icons.svg#instagram" /></svg>
						</a>
					</li>
					<li>
						<a href="https://twitter.com/thewag" target="_blank" rel="noopener" alt="Twitter" title="Twitter">
							<svg class="icon">
								<use xlink:href="<?php bloginfo('template_directory'); ?>/images/footer-icons.svg#twitter" /></svg>
						</a>
					</li>
					<li>
						<a href="https://soundcloud.com/the-wag" target="_blank" rel="noopener" alt="SoundCloud" title="SoundCloud">
							<svg class="icon">
								<use xlink:href="<?php bloginfo('template_directory'); ?>/images/footer-icons.svg#soundcloud" /></svg>
						</a>
					</li>
					<li>
						<a href="http://open.spotify.com/artist/4wQcvOVeyHtP3wGrSJ1KUL" target="_blank" rel="noopener" alt="Spotify" title="Spotify">
							<svg class="icon">
								<use xlink:href="<?php bloginfo('template_directory'); ?>/images/footer-icons.svg#spotify" /></svg>
						</a>
					</li>
					<li>
						<a href="https://itunes.apple.com/us/artist/the-wag/id186833713" target="_blank" rel="noopener" alt="iTunes" title="The Wag on iTunes">
							<svg class="icon">
								<use xlink:href="<?php bloginfo('template_directory'); ?>/images/footer-icons.svg#apple" /></svg>
						</a>
					</li>
				</ul>

			</div> <!-- /col-md-6 -->
		</div> <!-- /row -->

		<div class="memoriam mt-5">
			<p>Remembering our brother, friend, and drummer of 14 years, <a href="<?php echo get_permalink(339); ?>">Brian Mowery.</a></p>
		</div>
	</div> <!-- container -->
</footer>



<?php wp_footer(); ?>

</body>

</html>
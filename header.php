<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wagband_2020
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wagband_2020' ); ?></a>

	<header id="masthead" class="site-header">
		<nav class="navbar navbar-expand-md navbar-dark py-md-0" role="navigation">
			<div class="container">
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					The Wag
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#wag-navbar-collapse-1" aria-controls="wag-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<?php
						wp_nav_menu( array(
							'theme_location'    => 'menu-1',
							'depth'             => 2,
							'container'         => 'div',
							'container_id'      => 'wag-navbar-collapse-1',
							'container_class'   => 'collapse navbar-collapse',
							'menu_class'        => 'navbar-nav ml-auto',
							'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							'walker'            => new WP_Bootstrap_Navwalker(),
						) );
					?>
			</div>
		</nav>

	</header><!-- #masthead -->


	<div class="container">
		<div id="header-image">
			<?php
				// load random photo from header-images folder
				// solution from http://zzamboni.org/new/brt/2008/11/03/how-to-display-random-header-images-in-a-wordpress-theme/index.html
				$curdir=getcwd(); chdir(get_template_directory() . "/images/header-images");
				$files=glob("*.{gif,png,jpg,gif}", GLOB_BRACE);
				chdir($curdir);
				$file=$files[array_rand($files)];
				// now extract the name of the photographer from the image file name
				$photographer = extract_unit($file, '_', '.');
				switch ($photographer) {
				case "posada":
					$photoCredit = "John Posada";
					break;
				case "crespi":
					$photoCredit = "Jeff Crespi";
					break;
				case "cullity":
					$photoCredit = "Joe Cullity";
					break;
				case "catalano":
					$photoCredit = "Mike Catalano";
					break;
				case "stanger":
					$photoCredit = "Steve Stanger";
					break;
				}
			?>

			<img src="<?php echo(get_bloginfo('template_url')."/images/header-images/$file"); ?>" alt="The Wag in Concert" />

			<div class="photo-credit">
				<p>Photo by <?php echo $photoCredit ?></p>
			</div>
		</div>
	</div> <!-- /header-image -->

	<div id="page" class="site container">
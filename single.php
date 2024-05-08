<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package PBM
 */

get_header();
?>

	<main id="primary" class="site-main">
		
		<header class="page-header">
			<h1 class="center-content"></h1>
		</header>

		<div class="content-container-wrapper"><div class="content-container">

			<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
			<div class="post-image" style="background-image: url(<?php echo $url ?>);"></div>

			<section class="center-content">

				<h1><?php the_title() ?></h1>
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</section>

		</div></div>

	</main><!-- #main -->

<?php
get_footer();

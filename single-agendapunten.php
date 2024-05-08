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

			<div class="post-image" style="background-image: url(<?php the_field('uitgelichte_afbeelding') ?>);"></div>

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

		<section>
			<div class="center-content animate">
				<h1>Andere agendapunten</h1>
			</div>

			<div class="items-wrapper animate-children">

				<?php
				$currentpostID = get_the_ID();
				$custom_query = new WP_Query(array(
					'post_type' => 'agendapunten',
					'order' => 'DESC'
				));

				if ($custom_query->have_posts()) :
					while ($custom_query->have_posts()) : $custom_query->the_post();

						if ($currentpostID != $post->ID) {
						include "parts/item-container.php" ?>

						<?php 
						}
					endwhile;	
				endif;
				wp_reset_postdata();
				?>
				
			</div>
		</section>

	</main><!-- #main -->

<?php
get_footer();

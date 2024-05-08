<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PBM
 */

get_header();
?>

	<main id="primary" class="site-main">

		<header class="page-header" style="background: url(<?php the_field('uitgelichte_afbeelding') ?>);">
			<div class="top-gradient"></div>
			<h1 class="center-content"><?php the_title(); ?></h1>
		</header>

		<div class="content-container-wrapper"><div class="content-container center-content">

			<img class="tegelhoekje th1" src="../wp-content/uploads/2020/12/Tegelrandje.png">
			<img class="tegelhoekje th2"  src="../wp-content/uploads/2020/12/Tegelrandje.png">

			<section class="">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			</section>

			<img class="tegelhoekje th3" src="../wp-content/uploads/2020/12/Tegelrandje.png">
			<img class="tegelhoekje th4"  src="../wp-content/uploads/2020/12/Tegelrandje.png">

		</div></div>

	</main><!-- #main -->

<?php
get_footer();

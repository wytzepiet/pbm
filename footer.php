<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PBM
 */

?>
	<div class="footer-spacer"></div>

	<footer id="colophon" class="site-footer">

		<section class="inline-footer">
			<div class="inline-footer-item">
				<h2>Contact</h2>
				<p>
					Plaatselijk Belang Makkum<br>
					info@pbmakkum.nl
				</p>
			</div>
			<div class="inline-footer-item">
				<h2>Verwante websites</h2>

				<?php
				$args = array( 'post_type' => 'verwante-websites', 'order'=> 'ASC');
				$postslist = get_posts( $args );
				foreach ($postslist as $post) :  setup_postdata($post); ?>

				<div class="verwante-website">
					<a href="<?php the_field('website_url') ?>"><?php the_title(); ?></a>
				</div>

				<?php endforeach; ?>
			</div>

			<div class="fb-page inline-footer-item" data-href="https://www.facebook.com/pbmakkum/?ref=ts&amp;fref=ts" data-tabs="timeline" data-width="300" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/pbmakkum/?ref=ts&amp;fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/pbmakkum/?ref=ts&amp;fref=ts">Vereniging Plaatselijk Belang Makkum</a></blockquote></div>

		</section>

		<div class="site-info">
			© 2021 Plaatselijk Belang Makkum, All Rights Reserved.<br>
			Website door <a href="http://wwstudio.nl">WWStudio</a>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- .site-nonav -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

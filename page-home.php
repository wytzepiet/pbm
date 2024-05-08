<?php

get_header();?>

	<main id="primary" class="site-main">

		<header class="page-header home-header" style="background: url(<?php the_field('uitgelichte_afbeelding') ?>);">
			<div class="top-gradient"></div>

			<div class="center-content">
				<h1><?php the_field('paginatitel'); ?></h1>
				<div class="streepje"></div>
				<p><?php the_field('ondertitel'); ?></p>
			</div>

		</header>

		 <!-- <div class="alv center-content">
			<div class="alv-datum">
				<h1>23</h1>
				<h2>april</h2>
			</div>
			<div class="alv-text">
				<h2>Jaarvergadering</h2>
				<a class="" href="https://www.pbmakkum.nl/agendapunten/uitnodiging-jaarvergadering-2">Meer informatie ></a>
			</div>
		</div>
		<style>
			.alv{
				display: flex;
				flex-wrap: wrap;
				align-items: center;
			}
			.alv-datum {
				background: #0f75bc;
				color: white;
				padding: 10px 30px;
				margin-right: 20px;
				text-align: center;
				border-radius: 3px;
			}
			.alv-datum > * {
			    margin: 0px;
			}
		</style> -->

		<section>

			<div class="center-content animate">
				<h1><?php the_field('titel_themas') ?></h1>
				<div class="streepje"></div>
				<p><?php the_field('ondertitel_themas') ?></p>
			</div>

			<div class="items-wrapper animate-children">

				<?php
				$custom_query = new WP_Query(array(
					'post_type' => 'agendapunten',
					'posts_per_page' => 4,
					'order' => 'DESC'
				));

				if ($custom_query->have_posts()) :
					while ($custom_query->have_posts()) : $custom_query->the_post(); ?>

						<?php include "parts/item-container-news.php" ?>

					<?php
					endwhile;
				endif;
				wp_reset_postdata();
				?>

			</div>

			</section>

			<section style="margin-top: 100px;">
				<div class="content-container-wrapper"><div class="content-container">

					<img class="tegelhoekje th1" src="wp-content/uploads/2020/12/Tegelrandje.png">
					<img class="tegelhoekje th2"  src="wp-content/uploads/2020/12/Tegelrandje.png">

					<section class="section-dorpsvisie center-content">
						<div style="max-width: <?php the_field('breedte_tegel') ?>px; margin: auto;"><?php the_field('tekst_op_tegel') ?></div>
					</section>

					<img class="tegelhoekje th3" src="wp-content/uploads/2020/12/Tegelrandje.png">
					<img class="tegelhoekje th4" src="wp-content/uploads/2020/12/Tegelrandje.png">

				</div></div>

			</section>

			<section>
				<div class="center-content animate">
					<h1>Bestuursleden</h1>
					<div class="streepje"></div>
					<p>Maak kennis met het team van PBM</p>
				<div style="display: flex; gap: 40px; flex-wrap: wrap; margin-top: 50px;">

					<?php
					$custom_query = new WP_Query(array(
						'post_type' => 'bestuursleden',
						'posts_per_page' => 100,
						'order' => 'DESC'
					));

					if ($custom_query->have_posts()) :
						while ($custom_query->have_posts()) : $custom_query->the_post(); ?>

						<div style=" width: 150px;">
							<?php if(get_field('uitgelichte_afbeelding') ): ?>
								<img src="<?php the_field('uitgelichte_afbeelding'); ?>" style="border-radius: 50%; width: 150px; height: 150px; object-fit: cover;">
							<?php else: ?>
								<span class="dashicons dashicons-admin-users" style="font-size: 60px; height: 60px; width: 60px; color: #0f75bc;"></span>
							<?php endif; ?>
							<p style="margin-bottom: 0px;"><?php the_field('functie'); ?></p>
							<h3 style="margin-top: 0px;"><?php echo get_the_title(); ?></h3>
						</div>

						<?php
						endwhile;
					endif;
					wp_reset_postdata();
					?>
				</div>

				</div>
			</section>


	</main><!-- #main -->

<?php
get_footer();

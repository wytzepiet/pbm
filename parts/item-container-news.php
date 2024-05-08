<a href="<?php the_permalink(); ?>"><div class="item-container">
	<div class="item-image" style="background-image: url(<?php the_field('uitgelichte_afbeelding') ?>);"></div>
	<div class="item-text">
		<div class="item-inhoud">
			<h3><?php the_title(); ?></h3>
			<!-- <p class="item-date"><?php echo get_the_date(); ?></p> -->
			<?php the_excerpt(); ?>
			<div class="item-inhoud-gradient"></div>
		</div>
		<div class="link">Lees meer ></div>
	</div>
</div></a>

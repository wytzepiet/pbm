<div class="item-container">
	<div class="item-image" style="background-image: url(<?php echo $url ?>);"></div>
	<div class="item-text">
		<div class="item-inhoud">
			<h3><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>
			<div class="item-inhoud-gradient"></div>
		</div>
		<a href="<?php the_permalink(); ?>">Lees meer ></a>
	</div>
</div>
<article class="post <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
	
	<!-- post-thumbnail -->
	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
	</div><!-- /post-thumbnail -->
	
	
	
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	
	
	

	<?php if ( is_search() OR is_archive() ) { ?>
		<p>
		<?php echo get_the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>">Read more&raquo;</a>
		</p>
	<?php } else {
		if ($post->post_excerpt) { ?>

			<p>
			<?php echo get_the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>">Read more&raquo;</a>
			</p>

		<?php } else {

			the_content();

		}
	} ?>
	
	
	
	
	
</article>
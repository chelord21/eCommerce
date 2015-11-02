<?php
/*
Template Name: About us
*/
get_header();

if (have_posts()) :
	while (have_posts()) : the_post(); ?>
	
	<article class="post clearfix">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<?php
			$args = array( 'post_type' => 'workers', 'posts_per_page' => 10 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();

			echo '<div class="workers-container">';
				echo '<div class="workers-title">';
				the_title();
				echo '</div>';

				echo '<div class="workers-image">';
				the_post_thumbnail( 'thumbnail' );
				echo '</div>';

				echo '<div class="workers-content">';
				the_content();
				echo '</div>';
			echo '</div>';
			endwhile;
		?>
		
	</article>
	
	<?php endwhile;
	
	else :
		echo '<p>No content found</p>';
	
	endif;
	
get_footer();

?>
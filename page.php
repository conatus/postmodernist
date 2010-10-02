<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
			<div class="post-header">
				<h2 class="page-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			</div>
			
			<?php the_content('Read the rest of this entry &raquo;'); ?>
			<?php wp_link_pages('before=<div class="post-page-links">Page:&after=</div>'); ?>
			<?php edit_post_link('Edit this page', '<p>', '</p>'); ?>
		</div>

		<?php endwhile; ?>
		
	<?php else : ?>
		
		<div class="post">
			<div class="post-header">
				<h2 class="page-title">Not Found</h2>
				<p>Sorry, but you are looking for something that isn't here.</p>
			</div>
		</div>
		
	<?php endif; ?>
		
	<?php comments_template(); ?>	
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>

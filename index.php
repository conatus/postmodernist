<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post-header">
				<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<p><?php the_time('F j, Y') ?></p>
			</div>
			
			<?php the_post_thumbnail(array( 150, 150 ), array( 'class' => 'alignleft' )); ?>
			<?php the_content('Read the rest of this entry &raquo;'); ?>
			<?php wp_link_pages('before=<div class="post-page-links">Page:&after=</div>'); ?>
			
			<div class="post-meta">
				<ul>
					<li><?php comments_popup_link('Leave your comment', 'One comment', '% comments'); ?></li>
					<li><?php the_tags('Tagged as: ', ', ', ''); ?></li>
					<li>Share on <a href="http://twitter.com/home?status=Currently reading: <?php the_title_attribute(); ?> <?php the_permalink(); ?>">Twitter</a>, <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title_attribute(); ?>">Facebook</a>, <a href="http://del.icio.us/post?v=4;url=<?php the_permalink(); ?>">Delicious</a>, <a href="http://digg.com/submit?url=<?php the_permalink(); ?>">Digg</a>, <a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title_attribute(); ?>">Reddit</a></li>
					<?php edit_post_link('Edit this post', '<li>', '</li>'); ?>
				</ul>
			</div>
		</div>

		<?php endwhile; ?>

		<?php if (show_posts_nav()) : ?>
		
		<div class="post-navigation">
			<ul>
				<li><?php next_posts_link('&laquo; Previous page') ?></li>
				<li><?php previous_posts_link('Next page &raquo;') ?></li>
			</ul>
		</div>
		
		<?php endif; ?>
		
	<?php else : ?>
		
		<div class="post">
			<div class="post-header">
				<h2 class="page-title">Not Found</h2>
				<p>Sorry, but you are looking for something that isn't here.</p>
			</div>
		</div>
		
	<?php endif; ?>
	</div>
	
	<hr />
		
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>

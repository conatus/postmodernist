<?php get_header(); ?>
	<?php if (have_posts()) : ?>
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		
		<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="page-title">Archive for the &ldquo;<?php single_cat_title(); ?>&rdquo; category</h2>
	 	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="page-title">Posts Tagged &ldquo;<?php single_tag_title(); ?>&rdquo;</h2>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="page-title">Blog Archives</h2>
	 	<?php } ?>
			
		<?php while (have_posts()) : the_post(); ?>
			
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post-header">
				<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<p><?php the_time('F j, Y') ?></p>
			</div>
			
			<?php the_excerpt(); ?>
			
			<div class="post-meta">
				<ul>
					<li><?php comments_popup_link('Leave your comment', 'One comment', '% comments'); ?><?php the_tags(' Tagged as: ', ', ', ''); ?></li>
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

	<h2 class="page-title">Nothing found</h2>
	<p>There are not posts belonging to this category or tag. Try searching below:</p>
	<?php get_search_form(); ?>
	
	<?php endif; ?>

	</div>
	
	<hr />
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>

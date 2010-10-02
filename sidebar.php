<div class="span-8 last" id="sidebar">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
		<div class="section span-8 last">
			<h2>About this blog</h2>
			<p><?php bloginfo('description'); ?></p>
		</div>
		
		<div class="section span-8 last">
			<h2>Search</h2>
			<?php get_search_form(); ?>
		</div>
		
		<div class="section span-8 last">
			<h2>Tags</h2>
			<?php wp_tag_cloud('smallest=1&largest=1&unit=em&format=list'); ?>
		</div>
	<?php endif; ?>
</div>

<hr />
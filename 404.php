<?php get_header(); ?>

		<h2 class="page-title">Error 404 &mdash; Not Found</h2>
		
		<p>You are trying to reach a page that doesn't exist here. Maybe I've moved out things or maybe you mistyped a link. Try searching:</p>
		<?php get_search_form(); ?>
		
		<script type="text/javascript">
			// focus on search field after it has loaded
			document.getElementById('s') && document.getElementById('s').focus();
		</script>
	</div>
	
	<hr />
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>

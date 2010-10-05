<?php
// Sets content and images width
if ( !isset($content_width) ) $content_width = 500;

// Add default posts and comments RSS feed links to head
if ( function_exists('add_theme_support') ) add_theme_support('automatic-feed-links');

// Enables the navigation menu ability
if ( function_exists('add_theme_support') ) add_theme_support('menus');

// Enables post-thumbnail support
if ( function_exists('add_theme_support') ) add_theme_support('post-thumbnails');

// Adds callback for custom TinyMCE editor stylesheets 
if ( function_exists('add_editor_style') ) add_editor_style();

// Registers a widgetized sidebar and replaces default WordPress HTML code with a better HTML
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div class="section">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

// Sets the post excerpt length to 40 characters.
function postmodernist_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'postmodernist_excerpt_length' );

// Prepares a 'continue reading' link for post excerpts
function postmodernist_continue_reading_link() {
	return '</p><p><a href="'. get_permalink() . '">' . 'Read the rest of this entry &raquo;' . '</a></p>';
}

// Replaces [...] for (...) in post excerpts and appends postmodernist_continue_reading_link()
function postmodernist_excerpt_more($more) {
	return ' (&hellip;)' . postmodernist_continue_reading_link();
}
add_filter('excerpt_more', 'postmodernist_excerpt_more');

// Returns TRUE if more than one page exists. Useful for not echoing .post-navigation HTML when there aren't posts to page
function show_posts_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}

// Removes inline CSS style for Recent Comments widget
function postmodernist_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'postmodernist_remove_recent_comments_style' );

// Custom commments HTML
function postmodernist_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
      <div class="comment-avatar">
         <?php echo get_avatar($comment,$size='54'); ?>
      </div>

 	  <div class="comment-body">
		 	<?php if ($comment->comment_approved == '0') : ?>
			<p><strong>Your comment is awaiting moderation.</strong></p>
			<?php endif; ?>
			
			<?php comment_text(); ?>
			
			<p class="comment-meta">by <?php comment_author_link(); ?> on <?php comment_date() ?> at <?php comment_time() ?>. <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?> <a href="#comment-<?php comment_ID() ?>" title="Permanent Link for this comment">#</a><?php edit_comment_link('Edit this comment', ' ', ''); ?></p>
	  </div>
<?php }

// Adds a handy 'tag-cloud' class to the Tag Cloud Widget for better styling
function postmodernist_tag_cloud($tags) {
	$tag_cloud = '<div class="tag-cloud">' . $tags . '</div>';
	return $tag_cloud;
}
add_action('wp_tag_cloud', 'postmodernist_tag_cloud');

// Footer
function postmodernist_footer() { ?>
			<p>Proudly powered by <a href="http://www.wordpress.org">WordPress</a> and <a href="http://github.com/thewarmjets/postmodernist" title="Postmodernist Theme at Github">Postmodernist</a>, an adaption of the <a href="http://www.rodrigogalindez.com/themes/modernist/">Modernist</a> theme by <a href="http://www.rodrigogalindez.com" title="Web Designer">Rodrigo Galindez</a>. <a href="<?php bloginfo('rss2_url'); ?>" title="Syndicate this site using RSS"><acronym title="Really Simple Syndication">RSS</acronym> Feed</a>.</p>
<?php } 
add_action('wp_footer', 'postmodernist_footer'); 
?>
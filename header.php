<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('-', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	
	<!-- Framework CSS -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/blueprint/screen.css" type="text/css" media="screen, projection">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/blueprint/print.css" type="text/css" media="print">
	<!--[if lt IE 8]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
	
	<!-- Wordpress theme -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen, projection">
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="container">	
	<div id="header-wrapper" class="span-28 last">
		<div id="nav" class="span-28 last">
			<ul>
				<?php wp_list_pages('title_li='); ?>
			</ul>
		</div>
		<div id="header" class="span-28 last">
			<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		</div>
	</div>
	<hr />
	<div id="content" class="clear span-20">
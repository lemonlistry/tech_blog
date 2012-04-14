<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta name="keywords" content="<?=$keywords?>" />
	<meta name="description" content="<?=$description?>" />
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<meta name="distribution" content="global" />
	<meta name="robots" content="index, follow" />
	<meta name="revisit-after" content="2 days" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/all.js"></script>
	<?php if ( is_singular() ){ ?>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/comments-ajax.js"></script>
	<?php } ?>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url') ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.ico" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/pagenavi.css" type="text/css" media="screen" />

<?php wp_head(); ?>
</head>
<body id="home" class="log">
	<div id="wrap">
		<div id="header">
			<h1>
				<a title="<?php bloginfo('name'); ?>" href="<?php bloginfo('siteurl'); ?>"><?php  bloginfo('name'); ?></a>
			</h1>
			<ul>
				<li class="<? echo (is_home())?'current_page_item':''; ?>"><a href="<?php echo get_option('home'); ?>/"><span>Home</span></a></li>
				<?php $pages = wp_list_pages('sort_column=menu_order&title_li=&echo=0');
					$pages = preg_replace('%<a ([^>]+)>%U','<a $1><span>', $pages);
					$pages = str_replace('</a>','</span></a>', $pages);
				echo $pages; ?>
				<li id="feedme"><a href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars(bloginfo('name'), 1) ?> <?php _e('Posts RSS feed'); ?>" rel="alternate" type="application/rss+xml"><span>RSS</span></a></li>
			</ul>
		</div><!-- end header -->
		<div id="bg_top"></div> <!-- end bg_top -->
<div id="content">

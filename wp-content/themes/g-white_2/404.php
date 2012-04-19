<?php header("HTTP/1.1 404 Not Found"); ?>
<?php header("Status: 404 Not Found"); ?>
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
	<div id="error">
		<div class="error_head">
			<a title="<?php bloginfo('name'); ?>" href="<?php bloginfo('siteurl'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/404.gif" alt="Error 404" title="Error 404" /></a>
		</div>
	</div>
</body>
</html>

<?php
/**
 * @package WordPress
 * @subpackage Uncomplicated_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>

<body>

<div id="container">


<div id="header">
	<h1><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<div class="border"></div>
	<h2><?php bloginfo('description'); ?></h2>
</div>
	

<div id="menuholder">
		<div class="menu">
			<?php wp_page_menu('show_home=1&exclude=32&menu_class=page-navi&sort_column=menu_order'); ?>
		</div>

		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
</div>
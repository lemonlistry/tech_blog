<?php
/**
 * @package WordPress
 * @subpackage Uncomplicated_Theme
 */
?>
<div id="sidebar">
<ul>
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>

<?php wp_list_pages('title_li=<h2>Menu</h2>' ); ?>

<li><h2>Archives</h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>
</li>

<?php wp_list_categories('title_li=<h2>Categories</h2>'); ?>

<?php wp_list_bookmarks(); ?>

<li><h2>Meta</h2>
	<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
		<li><a href="http://themeterminal.com/" title="Free WordPress Themes">Theme Terminal</a></li>
		<?php wp_meta(); ?>
	</ul>
</li>

<?php endif; ?>

</ul>

</div>


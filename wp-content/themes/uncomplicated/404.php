<?php
/**
 * @package WordPress
 * @subpackage Uncomplicated_Theme
 */

get_header();
?>

	<div id="content">

		<h2 class="notfound">Sorry, Not Found. Please try again.</h2>
		<?php include (TEMPLATEPATH . '/altsearchform.php'); ?>

	</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
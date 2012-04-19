<?php
/**
 * @package WordPress
 * @subpackage Uncomplicated_Theme
 */

get_header();
?>

<div id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			
			<div class="entry">
				<?php the_content(); ?>
	
				<?php //if page is split into more than one
					link_pages('<p>Pages: ', '</p>', 'number'); ?>
				<?php edit_post_link('(edit this page)', '<p>', '</p>'); ?>
			</div>
			
		</div>
	  <?php endwhile; endif; ?>	
</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
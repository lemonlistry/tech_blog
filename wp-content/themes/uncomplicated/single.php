<?php
/**
 * @package WordPress
 * @subpackage Uncomplicated_Theme
 */

get_header();
?>

	<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<div class="postmetadata"><p><span class="commborder"><img src="<?php bloginfo('template_directory'); ?>/images/date.png" alt="date" /><?php the_time('F jS, Y') ?></span> <span class="commborder"><img src="<?php bloginfo('template_directory'); ?>/images/category.png" alt="category" /><?php the_category(', ') ?></span><span class="commborder"><img src="<?php bloginfo('template_directory'); ?>/images/author.png" alt="author" /><?php the_author() ?></span><span><img src="<?php bloginfo('template_directory'); ?>/images/comment.png" alt="comment" /><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></span></p></div>
	
			<div class="entry">
				<?php the_content('<p>Continue reading &rarr;</p>'); ?>
			</div>
		
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<h2 class="notfound">Sorry, Not Found. Please try again.</h2>
		<?php include (TEMPLATEPATH . '/altsearchform.php'); ?>

<?php endif; ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

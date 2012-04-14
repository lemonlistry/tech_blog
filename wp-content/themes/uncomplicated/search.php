<?php
/**
 * @package WordPress
 * @subpackage Uncomplicated_Theme
 */

get_header();
?>
	
	<div id="content">
	<?php if (have_posts()) : ?>

		<h2 class="search">Search Results</h2>
		
		<?php if (show_posts_link()) : ?>
			<div class="navigation">
        		<div class="alignleft"><?php next_posts_link('&larr; Previous Entries') ?></div>
        		<div class="alignright"><?php previous_posts_link('Next Entries &rarr;') ?></div>
			</div>
		<?php endif; ?>


		<?php while (have_posts()) : the_post(); ?>	
			<div class="post">
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<div class="postmetadata"><p><span class="commborder"><img src="<?php bloginfo('template_directory'); ?>/images/date.png" alt="date" /><?php the_time('F jS, Y') ?></span> <span class="commborder"><img src="<?php bloginfo('template_directory'); ?>/images/category.png" alt="category" /><?php the_category(', ') ?></span><span class="commborder"><img src="<?php bloginfo('template_directory'); ?>/images/author.png" alt="author" /><?php the_author() ?></span><span><img src="<?php bloginfo('template_directory'); ?>/images/comment.png" alt="comment" /><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></span></p></div>
				
				<div class="entry">
					<?php the_excerpt() ?>
				</div>
			</div>
	
		<?php endwhile; ?>

		<?php if (show_posts_link()) : ?>
			<div class="navigation">
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>

		        <div class="alignleft"><?php next_posts_link('&larr; Previous Entries') ?></div>
		        <div class="alignright"><?php previous_posts_link('Next Entries &rarr;') ?></div>
		        <?php } ?>
			</div>
		<?php endif; ?>
	
	<?php else : ?>
  
		<h2 class="notfound">Sorry, Not Found. Please try again.</h2>
		<?php include (TEMPLATEPATH . '/altsearchform.php'); ?>

	<?php endif; ?>
		
	</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
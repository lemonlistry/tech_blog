<?php
/**
 * @package WordPress
 * @subpackage Uncomplicated_Theme
 */

get_header();
?>
	
	<div id="content">
		<?php if (have_posts()) : ?>

			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			 
			<?php /* If this is a category archive */ if (is_category()) { ?>				
			<h2 class="archivetitle">Archive for the '<?php echo single_cat_title(); ?>' Category</h2>
			
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h2 class="archivetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
			
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h2 class="archivetitle">Archive for <?php the_time('F, Y'); ?></h2>
	
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h2 class="archivetitle">Archive for <?php the_time('Y'); ?></h2>
			
			<?php /* If this is a search */ } elseif (is_search()) { ?>
			<h2 class="archivetitle">Search Results</h2>
			
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h2 class="archivetitle">Author Archive</h2>
	
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2 class="archivetitle">Blog Archive</h2>

		<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
			<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<div class="postmetadata"><p><span class="commborder"><img src="<?php bloginfo('template_directory'); ?>/images/date.png" alt="date" /><?php the_time('F jS, Y') ?></span> <span class="commborder"><img src="<?php bloginfo('template_directory'); ?>/images/category.png" alt="category" /><?php the_category(', ') ?></span><span class="commborder"><img src="<?php bloginfo('template_directory'); ?>/images/author.png" alt="author" /><?php the_author() ?></span><span><img src="<?php bloginfo('template_directory'); ?>/images/comment.png" alt="comment" /><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></span></p></div>
				
			<div class="entry">
				<?php the_excerpt() ?>
			</div>
		
			<div class="postborder"></div>

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
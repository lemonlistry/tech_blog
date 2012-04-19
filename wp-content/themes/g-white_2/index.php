<?php get_header(); ?>

<div id="contentwrap">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="entry">
		<h2 <?php if (is_page()) echo 'style="margin-bottom: 20px;" ' ?>class="entrytitle" id="post-<?php the_ID(); ?>"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> 			<span><?php edit_post_link('<img class="editpost" alt="Edit" src="' . get_bloginfo('template_directory') . '/images/edit.gif" />', '', ''); ?></span>
		</h2>
		<div class="entrymeta1"> 
			<div class="meta-date">
				<span class="meta-month"><?php the_time('M'); ?></span>
				<span class="meta-day"><?php the_time('j'); ?></span>
			</div>
			<span class="meta-author"><?php the_author_link(); ?></span>
			<span class="meta-category"><?php the_category(', ') ?></span>
			<span class="meta-comment"><?php comments_popup_link($comments_img_link .'No Comments', $comments_img_link .'1 Comment', $comments_img_link . '% Comments'); ?></span>
			<div class="clear"></div>
		</div><!-- [entrymeta1] -->
		<div class="entrybody"> <?php the_content('Read the rest of this entry &raquo;'); ?> </div><!-- [entrybody] -->
		<div class="entrymeta3">
			<span class="single_tags"><?php the_tags('', ' , ' , ''); ?></span>
		</div>
	</div><!-- [entry] -->
	<?php endwhile; else: ?>
	<p>
		<?php _e('No Entries found.'); ?>
	</p>
	<?php endif; ?>
	<div class="clear"></div>
    <?php include('wp-pagenavi.php');
		if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
    ?>
</div><!-- [contentwrap] -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

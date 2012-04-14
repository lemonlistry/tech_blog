<?php

get_header();

?>

<div id="contentwrap">
	<?php if (have_posts()) : ?>
	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php 
			if (is_category()) { ?>
		<?php }
			elseif (is_day()) { ?>
		<?php }
			elseif (is_month()) { ?>
		<?php } 
			elseif (is_year()) { ?>
		<?php } 
			elseif (is_author()) { ?>
		<?php }
			elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<?php } ?>
	<?php while (have_posts()) : the_post(); ?>
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
		<div class="entrybody">
			<?php the_content(__('Read more &raquo;'));?>
		</div>
		<div class="entrymeta3"> 
			<span class="single_tags"><?php the_tags('', ' , ' , ''); ?></span>
		</div>
		<!--
		<?php trackback_rdf(); ?>
		-->
		</div>
	<?php endwhile; else: ?>
	<p>
		<?php _e('Sorry, no posts matched your criteria.'); ?>
	</p>
	<?php endif; ?>
	<?php include('wp-pagenavi.php');
		if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
    ?>
</div>
<?php get_sidebar(); ?>
<!-- The main column ends  -->
<?php get_footer(); ?>

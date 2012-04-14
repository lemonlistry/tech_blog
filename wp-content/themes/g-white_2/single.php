<?php get_header(); ?>

<div id="contentwrap">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="entry single" id="post-<?php the_ID(); ?>">
		<h2 <?php if (is_page()) echo 'style="margin-bottom: 20px;" ' ?>class="entrytitle" id="post-<?php the_ID(); ?>">
			<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
			<span><?php edit_post_link('<img class="editpost" alt="Edit" src="' . get_bloginfo('template_directory') . '/images/edit.gif" />', '', ''); ?></span>
		</h2>
		<div class="entrymeta1"> 
			<div class="meta-date">
				<span class="meta-month"><?php the_time('M'); ?></span>
				<span class="meta-day"><?php the_time('j'); ?></span>
			</div>
			<span class="meta-time">Year <?php the_time('Y'); ?></span>
			<span class="meta-author"><?php the_author_link(); ?></span>
			<span class="meta-category"><?php the_category(', ') ?></span>
			<div class="clear"></div>
		</div><!-- [entrymeta1] -->
		<div class="entrybody">
			<?php the_content('Read the rest of this entry &raquo;'); ?>
			<div class="entrymeta2">
				<span class="single_tags"><?php the_tags('', ' , ' , ''); ?></span>
				<span class="meta-comment-add"><a href="#commentform">Leave a comment</a></span>
				<div class="clear"></div>
			</div><!-- [entrymeta2] -->
		</div>
		<div class="clear"></div>
		<div class="related_post">
        <div class="related_post_mid">
          <?php if (function_exists('st_get_related_posts')){;?>
          <?php st_related_posts('number=5&title=<h4>Related Posts</h4>&nopoststext=<strong><em>No Related Posts</em></strong>&include_page=false&order=random&xformat=<a href="%permalink%" title="%title% (%date%)">%title% (%post_comment%)</a><p>%post_excerpt%</p>&except_wrap=5');?>
          <?php } ;?>
        </div>
        <div class="related_post_bottom"></div>
      </div>
		<?php comments_template('',true); // Get wp-comments.php template ?>
	</div><!-- [post] -->
	<?php endwhile; else: ?>
	<p>
		<?php _e('No Entries found.'); ?>
	</p>
	<?php endif; ?>
</div>
<!-- [content] -->
<?php include_once("sidebar_s.php"); ?>
<?php get_footer(); ?>
<?php get_header(); ?>

<div id="contentwrap">
	<?php if (have_posts()) : the_post(); ?>
	<div class="entry page">
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2 class="pagetitle">
				<?php the_title(); ?>
				<span>
					<?php edit_post_link('<img class="editpost" alt="Edit" src="' . get_bloginfo('template_directory') . '/images/edit.gif" />', '', ''); ?>
				</span>
			</h2>
			<div class="post-content">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
				<?php comments_template('',true); // Get wp-comments.php template ?>
			</div><!-- [post] -->
		</div>
		<?php else: ?>
		<p>
			<?php _e('No Entries found.'); ?>
		</p>
		<?php endif; ?>
	</div>
</div>
<!--/contentwrap -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>

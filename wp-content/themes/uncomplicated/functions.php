<?php
/**
 * @package WordPress
 * @subpackage Uncomplicated_Theme
 */
?>
<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
?>
<?php
function show_posts_link() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}
?>
<?php
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="commentmetadata">
         <?php echo get_avatar($comment,$size='32',$default='<path_to_url>' ); ?>
         
<p><span><img src="<?php bloginfo('template_directory'); ?>/images/author.png" alt="category" /><?php comment_author_link() ?></span> <span class="noborder"><img src="<?php bloginfo('template_directory'); ?>/images/date.png" alt="date" /><?php comment_date('F jS, Y') ?></span><span class="reborder"><img src="<?php bloginfo('template_directory'); ?>/images/reply.png" alt="date" /><?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply', 'add_below' =>
 $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span><?php edit_comment_link('Moderate','<span></span><span class="moderate">','</span>'); ?></p></div>

      <?php if ($comment->comment_approved == '0') : ?>
         <p style="font-size:10px; background:#fafafa; padding:2px 8px; margin:12px 0 0 0; text-align:center;"><em><?php _e('Your comment is awaiting moderation.') ?></em></p>
         <br />
      <?php endif; ?>

      <?php comment_text() ?>

     </div>
<?php
        }

?>
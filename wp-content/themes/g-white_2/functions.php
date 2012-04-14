<?php
	if ('functions.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('<h1 style="color:red;">Please do not load this page directly.</h1>');

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div class="side-item"><div class="sidemid">',
        'after_widget' => '</div><div class="sidebottom"></div></div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

/////////////////////////// Commentlist ////////////////////////
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
	global $commentcount;
	if(!$commentcount) {
		$commentcount = 0;
		}
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class('',$comment_id,$comment_post_ID); ?>>
	<div id="comment-<?php comment_ID() ?>" class="comment-body">
		<div class="comment-author vcard">
			<div class="gravatar"><?php echo get_avatar( get_comment_author_email(), '32'); ?></div>
		</div><!-- comment-author -->
		<div class="comment-meta commentmetadata">
			<div class="comment-meta-bg">
				<span class="fn"><?php comment_author_link();?></span>
				<span class="commenttime">On <?php comment_date('M jS, Y') ?></span>
				<span class="meta-line">/</span>
				<span class="commentcount"><a href="#comment-<?php comment_ID() ?>"><?php printf('#%1$s', ++$commentcount); ?></a></span>
				<span class="reply"><?php comment_reply_link(array('depth' => $depth, 'max_depth'=> $args['max_depth'], 'reply_text' => "Reply"),$comment_id,$comment_post_ID);?></span>
				<span class="editpost"><?php edit_comment_link('<img alt="Edit" src="' . get_bloginfo('template_directory') . '/images/edit.gif" />', ''); ?></span>
			</div><!--meta-bg-->
		</div><!-- comment-meta -->
		<div class="commenttext">
			<div class="com_mid">
				<div class="commentp">
					<?php if ($comment->comment_approved == '0') : ?>
					<em>
						<?php _e('Your comment is awaiting moderation.') ?>
					</em> <br />
					<?php endif; ?>
					<?php comment_text() ?>
				</div>
			</div>
		</div><!-- commenttext -->
		<div class="com_bottom"></div>
	</div><!-- [div-comment] -->
  <?php
}


function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID(); ?>">
  <?php comment_author_link(); ?>
</li>
<?php }

////////////////////////////////////////////////////////////////////////////////
// Recent Comments
////////////////////////////////////////////////////////////////////////////////
if (function_exists('mdv_recent_comments')) { 
}else{
	function mdv_recent_comments($no_comments = 10, $comment_lenth = 5, $before = '<li class="mdv_comments">', $after = '</li>', $show_pass_post = false, $comment_style = 0) {
	    global $wpdb;
	    $request = "SELECT ID, comment_ID, comment_content, comment_author, comment_author_url, post_title FROM $wpdb->comments LEFT JOIN $wpdb->posts ON $wpdb->posts.ID=$wpdb->comments.comment_post_ID WHERE post_status IN ('publish','static') ";
		if(!$show_pass_post) $request .= "AND post_password ='' ";
		$request .= "AND comment_approved = '1' ORDER BY comment_ID DESC LIMIT $no_comments";
		$comments = $wpdb->get_results($request);
	    $output = '';
		if ($comments) {
			foreach ($comments as $comment) {
				$comment_author = stripslashes($comment->comment_author);
				if ($comment_author == "")
					$comment_author = "anonymous"; 
				$comment_content = strip_tags($comment->comment_content);
				$comment_content = stripslashes($comment_content);
				$words=split(" ",$comment_content); 
				$comment_excerpt = join(" ",array_slice($words,0,$comment_lenth));
				$permalink = get_permalink($comment->ID)."#comment-".$comment->comment_ID;

				if ($comment_style == 1) {
					$post_title = stripslashes($comment->post_title);
					$url = $comment->comment_author_url;

					if (empty($url))
						$output .= $before . $comment_author . ' on ' . $post_title . '.' . $after;
					else
						$output .= $before . "<a href='$url' rel='external'>$comment_author</a>" . ' on ' . $post_title . '.' . $after;
				}
				else {
					$output .= $before . '<a href="' . $permalink . '" title="View the entire comment by ' . $comment_author . '">' . $comment_author . ': ' . $comment_excerpt . '...</a>' . $after;
				}
			}
			$output = convert_smilies($output);
		} else {
			$output .= $before . "None found" . $after;
		}
	    echo $output;
	}
}

////////////////////////////////////
//中文工具箱
/////////////////////
function get_recent_comments($no_comments = 5, $before = '<li> ', $after = '</li>', $show_pass_post = false) {

	global $wpdb, $tablecomments, $tableposts;
	$request = "SELECT ID, comment_ID, comment_content, comment_author FROM $tableposts, $tablecomments WHERE $tableposts.ID=$tablecomments.comment_post_ID AND (post_status = 'publish' AND comment_author != 'Alan' OR post_status = 'static')";

if(!$show_pass_post) { $request .= "AND post_password ='' "; }

    $request .= "AND comment_approved = '1' ORDER BY $tablecomments.comment_date DESC LIMIT 

$no_comments";
    $comments = $wpdb->get_results($request);
    $output = '';
    foreach ($comments as $comment) {
       $comment_author = stripslashes($comment->comment_author);
       $comment_content = strip_tags($comment->comment_content);
       $comment_content = stripslashes($comment_content);
       $comment_excerpt =substr($comment_content,0,50);
       $comment_excerpt = utf8_trim($comment_excerpt);
       $permalink = get_permalink($comment->ID)."#comment-".$comment->comment_ID;
       $output .= $before . '<a href="' . $permalink . '" title="View the entire comment by ' . $comment_author . '">' . $comment_author . ': ' . $comment_excerpt . '...</a>' . $after;
       }
       echo $output;
}

function get_recent_comments_only($no_comments = 5, $before = '<li> ', $after = '</li>', $show_pass_post = false) {

	global $wpdb, $tablecomments, $tableposts;
	$request = "SELECT ID, comment_ID, comment_content, comment_author FROM $tableposts, $tablecomments WHERE $tableposts.ID=$tablecomments.comment_post_ID AND (post_status = 'publish' OR post_status = 'static') AND comment_type = ''";

if(!$show_pass_post) { $request .= "AND post_password ='' "; }

    $request .= "AND comment_approved = '1' ORDER BY $tablecomments.comment_date DESC LIMIT 

$no_comments";
    $comments = $wpdb->get_results($request);
    $output = '';
    foreach ($comments as $comment) {
       $comment_author = stripslashes($comment->comment_author);
       $comment_content = strip_tags($comment->comment_content);
       $comment_content = stripslashes($comment_content);
       $comment_excerpt =substr($comment_content,0,50);
       $comment_excerpt = utf8_trim($comment_excerpt);
       $permalink = get_permalink($comment->ID)."#comment-".$comment->comment_ID;
       $output .= $before . '<a href="' . $permalink . '" title="View the entire comment by ' . $comment_author . '">' . $comment_author . '</a>: ' . $comment_excerpt . '...' . $after;
       }
       echo $output;
}

function get_recent_trackbacks($no_comments = 5, $before = '<li> ', $after = '</li>', $show_pass_post = false) {

	global $wpdb, $tablecomments, $tableposts;
	$request = "SELECT ID, comment_ID, comment_content, comment_author FROM $tableposts, $tablecomments WHERE $tableposts.ID=$tablecomments.comment_post_ID AND (post_status = 'publish' OR post_status = 'static') AND (comment_type = 'trackback' OR comment_type ='pingback')";

if(!$show_pass_post) { $request .= "AND post_password ='' "; }

    $request .= "AND comment_approved = '1' ORDER BY $tablecomments.comment_date DESC LIMIT 

$no_comments";
    $comments = $wpdb->get_results($request);
    $output = '';
    foreach ($comments as $comment) {
       $comment_author = stripslashes($comment->comment_author);
       $comment_content = strip_tags($comment->comment_content);
       $comment_content = stripslashes($comment_content);
       $comment_excerpt =substr($comment_content,0,50);
       $comment_excerpt = utf8_trim($comment_excerpt);
       $permalink = get_permalink($comment->ID)."#comment-".$comment->comment_ID;
       $output .= $before . '<a href="' . $permalink . '" title="View the entire comment by ' . $comment_author . '">' . $comment_author . '</a>: ' . $comment_excerpt . '...' . $after;
       }
       echo $output;
}

// A trim function to remove the last character of a utf-8 string
// by following instructions on http://en.wikipedia.org/wiki/UTF-8
// dotann

function utf8_trim($str) {

	$len = strlen($str);

	for ($i=strlen($str)-1; $i>=0; $i-=1){
		$hex .= ' '.ord($str[$i]);
		$ch = ord($str[$i]);
        if (($ch & 128)==0) return(substr($str,0,$i));
		if (($ch & 192)==192) return(substr($str,0,$i));
	}
	return($str.$hex);
}

// Get Top Commented Posts
function get_mostcommented($limit = 5, $before = '<li>', $after = '</li>') {
    global $wpdb, $post, $tableposts, $tablecomments, $time_difference, $post;
    $mostcommenteds = $wpdb->get_results("SELECT  $tableposts.ID as ID, post_title, post_name, COUNT($tablecomments.comment_post_ID) AS 'comment_total' FROM $tableposts LEFT JOIN $tablecomments ON $tableposts.ID = $tablecomments.comment_post_ID WHERE comment_approved = '1' AND post_date < '".date("Y-m-d H:i:s", (time() + ($time_difference * 3600)))."' AND post_status = 'publish' AND post_password = '' GROUP BY $tablecomments.comment_post_ID ORDER  BY comment_total DESC LIMIT $limit");
    foreach ($mostcommenteds as $post) {
			$post_id = (int) $post->post_id;
			$post_title = htmlspecialchars(stripslashes($post->post_title));
			$comment_total = (int) $post->comment_total;
                        $permalink = get_permalink($post->ID);
			echo "<li><a href=\"$permalink\">$post_title&nbsp;($comment_total)</a></li>";
    }
}

// Get Comments' Members Stats
// Treshhold = Number Of Posts User Must Have Before It Will Display His Name Out
// 5 = Default Treshhold; -1 = Disable Treshhold
function get_commentmembersstats($threshhold = 5) {
	global $wpdb, $tablecomments;
	$comments = $wpdb->get_results("SELECT comment_author, comment_author_url, COUNT(comment_ID) AS 'comment_total' FROM $tablecomments WHERE comment_approved = '1' AND (comment_author != 'blogmaster') AND (comment_author != '')GROUP BY comment_author ORDER BY comment_total DESC");
	$no = 1;

    foreach ($comments as $comment) {
			$comment_author = htmlspecialchars(stripslashes($comment->comment_author));
			$comment_author_url =stripslashes($comment->comment_author_url);
			$comment_total = (int) $comment->comment_total;
				if ($comment_author_url) {
					$comment_author_link = "<a href='$comment_author_url' target='_blank'>$comment_author</a>";
				} else {
					$comment_author_link = "<a href='mailto:$comment_author_email'>$comment_author</a>";
				}
			echo "<a href=\"$comment_author_url\" target=\"_blank\">$comment_author</a> ($comment_total)  ";
			$no++;

			// If Total Comments Is Below Threshold
			if($comment_total <= $threshhold && $threshhold != -1) {
				return;
			}
    }
}


function random_posts ($limit = 5, $length = 400, $before = '<li>', $after = '</li>', $show_pass_post = false, $show_excerpt_in_title = true) {
    global $wpdb, $tableposts;
    $sql = "SELECT ID, post_title, post_date, post_content FROM $tableposts WHERE post_status = 'publish' ";
	if(!$show_pass_post) $sql .= "AND post_password ='' ";
	$sql .= "ORDER BY RAND() LIMIT $limit";
    $posts = $wpdb->get_results($sql);
	$output = '';
    foreach ($posts as $post) {
       $post_title = stripslashes($post->post_title);
	$post_date = mysql2date('j.m.Y', $post->post_date);
       $permalink = get_permalink($post->ID);
	$post_content = strip_tags($post->post_content); 
	$post_content = stripslashes($post_content); 
	$post_strip = substr($post_content,0,$length);
       $post_strip = utf8_trim($post_strip);
	$post_strip = str_replace('"', '', $post_strip);
	$output .= $before . '<a href="' . $permalink . '" rel="bookmark" title="';
	if($show_excerpt_in_title) {
		$output .= $post_strip . '...  ';
      	   } else  {
		$output .= 'Permanent Link: ' . str_replace('"', '', $post_title) . '...   ';
	}
	$output .= $post_date . '">' . $post_title . '</a>';
	if(!$show_excerpt_in_title) {
		$output .= ': ' . $post_strip . '...  ';
      	   }
	$output .= $after;
	}
	echo $output;
}

function get_recent_posts($no_posts = 5, $before = '<li>+ ', $after = '</li>', $show_pass_post = false, $skip_posts = 0) {
    global $wpdb, $tableposts;
    $request = "SELECT ID, post_title, post_date, post_content FROM $tableposts WHERE post_status = 'publish' ";
        if(!$show_pass_post) { $request .= "AND post_password ='' "; }
    $request .= "ORDER BY post_date DESC LIMIT $skip_posts, $no_posts";
    $posts = $wpdb->get_results($request);
    $output = '';
    foreach ($posts as $post) {
        $post_title = stripslashes($post->post_title);
//	 $post_date = mysql2date('j.m.Y', $post->post_date);
        $permalink = get_permalink($post->ID);
        $output .= $before . '<a href="' . $permalink . '" rel="bookmark" title="Permanent Link: ' . $post_title . '">' . $post_title . '</a>'. $after;
    }
    echo $output;
}

function mul_excerpt ($excerpt) {
     $myexcerpt = substr($excerpt,0,255);
     return utf8_trim($myexcerpt) . '... ';
}

add_filter('the_excerpt', 'mul_excerpt');
add_filter('the_excerpt_rss', 'mul_excerpt');

?>
<div id="sidebar">
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>
<?php if ( is_home() ) { ?>

<?php } ?>
  <div class="side-item">
    <div class="sidemid">
	 <h2>SEARCH THIS BLOG</h2>
      <div id="sidebarsearch">
        <form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
          <input type="text" name="s" id="s" size="18" onfocus="if(this.value=='Input keywords to search') this.value='';" onblur="if(this.value=='') this.value='Input keywords to search';" value="Input keywords to search"/>
          <input id="searchsubmit" name="sbutt" type="submit" value="" alt="Submit"/>
        </form>
      </div>
    </div>
    <div class="sidebottom"></div>
  </div>
  <!-- sidebarsearch ends -->
  <div class="side-item">
    <div class="sidemid">
     <h2>TAG CLOUDS</h2>
      <div class="tagclouds">
        <?php wp_tag_cloud('smallest=8&largest=18&unit=pt&number=35&order=rand'); ?>
      </div>
    </div>
    <div class="sidebottom"></div>
  </div>
  <div class="side-item">
    <div class="sidemid">
      <h2 id="categories">CATEGORIES</h2>
      <ul class="category">
        <?php wp_list_cats('sort_column=name'); ?>
      </ul>
    </div>
    <div class="sidebottom"></div>
  </div>
  <div class="side-item">
    <div class="sidemid">
      <h2 id="radom_posts">RADOM POSTS</h2>
      <ul>
        <?php
			query_posts(array('orderby' => 'rand', 'showposts' => 10));
			if (have_posts()) :
			while (have_posts()) : the_post();?>
			<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile;endif; ?>
      </ul>
    </div>
    <div class="sidebottom"></div>
  </div>
  <div class="side-item">
    <div class="sidemid">
      <h2 id="recentcom">RECENT COMMENTS</h2>
      <ul id="recentcomments">
        <?php if (function_exists('wp_recentcomments')) {

         wp_recentcomments('limit=8&post=false&avatar_size=26&avatar_position=right&length=14&pingback=false&navigator=true&smilies=true'); } else { mdv_recent_comments('10'); } ?>
      </ul>
    </div>
    <div class="sidebottom"></div>
  </div>
  <div class="side-item">
    <div class="sidemid">
      <h2 id="side_archvies">ARCHIVES</h2>
      <ul>
        <?php wp_get_archives('type=monthly&limit=12'); ?>
      </ul>
    </div>
    <div class="sidebottom"></div>
  </div>
  <div class="side-item">
    <div class="sidemid">
	  <h2>BLOGROLL</h2>
      <ul id="blogroll">
        <?php wp_list_bookmarks(''); ?>
      </ul>
    </div>
    <div class="sidebottom"></div>
  </div>
  <div class="side-item">
    <div class="sidemid">
      <h2 id="metas">METAS</h2>
      <ul>
        <?php wp_register('<li id="register">', '</li>'); ?>
        <li id="login">
          <?php wp_loginout(); ?>
        </li>
        <li><a href="http://validator.w3.org/check?uri=referer">Valid XHTML 1.0</a></li>
      </ul>
    </div>
    <div class="sidebottom"></div>
  </div>
  <?php endif; ?>
</div><!-- sidebar end -->
</div><!-- content end -->
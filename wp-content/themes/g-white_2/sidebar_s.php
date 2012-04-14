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
  <!-- [sidebarsearch] -->
  <div class="side-item">
    <div class="sidemid">
      <h2 id="recent_post">RECENT POSTS</h2>
      <ul>
        <?php get_archives('postbypost', 10); ?>
      </ul>
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
     <h2>TAG CLOUDS</h2>
      <div class="tagclouds">
        <?php wp_tag_cloud('smallest=8&largest=18&unit=pt&number=35&order=rand'); ?>
      </div>
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
      <h2 id="metas">METAS</h2>
      <ul>
        <?php wp_register('<li id="register">', '</li>'); ?>
        <li id="login">
          <?php wp_loginout(); ?>
        </li>
      </ul>
    </div>
    <div class="sidebottom"></div>
  </div>
<?php endif; ?>
</div>
<!-- [sidebar] -->
</div>
<!-- [content] -->
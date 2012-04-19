<?php
/*
Template Name: Links
*/
?>
<?php get_header(); ?>
<!-- Container -->

<div id="contentwrap">
  <ul class="linkpage">
    <?php wp_list_bookmarks(); ?>
  </ul>
  <div class="clear-left"></div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

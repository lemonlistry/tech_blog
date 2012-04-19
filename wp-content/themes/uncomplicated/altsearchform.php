<?php
/**
 * @package WordPress
 * @subpackage Uncomplicated_Theme
 */
?>
<form method="get" id="altsearchform" action="<?php bloginfo('url'); ?>/">
<div><input type="text" value="SEARCH" onfocus="if (this.value == 'SEARCH') {this.value = '';}" onblur="if (this.value == '') {this.value = 'SEARCH';}"  name="s" id="s" />
<input type="submit" id="searchsubmit" value="Search" />
</div>
</form>
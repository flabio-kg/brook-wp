<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<div id="wrapper">
	<h1 style="font:30px GoudyOldSty-Reg,Georgia;"><?php echo $post->post_title;?></h1>
	<div style="border-top: solid 1px silver; padding:20px;">
		<?php echo  apply_filters('the_content', $post->post_content); ?>
		<div style="clear: left;"></div>
	</div>
</div>

<?php get_footer(); ?>
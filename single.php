<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header();?>
<?php
$postContent = apply_filters('the_content', $post->post_content);


$product==false;
$LinesCatsArray = array(32,19,14,18,17,15,16);
$post_categories = wp_get_post_categories($post->ID);
$Postid = $post->ID;
foreach ($post_categories as $pcats)
{
   if (in_array($pcats, $LinesCatsArray))
       $LineCat = $pcats;
   else
       $CurentCatID = $pcats;
   $FirstCatId = getFirstCat($pcats);
   if ($FirstCatId ==3)
   {
       $product=true;
   }
}
if ($product==true)
{
    include('ProductItem.php');
}
else 
{
    $NewsBigImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
    echo '
    <div id="wrapper">
	<h1 style="font:30px GoudyOldSty-Reg,Georgia;">'.$post->post_title.'</h1>
	<div style="border-top: solid 1px silver; padding:20px;">
	<p style="float:left;padding:15px;"><img alt="" src="'.$NewsBigImage[0].'"><p>
	
		'.$postContent.'
		<br>
		<br>
		<a href="http://brooksengland.ru/category/news/">Назад</a>
		<div style="clear: left;"></div>
	</div>
    </div>
    ';
    
    
}
get_footer(); ?>
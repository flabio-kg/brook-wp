<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); 

$CurentCatID = get_query_var('cat');
$FirstCatId = getFirstCat($CurentCatID);
if ( $FirstCatId == 3 )
{
    
	include('categoryProducts.php');
}
else 
{
$CurentCat = get_category($CurentCatID);
$i=0;
$PostsArray = get_posts(array('category'=>$CurentCatID,'orderby'=> 'post_date','order'=> 'DESC','posts_per_page'=>-1));
	foreach ($PostsArray as $PostItem)
	{

		$NewsBigImage = wp_get_attachment_image_src( get_post_thumbnail_id( $PostItem->ID ), "Full");
		$href = get_permalink($PostItem->ID);
		$outNews .= ($i%4==0?'<div style="clear:both;padding:bottom:10px;">&nbsp;</div>':'').'
		 <article role="article">
          <a href="'.$href.'"><h2 style="height:22px;width:232px;overflow:hidden;">'.$PostItem->post_title.'</h2></a>
          <a href="'.$href.'"><img alt="" src="'.$NewsBigImage[0].'"></a>
          <a href="'.$href.'"><p style="width:232px;height:113px;overflow:hidden;">'.$PostItem->post_excerpt.'</p></a>
        </article>
		';
		$i++;
		
	}
	 echo '
    <div id="wrapper">
	  <h1 style="font:30px GoudyOldSty-Reg,Georgia;">'.$CurentCat->name.'</h1>
			<div style="border-top: solid 1px silver;">
				 <section id="contents" class="clearfix" style="width:970px;background:none;">
        
        			'.$outNews.'
        			
                  
     			 </section>
		<div style="clear: left;"></div>
	</div>
    </div>
    ';
	
}
?>


<?php get_footer(); ?>

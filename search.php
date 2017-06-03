<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<div id="wrapper" >
	<h1 style="font:30px GoudyOldSty-Reg,Georgia;">Поиск</h1>
	<div style="border-top: solid 1px silver;width:100%;height:10px;clear:both;">&nbsp;</div>
	<h1 style="font:20px GoudyOldSty-Reg,Georgia;letter-spacing:0;text-transform:none;">Результаты поиска по слову &nbsp;&nbsp;" <?php echo get_search_query() ;?>"</h1>
	 <div class="Searching">
	<section id="contents" class="clearfix" style="width:970px;background:none;">
<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					//print_r(the_post());
					$postsearch = get_post($post->ID);
					$href = get_permalink($postsearch->ID);
					$getimage = GetOneThumb($post->ID);
					$NewsBigImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
					$image = (empty($getimage) || $getimage=='Unknown')?'':'<p style="float:left;padding:15px;"><img alt="" src="'.$siteurl.'/wp-content/plugins/post-gallery/uploads/mid_'.$getimage.'"><p>';
					$Nimage = (empty($NewsBigImage[0])?'':'<p style="float:left;padding:15px;"><img alt="" src="'.$NewsBigImage[0].'"><p>');
					echo ' <article role="article" style="width:100%;" id="'.$postsearch->post_name.'">
			          <a href="'.$href.'"><h2>'.$postsearch->post_title.'</h2></a>
			          <a href="'.$href.'">'.$image.$Nimage.'<p style="">'.$postsearch->post_content.'</p></a>
			          <div style="border-top: solid 1px silver;width:100%;height:10px;clear:both;">&nbsp;</div>
			          
			        </article>';
			        /* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						//get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

	</section>
    </div>
    </div>

		


<?php get_footer(); ?>
<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */
Global $homeurl,$TplUrl,$siteurl;
get_header(); ?>

	<div id="page" class="clearfix">
          
          
          
    <div id="main" role="main" style="width:100%;">
      
      
      
      <?php echo do_shortcode( ' [owl-carousel category="main" singleItem="true" autoPlay="true"] ' ); ?>
      
      
      
      
      
      <section id="contents" class="clearfix" style="width:100%;">
        
        <?php echo HomeNews();?>
                  
      </section>
    <section id="contents" class="clearfix" style="width:100%;padding:0px;">&nbsp;</section>
      
    </div><!-- end MAIN -->
          
          
          
           <div id="main" role="main">
            <section id="story" >
             <?php
             $pageId = '85';
             $HomeInfo = get_page($pageId);
             echo apply_filters('the_content', $HomeInfo->post_content);
             ?> 
	      </section>
	      
            </div>
           <aside id="latest" role="complementary">
        
            <img id="logo" src="<?php echo $TplUrl; ?>/img/since_1866.gif" alt="SINCE 1866 BROOKS ENGLAND SADDLES, BAGS, ETC.">
          </aside>     
          
          
          
          
        
          
          
          
          
          
          
          
  </div> <!-- end PAGE -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
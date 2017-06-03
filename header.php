<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	Global $homeurl,$TplUrl,$siteurl;

	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;
if ( is_search() ) { echo the_search_query(); echo "| Результаты поиска "; bloginfo('name'); }
else
{
	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
}
	

	?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $TplUrl; ?>/lines.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<script>
var siteurlsearch = '<?php echo $siteurl;?>';
</script>
<![endif]-->
<script src="<?php echo $TplUrl; ?>/js/ga.js"  type="text/javascript"></script><script src="<?php echo $TplUrl; ?>/js/modernizr-1.7.min.js"></script>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
include('Utils.php');

?>
	<link rel="shortcut icon" href="<?php echo $TplUrl; ?>/images/favicon.ico">
</head>

<body>

        
<div id="container">
        
        
        
        
  <header role="banner">
    <nav role="navigation">
        
        <ul class="clearfix">
          <li class="logo"><a href="<?php echo $siteurl;?>"><img src="<?php echo $TplUrl; ?>/img/brooks_england.gif" alt="BROOKS ENGLAND" height="47" width="159"></a></li>
          <?php OutHeaderMenu();?>
      </ul>
      
    </nav>
    <div id="tools" class="clearfix">
        <div id="share">Свяжитесь с нами</div>
            
            <a class="fb" href="http://www.facebook.com/BrooksEnglandRussia" target="_blank">fb</a>
	    <a class="tw" href="http://vk.com/brooks_england_russia" target="_blank">vk</a>
            <a href="<?php echo $siteurl;?>/contacts/" class="sendm">SEND TO FRIEND</a>
            <span class="search">
            <form id="searchform" role="search" method="get" action="<?php echo $siteurl;?>">
            	<input name="s" value="" aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" placeholder="Искать" class="searchbox " type="text">
            	<input type="submit" style="width:0px;height:0px;">
            </form>
            </span>
        </div>
  </header>
  
  
  
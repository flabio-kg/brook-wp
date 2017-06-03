<?php
$CurentCat = get_category($CurentCatID);
$postsarray =  get_posts(array('category'=>$CurentCatID,'orderby'=> 'post_date','order'=> 'DESC','posts_per_page'=>-1));
foreach ($postsarray as $pst)
{
    $href=get_permalink($pst->ID);
    $getimage = GetOneThumb($pst->ID);
    $PriceMeta = get_post_meta($pst->ID,'price', false);
    $numm = preg_replace("/[^0-9]/", '', $PriceMeta[0]);
    $PriceMeta = empty($numm)?'':$numm. ' руб.';
    
    $postlists .= '
    <div style="float:left;padding-right:15px;">
    <div style="border-left: none;width:84px;float:left; border-bottom: 1px solid #666666; height: 150px;vertical-align: top;width: 100px;">  
        <div style=""><a href="'.$href.'"><img class="thumbn" alt="'.$pst->post_title.'" src="'.$siteurl.'/wp-content/plugins/post-gallery/uploads/thumb_'.$getimage.'"></a></div>
        <div class="productname"><a class="productnameA" href="'.$href.'">'.$pst->post_title.'</a></div>
        <div style="text-align: left; font-weight: bold; margin-top: 5px; font-size: 10px; color: #999" id="prices">
          '.$PriceMeta.'
        </div>
    </div>
    </div>
    ';
    }
$postlists = empty($postlists)?'Извините, в данной категории продукций нет!':$postlists;
?>
 <div id="wrapper">
      
      


      
    <div class="main clear_children">

<?php include('leftproductsmenu.php');?>
  <div class="contenuti cc_tallest">
    
    <h1 style="font:30px GoudyOldSty-Reg,Georgia;"><?php echo $CurentCat->name?></h1>
<h3><?php  echo $CurentCat->description;?></h3>


    
            <div id="productrange">            
                <?php echo $postlists;?>
            </div>
        
    
  </div>
  
</div>
            
           </div>

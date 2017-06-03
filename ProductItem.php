<?php
$PriceMeta = get_post_meta($Postid,'price');
$price = $PriceMeta[0];
$LineCat;
$Linesimagesarray = array(
15=>'http://brooksengland.ru/wp-content/themes/twentyeleven/img/saddlelines/Special.gif',
14=>'http://brooksengland.ru/wp-content/themes/twentyeleven/img/saddlelines/Select.gif',
16=>'http://brooksengland.ru/wp-content/themes/twentyeleven/img/saddlelines/Unique.gif',
17=>'http://brooksengland.ru/wp-content/themes/twentyeleven/img/saddlelines/Classic.gif',
18=>'http://brooksengland.ru/wp-content/themes/twentyeleven/img/saddlelines/Imperial.gif',
19=>'http://brooksengland.ru/wp-content/themes/twentyeleven/img/saddlelines/Aged.gif',
);
$CurentCatID;
$photossql = "SELECT * FROM wp_postgallery WHERE postid='".$Postid."' ORDER By image_order ASC";
$photos = $wpdb->get_results($photossql, OBJECT);
$i=0;
foreach($photos as $photo)
{
 $pcur = '';
    if ($i ==0)
    {
        $bigImage = '<div style="width:344px;height:250px;overflow:hidden;"><a class="pic" href="'.$siteurl.'/wp-content/plugins/post-gallery/uploads/'.$photo->image_location.'"><img style="max-width:344px;" id="generalImage" src="'.$siteurl.'/wp-content/plugins/post-gallery/uploads/mid_'.$photo->image_location.'"></a></div><div style="position: absolute;top: 259px;" class="lens"><a class="pic" id="lupa"  href="http://brooksengland.ru/wp-content/plugins/post-gallery/uploads/'.$photo->image_location.'"></a></div>';	
        $pcur = 'pcur';
        if(!empty($photo->image_caption))
        {
        	$price=$photo->image_caption;
        }
        
    }
    $pp = empty($photo->image_caption)?$PriceMeta[0]:$photo->image_caption;
    $smallImages .= '
    <div class="smals">
    <div class="smimg"><img style="cursor:pointer;width:64px;" src="'.$siteurl.'/wp-content/plugins/post-gallery/uploads/thumb_'.$photo->image_location.'" onclick="SetImage(\''.$siteurl.'/wp-content/plugins/post-gallery/uploads/mid_'.$photo->image_location.'\',\''.$i.'\',\''.$pp.'\')"></div>
    <a class="pcolor '.$pcur.'" id="p'.$i.'" onclick="SetImage(\''.$siteurl.'/wp-content/plugins/post-gallery/uploads/mid_'.$photo->image_location.'\',\''.$i.'\',\''.$pp.'\')">'.$photo->image_title.'</a>
    </div>
    ';
    $i++;
}


?>
<script>
function SetImage(src,id,pp)
{
	$("#generalImage").attr('src',src);
	var big = src.replace('mid_','');
	$(".pic").attr('href',big);
	$(".pcolor").removeClass('pcur');
	$("#p"+id).addClass('pcur');
	$("#prices").html(pp);
	return false;
}
</script>
<div id="wrapper">






<div class="main clear_children">

<?php include('leftproductsmenu.php');?>
  <div class="contenuti cc_tallest">
    
            
  
  
  
  
  
  
  
  
  <div id="productsheet" style="padding-top:30px;">



     <div style="float:left;">
         <div style="clear:both;" id="">
            <?php echo $bigImage;?>
         </div>
         <div style="border-top:1px solid gray;width:344px;" >
            <?php echo $smallImages;?>
              
         </div>  
     </div>   

<div style="float:right;width:363px;">
            <div id="productname">
              <h2 style="white-space: normal !important;"><?php echo $post->post_title;?></h2>
            </div>


		    <div class="itemcontent" style="width:344px;padding-bottom: 20px;">
			    <?php echo $postContent;?>
		    </div>


            <div id="priceholder">
              <div class="pricetools">
              <?php
              if ($LineCat)
              {
              	echo  '<a id="Shop_SaddleLines_PopupOpen" href="#linedesc" class="fancydesc"><img width="85" height="40" alt="BROOKS Unique" src="'.$Linesimagesarray[$LineCat].'"></a>';
              	$lineCat = get_category($LineCat);
              	$lineDesc =$lineCat->description;;
              }
              ?>
                <span id="ctl00_ContentPlaceHolder1_uplPrice">
                    <div id="prices">
                      <?php echo $price;?><br>
                    </div>
                 </span>
              </div>
            </div>

</div>
  	    </div>
  
  
  
  
  
  
  
  
  
  
  
  </div>
  
</div>
            
           </div>
           <div style="width:0px;height:0px;overflow:hidden;">
<div id="linedesc"  class="hide-pop-block">
<?php echo $lineDesc;?>
</div>
</div>


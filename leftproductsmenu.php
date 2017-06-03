 <?php
 //vars
 $CurentCat = get_category($CurentCatID);
 $ParentCatId = $CurentCat->parent;
 //vars
$Postid = (empty($Postid)?0:$Postid);

$CurentCat = get_category($CurentCatID);
$AllProductcategories = get_categories('parent=3&hide_empty=0&orderby=order');
  foreach($AllProductcategories as $parentcat)
  {
      $classname = '';
      $sub = '';
      if ($ParentCatId == $parentcat->term_id)
      {
          $sub = getSubCatMenu($parentcat->term_id,$CurentCatID,$Postid);
          $classname = 'class="current"';
      }
      
      if ($parentcat->term_id == 31 )//empty sub category
      {

      	if ($CurentCat->term_id==$parentcat->term_id)
      	{
      		$classname = 'class="current"'; 	
      		$sub = '<ul><li>'.getSubItems($parentcat->term_id,$Postid).'</li></ul>';
      	}
      	$hrefcat = get_category_link( $parentcat->term_id );
      }
      else {
      
      	$hrefcat = get_first_child_linlk($parentcat->term_id);
      }
      $Leftmenu .= '
      <div class="section">
        <a '.$classname.' href="'.$hrefcat.'">'.$parentcat->name.'</a><div class="highlight"></div>
        '.$sub.'
      </div>
      ';
  }
?>
 <div class="spalla">

    <div id="submenu">
        <?php echo $Leftmenu;?>
    </div>
    
  </div>
<?php

?>
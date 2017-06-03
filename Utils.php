<?php
function OutLangSwitcher(){
	$LangNames = array('en'=>'eng','ru'=>'rus','hy'=>'arm');
	$languages = icl_get_languages('skip_missing=0&orderby=code');
    foreach($languages as $l){
      	$out[] = '
      		<div class="langs_item"><a href="'.str_replace($l['language_code'].'/'.$l['language_code'].'/',$l['language_code'].'/',$l['url']).'">'.$LangNames[$l['language_code']].'</a></div>
                        <div class="langs_line">|</div>
      	';
    }
    echo implode('',$out);
}
function GetSubMenu($pid)
{

	Global $MenuItems,$TplUrl;
	foreach($MenuItems['sub'][$pid] as $items){
		$subs .= ' <li><a href="'.$items->url.'">'.$items->title.'</a></li>';
	}
	if(!empty($subs))
	{
		$out = ' 
		
		<div class="dropdown">
              <div class="dropdown-header"><img src="'.$TplUrl.'/img/dropdown_header.png"></div>
              <div class="dropdown-body">
                <ul>
                  '.$subs.'
                </ul>
              </div>
             </div>
		
		';
	}
	return $out;
}
function OutHeaderMenu($curentpage=""){

	Global $MenuItems;
	foreach($MenuItems['head'] as $items){
		$subs = '';
		$classname = '';
		if($MenuItems['sub'][$items->ID])
		{
			$subs = GetSubMenu($items->ID);
			$classname = 'class="aprilista "';
		}
		$outdiv .= '
		<li '.$classname.'><a href="'.$items->url.'">'.$items->title.'</a>'.$subs.'</li>
		';
		//	$out.= $outdiv.' <div class="menu_item m" id="m_'.$i.'"><a href="'.str_replace(ICL_LANGUAGE_CODE.'/'.ICL_LANGUAGE_CODE.'/',ICL_LANGUAGE_CODE.'/',$items->url).'">'.$items->title.'</a>'.$subs.'</div>';
	}
	echo $outdiv;
}
function OutFooterMenu($curentpage="")
{

	Global $MenuItems;
	$i=1;
	foreach($MenuItems['head'] as $items){
		$out .= ' <div class="footer_menu_item m" id="m_'.$i.'"><a href="'.str_replace(ICL_LANGUAGE_CODE.'/'.ICL_LANGUAGE_CODE.'/',ICL_LANGUAGE_CODE.'/',$items->url).'">'.$items->title.'</a></div>';
		$i++;
	}
	echo $out;
}
function sed_mail($fmail, $subject, $body, $headers='', $adminemail=""){
	$cfg['adminemail'] = $adminemail;
	$cfg['maintitle'] = 'haypar.net';
	if(empty($fmail)){return(FALSE);}
	else{
		$headers = (empty($headers)) ? "From: \"".$cfg['maintitle']."\" <".$cfg['adminemail'].">\n"."Reply-To: <".$cfg['adminemail'].">\n"."Content-Type: text/plain; charset=UTF-8 \n" : $headers;
		$body .= "\n\n".$cfg['maintitle']." - ".$cfg['mainurl']."\n".$cfg['subtitle'];
		mail($fmail, $subject, $body, $headers);
		return(TRUE);
	}
}
function getFirstCat($cat)
{
    $parent = get_category($cat);
    if ($parent->parent==0)
    {
        return  $parent->term_id;
         
    }
    else
    {
        return	getFirstCat($parent->parent);
    }
}

function GetFirstChildCat($pid)
{
    $subcats = get_categories('parent='.$pid.'&hide_empty=0&orderby=id&number=1');
    return $subcats[0]->term_id ;
}
function getSubCatMenu($pid,$subcur,$Postid=0)
{
  $subcats = get_categories('parent='.$pid.'&hide_empty=0&orderby=order');
    if ($pid==13)
    {
	    foreach($subcats as $parentcat)
	    {
	        $classname = '';
	        $subItems ='';
	        if ($subcur == $parentcat->term_id )
	        {
	            $subItems = getSubCatMenu($parentcat->term_id,$subcur);
	            $classname = 'class="current"';
	        }
	        $Leftmenu13 .= '<ul><li><a style="font-size:13px; "'.$classname.' href="'.get_category_link( $parentcat->term_id ).'">'.$parentcat->name.'</a></li></ul>
	        ';
	    }
	    $Leftmenu = '<ul><li>'.$Leftmenu13.'</li></ul>
	        ';
    }
  	else{
	    foreach($subcats as $parentcat)
	    {
	        $classname = '';
	        $subItems ='';
	        if ($subcur == $parentcat->term_id && $parentcat->term_id!=13)
	        {
	            $subItems = getSubItems($parentcat->term_id,$Postid);
	            $classname = 'class="current"';
	        }
	        else if ($parentcat->term_id==13 && $subcur==13)
	        {
	            $subItems = getSubCatMenu($parentcat->term_id,$subcur);
	            $classname = 'class="current"';
	        }
	        $Leftmenu .= '<ul><li><a '.$classname.' href="'.get_category_link( $parentcat->term_id ).'">'.$parentcat->name.'</a>'.$subItems.'</li></ul>
	        ';
	    }
  	}
    return $Leftmenu;
}
function get_first_child_linlk($pid)
{
    $subcats = get_categories('parent='.$pid.'&hide_empty=0&orderby=order&number=1');
    return get_category_link( $subcats[0]->term_id ) ;
}
function getSubItems($pid,$Postid)
{
$i=0;
    $posts =  get_posts(array('category'=>$pid,'orderby'=> 'post_date','order'=> 'DESC','posts_per_page'=>-1));
    foreach ($posts as $post)
    {
    $i++;
        $classname = '';
        if ($Postid == $post->ID)
        {
            $classname = 'class="current"';
        }
        $out .= '
        <ul>
        <li>
        <a '.$classname.' href="'.get_permalink($post->ID).'">'.$post->post_title.'</a>
        </li>
        </ul>';
    }
    return $out;
}
function GetOneThumb($pst)
{
    global $wpdb;
    $photossql = "SELECT * FROM wp_postgallery WHERE postid='".$pst."' ORDER By image_order ASC Limit 1";
    $photo = $wpdb->get_results($photossql, OBJECT);
    return $photo[0]->image_location;
}
function HomeNews()
{
	$PostsArray = get_posts(array('numberposts' => 4,'category'=>30,'orderby'=> 'post_date','order'=> 'DESC'));
	foreach ($PostsArray as $PostItem)
	{


		$NewsBigImage =wp_get_attachment_image_src( get_post_thumbnail_id( $PostItem->ID ), "Full");
		$href = get_permalink($PostItem->ID);
		$out .= '
		  <article role="article">
          <a href="'.$href.'"><h2 style="height:22px;width:232px;overflow:hidden;">'.$PostItem->post_title.'</h2></a>
          <div style="width:232px;height:173px;overflow:hidden;"><a href="'.$href.'"><img alt="" src="'.$NewsBigImage[0].'"></a></div>
          <a href="'.$href.'"><p style="width:232px;height:113px;overflow:hidden;">'.$PostItem->post_excerpt.'</p></a>
        </article>
		';
	}
	return $out;
}
?>

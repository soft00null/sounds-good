<?php

if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE); 

require_once('classes/CMySQL.php'); // including service class to work with database

$sCode = '';
$iItemId = (int)$_GET['id'];

   

    $aItems = $GLOBALS['MySQL']->getAll("SELECT * FROM `song` ORDER by `rate` DESC "); // taking info about all items from database

foreach ($aItems as $i => $aItemInfo) 
  {    
    $sid1 =$aItemInfo['singer1'];
    $sid2 =$aItemInfo['singer2'];
    $sid3 =$aItemInfo['composer'];
    $sid4 =$aItemInfo['lyricist'];
    $sid5 =$aItemInfo['album'];
    $sid6 =$aItemInfo['image'];
    $sid7 =$aItemInfo['mpath'];
    $sid8 =$aItemInfo['opath'];
    $sid9 =$aItemInfo['tpath'];
    $sid10=$aItemInfo['title'];
   
   
    $sing=mysql_query("SELECT CONCAT(name,',',name)  FROM singer WHERE id=$sid1 OR id=$sid2");
    $s=mysql_fetch_row($sing);
    
    $comp=mysql_query("SELECT name  FROM composer WHERE id=$sid3");
    $co=mysql_fetch_row($comp);
    
    $lyr=mysql_query("SELECT name  FROM lyricist WHERE id=$sid4");
    $ly=mysql_fetch_row($lyr);
    
    $alb=mysql_query("SELECT name  FROM album WHERE id=$sid5");
    $al=mysql_fetch_row($alb);
    
  //$sCode .= '<h2>'.$aItemInfo['title'].'</h2>';
  //$sCode .= '<h3>'.date('F j, Y', $aItemInfo['when']).'</h3>';
  //$sCode .= '<h3>Singer:'.$s[0].'</h3>';
  //$sCode .= '<h3>Composer:'.$co[0].'</h3>';
  //$sCode .= '<h3>Lyricist:'.$ly[0].'</h3>';
  //$sCode .= '<h3>Album:'.$al[0].'</h3>';
  //$sCode .= '<img width="50"  height="50" src="'.$sid6.'">'; 
    
    // draw voting element
    $iIconSize = 22;
    $iMax = 5;
    $iRate = $aItemInfo['rate'];
    $iRateCnt = $aItemInfo['rate_count'];
    $fRateAvg = ($iRate && $iRateCnt) ? $iRate / $iRateCnt : 0;
    $iWidth = $iIconSize*$iMax;
    $iActiveWidth = round($fRateAvg*($iMax ? $iWidth/$iMax : 0));

    $sVoting = <<<EOS
<div class="votes_main">
    <div class="votes_gray" style="width:{$iWidth}px;">
        <div class="votes_buttons" id="{$iItemId}" cnt="{$iRateCnt}" val="{$fRateAvg}">
            {$sVot}
        </div>
        <div class="votes_active" style="width:{$iActiveWidth}px;"></div>
    </div>
    
</div>
EOS;

$pl=<<<EOS
<div>
<div class="mp_options">
                 	<h3 style="display:none;">{$sid10}</h3>
	         	<span class="mp_play">Play</span>
                <span class="mp_addpl">Add to playlist</span>
                <span class="mp_lyrics">Lyricis</span>
</div>
<div class="mp_song_info" style="display:none;">
   <span class="mp_song_title">{$sid10}</span>
   <span class="mp_mp3">{$sid7}</span>
   <span class="mp_ogg">{$sid8}</span>
    <span class="mp_text">{$sid9}</span>
  
</div>
</div>
EOS;
    //$sCode .= $sVoting;

     $sCode.='<table  class="table"  >
              
            
               <tr >
               <td width="20" height="40"><input type="checkbox" name="files[]" value="'.$sid7.'" /></td>
               <td width="50" height="40"><img width="40" height="40" src="'.$sid6.'"></td>
               <td width="140" height="40">'.$sid10.'</td>
               <td width="80" height="40">'.$pl.'</td>
               <td width="160" height="40">'.$s[0].'</td>
               <td width="110" height="40">'.$co['0'].'</td>
               <td width="120" height="40">'.$ly['0'].'</td>
               <td width="100" height="40">'.$al['0'].'</td>
               <td width="150" height="40">'.$sVoting.'</td>
               
       </div>
             </tr>
            
            </table>';
}
?>





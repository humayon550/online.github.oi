<?php
include ('config.php');
include ('del.php');
include ('geturl.php');
$title=basename($_GET['file']);
$title=str_replace('_',' ',$title);
$title=str_replace($site,'['.$site.']',$title);
$filename=basename($_GET['file']);
$filename=str_replace('_',' ',$filename);
$filename=str_replace('.mp3',' ',$filename);
$filename=str_replace($site,'['.$site.']',$filename);
include ('rep.php');
echo "<title>$title</title>";
$url = $_GET['file'];
$url=str_replace($site,'FusionBD.Com',$url);
$name = basename($_GET['file']);
$name=str_replace('_',' ',$name);
if(!is_dir($dir)){
mkdir($dir,0777);}
$save = $dir.'/'.$title;
$file= $msg.'/'.$url;
if(copy($file,$save))
{if ($voice == 'ON') { file_put_contents(''.$save.'',    file_get_contents(''.$save.'').    file_get_contents('mehedi.mp3')); }
@include ('tag.php');
}
else
{
echo "Could Not Connet To Database...";
}
function friendly_size($size,$round=2){
$sizes=array(' Byts',' KB',' MB',' GB',' TB');
$total=count($sizes)-1;
for($i=0;$size>1024 && $i<$total;$i++){
$size/=1024;
}
return round($size,$round).$sizes[$i];
}
$size = friendly_size(filesize($save));
$filectime=filemtime($save);
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title>'.$site.'</title><link rel="stylesheet" media="handheld" type="text/css" href="'.$css.'"/><link rel="stylesheet" type="text/css" href="<? echo $css; ?>"/></head><body><div class="header"><center><b><? echo $site; ?></b><br/><b>The Place For All Your Mobile Needs!</b></center></div><div class="bmenu"><b>Download Page</b></div><div class="header">-<b>Name:</b> <?=$title?><br/>-<b>Album:</b> <? echo $site; ?><br/>-<b>Artist:</b> <? echo $site; ?><br/>-<b>Genar:</b> <? echo $site; ?><br/>-<b>Size:</b> <?=$size?><br/>-<b>Time:</b> <? echo ''.date('d/m/y H:i',filemtime($save)).''; ?></div><div class="bmenu"><a href="<?=$save?>"><b>Click Here To Download</b></a></div><div class="tmn"><img src="img/home.gif"/><a href="/"> <b>Home</b></a></div><div class="header" align="center">&copy; <? echo $site; ?> 2005-2012</div></body></html>
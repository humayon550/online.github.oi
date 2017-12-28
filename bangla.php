<?php
include ('config.php');
include ('del.php');
$title=basename($_GET['dir']);
$title=str_replace('_',' ',$title);
$title=str_replace('%20',' ',$title);
$title=str_replace('&start=1','',$title);
echo "<title>$title</title><link rel='shortcut icon' href='favicon.ico'/>";
$pranay = (explode("/",$_GET['d']));
$pranayg = end($pranay);
$ch = curl_init();
if($_GET['d'])
{
curl_setopt($ch, CURLOPT_URL, 'http://banglasongs.fusionbd.com/downloads/mp3_index.php?'.$_SERVER['QUERY_STRING'].'');
}
else
{
curl_setopt($ch, CURLOPT_URL, 'http://banglasongs.fusionbd.com/downloads/mp3_index.php?'.$_SERVER['QUERY_STRING'].'');
}
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Language: en-us,en;q=0.7,de-de;q=0.3','Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5'));
$page = curl_exec($ch);
curl_close($ch);
$page = preg_replace("|mp3_index.php|","bangla.php",$page);
$page = preg_replace("|mp3_file.php|","file.php",$page);
$page = preg_replace("|Zipped Full Album|","",$page);
$page = preg_replace("| / |","",$page);
$page = preg_replace("|Service Temporarily Unavailable. Please try again later.|","<center>Server Busy Now. Please Try Again Later.</center>",$page);
$page = preg_replace('|<hr>|','',$page);
$page = preg_replace('|<hr/>|','',$page);
$page = preg_replace('|<div class="bmenu"><b>The tracks are for promotional purposes only. Buy a CD to support the artist.</b></div>|','',$page);
$page = preg_replace("|<div class='bmenu'> - Preview image:|","<div style='display:none'> - Preview image:",$page);
$page = preg_replace("|<div class='header'><b>Back to:</b>|","<div style='display:none'><b>Back to:</b>",$page);
$page = preg_replace('|sort=0|','sort=1',$page);
$page = preg_replace('|FusionBD.Com|',$site,$page);
$page = preg_replace("|<div class='tmn'><font color='red'><b><u>Ads:</u></b></font>|","<div style='display:none'><font color='red'><b><u>Ads:</u></b></font>",$page);
$page = preg_replace('|http://fusionbd.com|','/',$page);
$page = preg_replace('|http://fpages.fusionbd.com/style.css|',$css,$page);
$page = preg_replace('|home.gif|','img/home.gif',$page);
$page = preg_replace('|dot.png|','img/dot.png',$page);
$page = preg_replace('|p=1|','p=0',$page);
$page = preg_replace('|p=2|','p=0',$page);
echo $page;
echo $ads;
?>
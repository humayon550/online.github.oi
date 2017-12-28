<?php
include ('config.php');
include ('del.php');
$page = file_get_contents('http://fusionbd.com');
$page = str_replace('FusionBD.Com',$site,$page);
$page = str_replace('hindisongs.fusionbd.com/downloads/mp3_index.php',''.$site.'/hindi.php',$page);
$page = str_replace('radiospecials.fusionbd.com/index.php',''.$site.'/radio.php',$page);
$page = str_replace('banglasongs.fusionbd.com/downloads/mp3_index.php',''.$site.'/bangla.php',$page);
$page = str_replace('videos.fusionbd.com/index.php',''.$site.'/3gp.php',$page);
$page = str_replace('/ /','',$page);
$page = str_replace('MP4','',$page);
$page = str_replace('PC-HD','',$page);
$page = str_replace('3GP','Download',$page);
$page = str_replace('BdForum.NeT','Face4Book.TK',$page);
$page = str_replace('bdforum.net','face4book.tk',$page);
$page = str_replace("<div class='tmn'>
<font color='red'><b><u>Ads:</u></b></font>","<div style='display:none'>
<font color='red'><b><u>Ads:</u></b></font>",$page);
$page = str_replace('<a class="link" href="/contact/index.php"><b>Contact Admin</b></a>','<a class="link" href="/contact.php"><b>Contact To Admin</b></a>',$page);
$page = str_replace('page.fusionbd.com/bookmark.jar',''.$site.'/bdmehedi.jar',$page);
$page = str_replace('<a class="link" href="promote.html"><b>Promote Your Songs</b></a>','<a class="link" href="/radio.php?sort=1"><b>Bangladeshi Radio Programs</b></a>',$page);
$page = str_replace('<a class="link" href="http://page.fusionbd.com/search.php"><b>Search Engine</b></a>','<a class="link" href="/bangla.php?dir=/bangla&sort=1"><b>Letast Bangla Albums</b></a>',$page);
$page = str_replace('<a class="link" href="http://www.facebook.com/FusionBD"><b>FB Fan Page</b></a>','<a class="link" href="/bangla.php?dir=/kolkata&sort=1"><b>Kolkata Bangla Recent Albums</b></a>',$page);
$page = str_replace('<a class="link" href="http://facebook.com/sharer.php?u=http://fusionbd.com"><b>Share On Facebook</b></a>','<a class="link" href="/hindi.php?dir=/hindi&sort=1"><b>Bollywood Recent Albums</b></a>',$page);
$page = str_replace('<a class="link" href="http://books.fusionbd.com"><b>eBooks</b></a>','<a class="link" href="/bangla.php?dir=/bangla&sort=0"><b>Bangla a2z Songs</b></a>',$page);
$page = str_replace('<a class="link" href="http://page.fusionbd.com/mp3.html"><b>MP3 Songs</b></a>','<a class="link" href="/bangla.php?dir=/kolkata&sort=0"><b>Kolkata Bangla a2z Songs</b></a>',$page);
$page = str_replace('<a class="link" href="http://BdMehedi.TK/radio.php?sort=1&p=1"><b>Radio Specials</b></a>','<a class="link" href="/hindi.php?dir=/hindi&sort=0"><b>Bollywood a2z Songs</b></a>',$page);
$page = str_replace('<a class="link" href="http://page.fusionbd.com/3gpvideos.html"><b>Download Video</b></a>','<a class="link" href="/3gp.php?dir=/Bangla_Music_Videos&sort=1&p=1"><b>3GP Bangla Music Videos</b></a>',$page);
$page = str_replace('<a class="link" href="http://mp4BdMehedi.TK/3gp.php?dir=320x240_Pixels&sort=1&p=1"><b> Video</b></a>','<a class="link" href="/3gp.php?dir=/Kolkata_Bangla_Movie_Songs&sort=1&p=1"><b>3GP Kolkata Movie Videos</b></a>',$page);
$page = str_replace('<a class="link" href="http://mp4BdMehedi.TK/3gp.php?dir=/1080x720_Pixels-HD&p=1&sort=1"><b> Video</b></a>','<a class="link" href="/3gp.php?dir=/Bollywood_Promo_Videos&sort=1&p=1"><b>3GP Bollywood Promo Videos</b></a>',$page);
$page = str_replace('<a class="link" href="http://page.fusionbd.com/banglanatok2.php"><b>Bangla Natok And Telefilms</b></a>','<a class="link" href="/3gp.php?dir=/Bollywood_Movie_Songs-Old&sort=1&p=1"><b>3GP Bollywood Movie Videos-Old</b></a>',$page);
$page = str_replace('<a class="link" href="http://mtube.fusionbd.com"><b>YouTube Video Downloader</b></a>','<a class="link" href="http://mtube.'.$site.'"><b>YouTube Videos Downloader</b></a>',$page);
$page = str_replace("href='http://fusionbd.com'>Home</a>","href='/'>Home</a>",$page);
$page = str_replace("<img src='http://fpages.fusionbd.com/home.gif' alt=''/>","<img src='/img/home.gif' alt='.'/>",$page);
$page = str_replace('m.facebook.com/FusionBD','m.facebook.com/bdmehedi25',$page);
$page = str_replace('<a class="link" href="http://sms.fusionbd.com"><b>SMS Messages</b></a>','<a class="link" href="http://fb.com/findmehedi"><b>Facebook Fan Page</b></a>',$page);
$page = str_replace('<a class="link" href="http://storage.fusionbd.com"><b>Store Your Files Online</b></a>','<a class="link" href="http://facebook.com/sharer.php?u=http://bdmehedi.tk"><b>Shere On Facebook</b></a>',$page);
$page = str_replace('http://page.fusionbd.com/banglanatok2.php','/',$page);
$page = str_replace('mtube.fusionbd.com','mtube.'.$site.'',$page);
$page = str_replace('http://fpages.fusionbd.com/style1.css',$css,$page);
$page = preg_replace("|Service temporarily unavailable. Please try again later|","<center>Server Busy Now. Please Try Again Later.</center>",$page);
echo $page;
echo $ads;
?>
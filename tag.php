<?php
include ('config.php');
$mp3_tagformat = 'UTF-8';

require_once('getid3/getid3.php');
$mp3_handler = new getID3;
$mp3_handler->setOption(array('encoding'=>$mp3_tagformat));
require_once('getid3/write.php');


$mp3_writter = new getid3_writetags;
$mp3_writter->filename       = $save;




$mp3_writter->tagformats     = array('id3v1', 'id3v2.3');
$mp3_writter->overwrite_tags = true;
$mp3_writter->tag_encoding   = $mp3_tagformat;
$mp3_writter->remove_other_tags = true;


$mp3_data['title'][]   = ''.$filename.'';
$mp3_data['artist'][]  = $site;
$mp3_data['album'][]   = $site;
$mp3_data['year'][]    = '2014';
$mp3_data['genre'][]   = $site;
$mp3_data['comment'][] = 'Various Audio Album Available on '.$site.'';
$mp3_data['track'][]    = $site;

$mp3_data['attached_picture'][0]['data'] = file_get_contents($albumimg);
$mp3_data['attached_picture'][0]['picturetypeid'] = "image/jpeg";
$mp3_data['attached_picture'][0]['description'] = "Mp3 Image";
$mp3_data['attached_picture'][0]['mime'] = "image/jpeg";



$mp3_writter->tag_data = $mp3_data;

$mp3_writter->WriteTags();
?>

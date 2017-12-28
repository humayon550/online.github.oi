<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><title>Contact Us</title><style>body{margin:0px;padding:2px;}input[type=text]{width:95%}textarea{width:95%}</style></head><body><?php
function mime_content_type_($filename)
{
$mime = array(
'.3dmf' => 'x-world/x-3dmf',
'.a' => 'application/octet-stream',
'.aab' => 'application/x-authorware-bin',

//[... i have to cut, the text is too long :/ ..]
/// add the one you need like jar,jad... etc
'.xwd' => 'image/x-xwd',
'.xyz' => 'chemical/x-pdb',
'.z' => 'application/x-compressed',
'.zip' => 'application/x-zip-compressed',
'.zoo' => 'application/octet-stream',
'.zsh' => 'text/x-script.zsh',
);
return $mime[strrchr($filename, '.')];
}
?>
<?php
$nr=0; // nr of attachments
if(!$_POST['vmi']) {
print "<form action='?' method='post'>
<div class='list1'><b>Your E-mail:</b><br/><input type='text' name='y' value='@'></div><div class='list2' style='display:none'><b>Send To:</b><br/><input type='text' name='t' value='addmehedi@gmail.com'></div><div class='list1' style='display:none'><b>Subject:</b><br/><input type='text' name='s' value='BdMehedi.TK Help Center'></div>";
for($i=1;$i<=$nr;$i++){
echo "<div class='list2'><b>Attachment:</b><br/><input name='at[]' value='http://' type='text'></div>";}
echo "<div class='list1'><b>Your Text:</b><br/><textarea name='m' rows='7' cols=''></textarea>
</div><div class='list2' align=''><input type='submit' name='vmi' value='Send Text'></div>
</form>";
} else {
if(!preg_match("/[a-zA-Z0-9-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/",$_POST['y'])) die('invalid email');
if(!preg_match("/[a-zA-Z0-9-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/",$_POST['t'])) die('invalid email');
if($_POST['s']=='' || $_POST['m'] =='') die('all fiels requierd');
$b=$_POST['m'];
$to=$_POST['t'];
$from=$_POST['y'];
$subject=$_POST['s'];
$mime_boundary="==Multipart_Boundary_x".md5(mt_rand())."x";
// now we'll build the message headers
$headers = "From: $from\r\n" .
"MIME-Version: 1.0\r\n" .
"Content-Type: multipart/mixed;\r\n" .
" boundary=\"{$mime_boundary}\"";
$message=$b;
$message = "This is a multi-part message in MIME format.\n\n" .
"--{$mime_boundary}\n" .
"Content-Type: text/plain; charset=\"iso-8859-1\"\n" .            "Content-Transfer-Encoding: 7bit\n\n" .
$message . "\n\n";
// now we'll process our uploaded files
foreach($_POST['at'] as $d){
$f=array_reverse(explode('/',$d));
$f=$f[0];
if($f !=''){
$tmp="tmp/".$f;
if(copy($d,$tmp)) {
$file = fopen($tmp,'rb');
$data = fread($file,filesize($tmp));
fclose($file);
$data = chunk_split(base64_encode($data));
$type=mime_content_type_($tmp);
$name=$f;$message .= "--{$mime_boundary}\n" .                  "Content-Type: {$type};\n" .
" name=\"{$name}\"\n" .
"Content-Disposition: attachment;\n" .
" filename=\"{$name}\"\n" .
"Content-Transfer-Encoding: base64\n\n" .
$data . "\n\n";

$eee[]=$tmp;
}}}
$message.="--{$mime_boundary}--\n";

if (@mail($to, $subject, $message, $headers)){echo"<center>Your Text Successfully Send. We Are Replay You After 24 Hours.</center>";}else {echo "error";}

foreach ($eee as $e){
unlink($e);
}
}
?></body></html>
<?php
foreach(glob("./files/*") as $file){
unlink($file);
}
foreach(glob("./m/data/*") as $file){
unlink($file);
}
?>
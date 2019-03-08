<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "Mick Mouse\r\n";
fwrite($myfile, $txt);
$txt = "Mini Mouse\r\n";
fwrite($myfile, $txt);
fclose($myfile);
?>
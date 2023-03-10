<?php

extract($_POST);
$myfile = fopen("./register.txt", "w") or die("Unable to open file!");
fwrite($myfile, implode(', ', $_POST));
fclose($myfile);
?>
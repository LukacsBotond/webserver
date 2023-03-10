<?php

extract($_POST);
$myfile = fopen("./testfile.txt", "w") or die("Unable to open file!");
if (isset($_POST['submit'])) {
    fwrite($myfile, "succ");
    fclose($myfile);
}
else{
    fwrite($myfile, "failure");
    fclose($myfile);
}


?>
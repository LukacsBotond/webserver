<?php

extract($_POST);
$myfile = fopen("./testfile.txt", "w") or die("Unable to open file!");
if (isset($_POST['submit'])) {
    fwrite($myfile, implode("", $_POST));
} else {
    fwrite($myfile, "failure");
}
fclose($myfile);
?>
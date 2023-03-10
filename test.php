<?php

extract($_POST);
$myfile = fopen("./testfile.txt", "w") or die("Unable to open file!");
if (isset($_POST['submit'])) {
    $txt = "John Doe\n";
    fwrite($myfile, $txt);
    $txt = "Jane Doe\n";
    fwrite($myfile, $txt);
    fclose($myfile);
}
else{
    fclose($myfile);
}


?>
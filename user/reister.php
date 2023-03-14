<?php

extract($_POST);

fwrite($myfile, implode(', ', $_POST));
fclose($myfile);
?>
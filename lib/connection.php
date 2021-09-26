<?php

    $db = mysqli_connect('localhost','root','','zoo');
    if (!$db){
        echo "connection failed";
    }
    error_reporting(0);

?>
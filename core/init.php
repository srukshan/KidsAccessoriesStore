<?php

    $database = new mysqli("localhost","root","","store_data");

    //check Connection
    if(mysqli_connect_errno()){
        echo "The MySQL SERVER is down. Please try again later!".mysql_connect_error();
        die();
    }

    define('BASEURL','/KidsAccessoriesStore/');


?>
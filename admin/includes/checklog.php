<?php
    session_start();
    if(isset($_COOKIE['username'])){
        $_SESSION['username'] = $_COOKIE['username'];
        $_SESSION['auth_level'] = $_COOKIE['auth_level'];
        goto welcome;
    }
    else{
        if(isset($_SESSION['username']))
        goto welcome;
        else
        {
            header("Refresh:0; url='http://localhost/KidsAccessoriesStore/admin/login.php'");
            die();
        }
    }
    welcome:
?>
<?php
    session_start();
    $mttime = time();
    header("Refresh:500; url=$_SERVER[PHP_SELF]?$mttime");

    include('includes/data.php');

    if(isset($_GET['reset'])&&$_GET['reset']==true){
        session_destroy();
        $thispage = getPage();
        header("Refresh:0; url=$_SERVER[PHP_SELF]");
    }
    
    function log_details(){
        $thispage = getPage();
        if(!(($thispage == 4)||($thispage == 5))){
            echo "Welcome ";
            if(isset($_SESSION['username'])&&$_SESSION['username']!='Guest'){
                echo '<a class="nav-user-a" href="index.php?page=3">'.$_SESSION['username'].'</a>, <a class="nav-a" href="index.php?page='.$thispage.'&reset=true">Log Out</a>';
            }else{
                echo 'Guest, <a id="login" class="nav-a" href="login.php">Login</a> <a class="nav-a" href="register.php">Register</a> ';
            }
        }
        echo '<a class="nav-user-a" href="cart.php"> <img src="img/icons/Cart-Icon.png" alt="Cart" style="position:relative;width:60px;height:auto"></a> <a class="nav-user-a" href="neareststore.php"><img src="img/icons/location-icon.png" alt="Find Nearest Store" style="position:relative;width:60px;height:auto"></a>';
    }

    function title(){
        $s = getPage();
        return "Kid's Universe - $s";
    }

    function getPage(){
        $path = $_SERVER['PHP_SELF'];
        $path = basename($path,".php");

        switch($path){
            case 'index':
            return 'Home';
            case 'login':
            return 'Login';
            case 'register':
            return 'Registration';
            case 'search':
            return 'Search Results for '.$_GET['search'];
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo title(); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <script src="js/index-main.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/index-main.css?<?php echo time(); ?>" />
    </head>
    <body>
        <div class="wrapper">
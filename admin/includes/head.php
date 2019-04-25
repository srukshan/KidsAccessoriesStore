<?php
    function log_details(){
        echo "Welcome Sir, ";
        echo '<a class="nav-user-a" href="index.php?page=3">'.$_SESSION['username'].'</a>, <a class="nav-a" href="index.php?reset=true">Log Out</a>';
    }

    if(isset($_GET['reset'])&&$_GET['reset']==true){
        session_destroy();
        header("Refresh:0; url=$_SERVER[PHP_SELF]");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin - Kid's Accesories</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <script src="../js/index-main.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../css/index-main.css?<?php echo time(); ?>" />
    </head>
    <body>
    <div class="wrapper">
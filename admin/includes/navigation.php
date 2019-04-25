<nav class="navbar navbar-fixed-top">
    <nav class="in-in-nav">
        <a href="index.php"><h3 class="head">Kid's Universe</h3></a>
        <a href="items.php"><button class="dropdown-btn">Items</button></a>
            <!-- <div class="nav-dropdown">
                <a href="#"><button class="dropdown-btn">name v</button></a>
                <div class="dropdown-content">
                        <a href="#"></a>
                </div>
            </div> -->
        <div class="nav-log"><?php
        $path = $_SERVER['PHP_SELF'];
        $path = basename($path,".php");
        if($path != 'login')
        log_details(); ?></div>
    </nav>
</nav>
<div class="csection left-align">
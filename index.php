<?php 
    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/navigation.php'; 
    include 'includes/headerfull.php';
?>
<div class="middle">
<aside class="side-left">
    <?php 
        for($j=1;$j<=3;$j++){
            echo '<div class="sidelist" id="side-left">';
            include("includes/ads.php");
            $_SESSION['promo']['prev']=$visited;
        } 
        $_SESSION['promo']['prev']=0;
    ?>
</aside>
<section>
<object width="700" height="400">
    <param name="movie" value="slideshow.swf">
    <embed src="slideshow.swf" width="700" height="400">
    </embed> 
</object>
<?php //include 'includes/slideshow.php'; ?>
    <div class="search"><?php require("includes/search.php"); ?></div>
    <div class="realBody">
        <?php
            $count=1;
            for($i=0;$i<9;$i++){
                echo '<div class="itemslist">';
                $_SESSION['item']['type']="popu";
                include('includes/item.php');
                $_SESSION['item']['prev']=$visited;
                echo '</div>';
            }
            $_SESSION['item']['prev']=0;
        ?>
    </div>
</section>
<aside class="side-right" id="side-right">
    <?php 
        for($j=1;$j<=3;$j++){
            echo '<div class="sidelist" id="side-left">';
            include("includes/ads.php");
            $_SESSION['promo']['prev']=$visited;
        } 
        $_SESSION['promo']['prev']=0;
    ?>
</aside>
</div>
<style>footer{top:1400px;}</style>
<?php include 'includes/footer.php'; ?>
            
        
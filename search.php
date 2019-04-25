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
    <div class="search"><?php require("includes/search.php"); ?></div>
    <div class="realBody">
        <?php
            if(isset($_GET['search'])){
                $search = $_GET['search'];
                if($search==""){
                    echo 'You are searching for a null value! Please Re-enter Search Criteria';
                    goto search_end;
                }
                echo "<h1>Search Results For ".$search."</h1><hr>";
                $sql = "SELECT DISTINCT item_id FROM item WHERE keywords REGEXP '$search' OR description REGEXP '$search' OR keywords LIKE '%$search%' OR description LIKE '%$search%'";
                $itemslist = $database->query($sql);

                $count = 0;
                while($item = mysqli_fetch_assoc($itemslist)) {

                    echo '<div class="itemslist">';
                    $_SESSION['item']['type'] = "search";
                    $_SESSION['item']['id'] = $item['item_id'];
                    include('includes/item.php');
                    echo '</div>';
                    $count++;
                    if($count==12)
                        break;
                }
            }
            unset($_SESSION['item']['type']);
            unset($_SESSION['item']['id']);
            search_end:
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
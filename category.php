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
                if(isset($_GET['id']) && isset($_GET['parent'])){
                    $id = $_GET['id'];
                    $sql = "SELECT `name` FROM category WHERE cat_id=$id";
                    $itemslist = $database->query($sql);
                    $item = mysqli_fetch_assoc($itemslist);
                    $name = $item['name'];
                    echo "<h1>Category - $name</h1><hr>";
                    $sql = "SELECT item.item_id FROM item,category WHERE category.cat_id=item.cat_id AND (item.cat_id=$id OR category.parent_id=$id)";
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
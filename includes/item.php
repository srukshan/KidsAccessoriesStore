<?php
    if($_SESSION['item']['type']=="popu"){
        if(!isset($_SESSION['item']['prev']) || $_SESSION['item']['prev']==0){
            $visited = 0;
        }else{
            $visited = $_SESSION['item']['prev'];
        }
        $visited++;
        $sql = "SELECT item.item_id AS 'id', image.image_url AS 'url', item.title AS 'title', item.price AS 'price' FROM item, image WHERE image.image_id = item.img_id ORDER BY item.price DESC";
        $list = $database->query($sql);
        $count = 1;
        while($list_row = mysqli_fetch_assoc($list)){
            if($count == $visited){
                echo '<img 
                    src="'.$list_row['url'].'" 
                    alt="'.$list_row['title'].'"
                    style="height: 200px; width:auto" /><br />';
                echo '<h4 style="margin-top:0px; margin-bottom:4px">'.$list_row['title'].'</h4>';
                echo '<div style="color:red">List Price : <s>$ '.$list_row['price'].'</s></div>';
                echo '<div>Our Price : $ '.round($list_row['price']*0.95,3).'</div>';
                echo '<button type="button" class="item_details" onclick="detailsModal('.$list_row['id'].')">Details</button>';
                break;
            }
            $count++;
        }
    }
    else if($_SESSION['item']['type']=="search"){
        if(isset($_SESSION['item']['id'])){
            $sql = "SELECT item.item_id AS 'id', image.image_url AS 'url', item.title AS 'title', item.price AS 'price' FROM item, image WHERE image.image_id = item.img_id HAVING item.item_id=".$_SESSION['item']['id'];
            $list = $database->query($sql);
            $list_row = mysqli_fetch_assoc($list);
            echo '<img 
                    src="'.$list_row['url'].'" 
                    alt="'.$list_row['title'].'"
                    style="height: 200px; width:auto" /><br />';
            echo '<h4 style="margin-top:0px; margin-bottom:4px">'.$list_row['title'].'</h4>';
            echo '<div style="color:red">List Price : <s>$ '.$list_row['price'].'</s></div>';
            echo '<div>Our Price : $ '.round($list_row['price']*0.95,3).'</div>';
            echo '<button type="button" class="item_details" onclick="detailsModal('.$list_row['id'].')">Details</button>';
        }
    }
?>
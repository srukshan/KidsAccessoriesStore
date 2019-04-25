<?php
    if(!isset($_SESSION['promo']['prev']) || $_SESSION['promo']['prev']==0){
        $visited = 0;
    }else{
        $visited = $_SESSION['promo']['prev'];
    }
    $visited++;

    $sql2 = "SELECT promotion.promo_id AS 'id', image.image_url AS 'url', promotion.name AS 'name', promotion.desc AS 'desc' FROM promotion, image WHERE image.image_id = promotion.image_id";
    $promolist = mysqli_query($database,$sql2);
    $count = 1;
    while($promolist_row = mysqli_fetch_assoc($promolist)){
        if($count == $visited){
            echo '<img 
                src="'.$promolist_row['url'].'" 
                alt="'.$promolist_row['name'].'"
                style="height: auto; width:250px" /><br />';
                break;
            /* echo '<div class="card" style="width: 250px;">
                  <img style="height: auto; width:250px" class="card-img-top" src="'.$promolist_row['url'].'" alt="'.$promolist_row['name'].'">
                  <div class="card-body">
                  <p class="card-text">'.$promolist_row['desc'].'</p>
                  </div>
                  </div>'; */
        }
        $count++;
    }
?>
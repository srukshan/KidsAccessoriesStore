<?php

    $sql = "SELECT * FROM category WHERE parent_id=0";
    $qresult = $database->query($sql);

?>

<nav class="navbar navbar-fixed-top">
        <nav class="in-in-nav">
            <a href="index.php"><h3 class="head">Kid's Universe</h3></a>
            <?php while($parent = mysqli_fetch_assoc($qresult)) : 
                $parent_id = $parent['cat_id'];
                $sql2 = "SELECT * FROM category WHERE parent_id=$parent_id";
                $cresult = $database->query($sql2);
            ?>
                <div class="nav-dropdown">
                    <a href="category.php?id=<?=$parent['cat_id']?>&parent=0"><button class="dropdown-btn"><?php echo $parent['name']; ?> v</button></a>
                    <div class="dropdown-content">
                        <?php
                            while($parent_sub = mysqli_fetch_assoc($cresult)){
                        ?>
                            <a href="category.php?id=<?=$parent_sub['cat_id']?>&parent=<?=$parent_sub['parent_id']?>"><?php echo $parent_sub['name']; ?></a>
                        <?php } ?>
                    </div>
                </div>
            <?php endwhile; ?>
            <div class="nav-log"><?php log_details(); ?></div>
        </nav>
</nav>
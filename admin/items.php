<?php
    require 'includes/checklog.php';
    require_once '../core/init.php';
    include 'includes/head.php';
    include 'includes/navigation.php';
    include 'includes/editItems.php';

    function getcat($cat){
        global $database;
        $sql="SELECT * FROM category WHERE cat_id=$cat";
        $list = $database->query($sql);
        $list = mysqli_fetch_assoc($list);
        $child = $list['name'];
        $parent = $list['parent_id'];
        $sql="SELECT * FROM category WHERE cat_id=$parent";
        $list = $database->query($sql);
        $list = mysqli_fetch_assoc($list);
        $parent = $list['name'];
        $str = $parent."~".$child;
        return $str;
    }

    function getgender($gen){
        switch($gen){
            case 'm' : return "Male";
            case 'f' : return "Female";
            case 'u' : return "Unisex";
        }
    }
?>

<?php

if(isset($_GET['edit'])){
    if($id = $_GET['edit']){
        if(!checkitemvalid($id)){
            header("Refresh:0; url=$_SERVER[PHP_SELF]");
        }
        else{
            header("Refresh:4; url=$_SERVER[PHP_SELF]");
        }
    }
}
else if(isset($_GET['add'])){?>



<?php }else{

?>

<h2 class="text-center">Items</h2> 

<a href="items.php?add=1" class="btn btn-success pull-right pull-up" id="add-item-btn">Add Item</a>

<?php
    $sql = "SELECT `item_id` AS 'id', `title`, `price`, `quantity`, `gender`, `size`, `cat_id` AS 'category', `description` AS 'description' FROM `item`";
    $result = $database->query($sql);
?>

<table class="table table-bordered table-striped">
    <thead><th style="width:50px">ID</th><th style="width:300px">Title</th><th>Price</th><th>Quantity</th><th>Gender</th><th>Size</th><th>Category</th><th style="width:270px">Description</th><th style="width:70px"></th></thead>
    <tbody>
        <?php while($list = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?=$list['id']?></td>
            <td><?=$list['title']?></td>
            <td><?=$list['price']?></td>
            <td><?=$list['quantity']?></td>
            <td><?=getgender($list['gender'])?></td>
            <td><?=$list['size']?></td>
            <td><?=getcat($list['category']);?></td>
            <td><?=$list['description']?></td>
            <td><a href="items.php?edit=<?=$list['id']?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a> <a href="items.php?delete=<?=$list['id']?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

    <?php } include 'includes/footer.php'; ?>
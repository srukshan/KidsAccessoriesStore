<?php 
require_once '../core/init.php';
$id = $_POST['id'];
$id = (int)$id;
$sql = "SELECT `item`.`item_id`,`item`.`title`,`item`.`price`, `item`.`quantity`, `item`.`size`, `item`.`description`, `image`.`image_url` FROM `item`,`image` WHERE `image`.`image_id`=`item`.`img_id` AND `item`.`item_id`='$id'";
$result = $database->query($sql);
$item = mysqli_fetch_assoc($result);

ob_start(); ?>
<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" onclick="closeModal()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" >&times;</span>
                </button>
                <h4 class="modal-title text-center"><?php echo $item['title']; ?></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="center-block">
                                <img src="<?php echo $item['image_url']?>" alt="<?php echo $item['title']?>" style="height:450px" class="details img-responsive">
                            </div>
                        </div>
                        <div style="text-align:left" class="col-sm-6">
                            <h4>Details</h4>
                            <div style="height:200px"><p style="height=200px"><?php echo $item['description'] ?></p></div>
                            <hr>
                            <p>Price: $<?php echo round($item['price'],3);?></p>
                            <p>Size: <?php echo $item['size'] ?></p>
                            <form action="add_cart.php" method="post">
                                <div class="form-group">
                                    <div class="col-xs-3">
                                        <label for="quantity">Quantity:</label>
                                        <input type="text" class="form-control" name="quantity" id="quantity">
                                    </div><div class="col-xs-9"></div>
                                    <p><br> Available : <?php echo $item['quantity'] ?></p>
                                </div><br><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" onclick="closeModal()" data-dismiss="modal">Close</button>
                <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button>
            </div>
        </div>
    </div>
</div>
<script>
    function closeModal(){
        jQuery('#details-modal').modal('hide');
        setTimeout(function() {
            jQuery('#details-modal').remove();
            jQuery('.modal-backdrop').remove();
        }, 500);
    }
</script>
<?php echo ob_get_clean(); ?>
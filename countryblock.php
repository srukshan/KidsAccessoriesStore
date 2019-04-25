<?php 
    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/navigation.php'; 
    include 'includes/headerfull.php';
    header("Refresh:3; url='http://localhost/KidsAccessoriesStore'");
?>

<div class="csection regdiv">

<h3><?=$_GET['page']?></h3><hr>

<p>We are sorry for the inconvenience. But this part of the site is not yet available for your Country.</p>
<p>You will be redirected to the Home page in a moment.</p>

<?php include 'includes/footer.php'; ?>
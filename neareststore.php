<?php 
    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/navigation.php'; 
    include 'includes/headerfull.php';
?>
            <div class="csection">

            <h3>Find Your nearest Store</h3><hr>

            <div id="map"></div>

            <script>
            function initMap() {
            var uluru = {lat: 6.9114714, lng: 79.872};
            var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru
            });
            var marker = new google.maps.Marker({
            position: uluru,
            map: map
            });
            }
            </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSl3YdnFqFzgG2hX-DC1qOq68Qm1S46FU&callback=initMap">
    </script>

    <?php include 'includes/footer.php'; ?>
            </div>
            <footer>
                <div class="footer-one">
                    <a href="neareststroe.php">Store Locator</a><br>
                    <a href="countryblock.php?page='Track your order'">Track your order</a><br>
                    <a href="countryblock.php?page='Gift Cards'">Gift Cards</a><br>
                    <a href="countryblock.php?page='Gift Service'">Gift Services</a><br>
                    <a href="countryblock.php?page='Shipping Service'">Shipping Services</a><br>
                    <a href="countryblock.php?page='Returns'">Returns</a><br>
                    <a href="countryblock.php?page='Our Company'">Our Company</a><br>
                    <a href="admin">Admin</a>
                </div>
                <div class="footer-bar">@All Copyrights Reserved by Kid's Universe 2015 - 2017</div>
            </footer>
        </div>
        <script>
            setInterval(function(){
                var scrolltop;
                scrolltop = window.pageYOffset || document.documentElement.scrollTop;
                var logo = document.getElementById("headerLogo");
                logo.style.transform = "translate(0px, "+(scrolltop-35)/2+"px)";
                var side = document.getElementById("side-right");
                var side2 = document.getElementById("side-left");
                console.log(scrolltop);
                if(scrolltop<=185){
                    side.style.transform = "translate(0px, 0px)";
                    side2.style.transform = "translate(0px, 0px)";
                }
                if(scrolltop>185 && scrolltop<900){
                    side.style.transform = "translate(0px, "+(scrolltop-185)+"px)";
                    side2.style.transform = "translate(0px, "+(scrolltop-185)+"px)";
                }
                if(scrolltop>900){
                    side.style.transform = "translate(0px, 730px)";
                    side2.style.transform = "translate(0px, 730px)";
                }
            }, 5);

            function detailsModal(id){
                var data = {"id" : id}
                jQuery.ajax({
                    url : <?=BASEURL;?>+'includes/details_modal.php',
                    method : "post",
                    data : data,
                    success: function(data){
                        jQuery('body').append(data);
                        jQuery('#details-modal').modal('toggle');
                    },
                    error: function(){
                        alert("Something Went Wrong!")
                    }
                })
            }
        </script>
    </body>
</html>
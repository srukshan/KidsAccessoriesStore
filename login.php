<?php 
    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/navigation.php'; 
    include 'includes/headerfull.php';

    if(isset($_GET['logout'])) logout();

    if(isset($_GET['logcancel'])) log_cancel();

    function logout(){
        session_destroy();
        header("Refresh:0; url=$_SERVER[PHP_SELF]");
    }

    function log_cancel(){
        header("Refresh:0; url=http://localhost/KidsAccessoriesStore");
    }
?>
            <div class="csection">
<?php
    if(isset($_SESSION['username']) && ($_SESSION['username']!='')){?>
                <p>You are already logged in as <?=$_SESSION['username']?>, you need to log out before logging in as different user</p>
                <a class="btn btn-sm btn-my" href="login.php?logout=1">Log out</a><a class="btn btn-sm btn-my" href="login.php?logcancel=1">Cancel</a>
<?php }
    else if(isset($_REQUEST['pr'])){pass: ?>
                <script>document.title="Kid's Universe - Reset Password"</script>
                <h3>Password Reset</h3><hr>
                <form action="login.php" method="post">
                    <table style = "margin-left:auto;margin-right:auto;text-align:left">
                        <tr><td>User Name</td><td><input type="text" name="username" id="username" placeholder="User Name" class="log_text"></td></tr>
                        <tr><td>Key</td><td><input type="password" name="key" id="key" placeholder="Key" class="log_text"></td></tr>
                        <tr><td></td><td><input type="submit" value="Reset Password" class="log_btn" style="width:140px"> Want to go back? <a href="login.php">Login</a>
                    </table>
                    <br> Don't have an Account? <a href="register.php">Register</a>
                </form>
<?php
}
else if((isset($_POST['key'])&&(isset($_POST['username'])))){
    $sql = "SELECT * FROM `user`";
    $result = $database->query($sql);

    while($user=mysqli_fetch_assoc($result)){
        $myuser = $user['username'];
        if($_POST['username'] == $user['username']){
            if($_POST['key'] == $user['user_key']){ ?>

                <script>document.title="Kid's Universe - Reset Password"</script>
                <h3>Password Reset</h3><hr>
                <form action="login.php?username=<?=$myuser?>" method="post">
                    <table style = "margin-left:auto;margin-right:auto;text-align:left">
                        <tr><td>User Name</td><td><input type="text" name="username" id="username" placeholder="User Name" class="log_text"></td></tr>
                        <tr><td>New password</td><td><input type="password" name="pass" id="pass" placeholder="Password" class="log_text"></td></tr>
                        <tr><td>Confirm Password</td><td><input type="password" name="cpass" id="cpass" placeholder="Confirm Password" class="log_text"></td></tr>
                        <tr><td></td><td><input type="submit" value="Reset Password" class="log_btn" style="width:140px">
                    </table>
                </form>
            <?php
                break;
            }
        }
    }
    if($user==0){
        echo '<script>alert("The user name and key you entered did not match with our database")</script>';
        header("Refresh:0; url='http://localhost/KidsAccessoriesStore/login.php?pr=t");
    }
}
else if((isset($_POST['password'])&&(isset($_POST['username'])))){
    $sql = "SELECT * FROM `user`";
    $result = $database->query($sql);

    while($user=mysqli_fetch_assoc($result)){
        if($_POST['username'] == $user['username']){
            if($_POST['password'] == $user['password']){
                $_SESSION['username'] = $user['username'];
                $_SESSION['auth_level'] = $user['auth_level'];
                header("Refresh:0; url='http://localhost/KidsAccessoriesStore/index.php'");
            }
            else{
                echo '<script>alert("The user name or password entered did not match with our database")</script>';
                header("Refresh:0; url='http://localhost/KidsAccessoriesStore/login.php");
            }
        }
    }
    if($user==0 && !isset($_SESSION['auth_level'])){
        echo '<script>alert("The user name or password entered did not match with our database")</script>';
        header("Refresh:0; url='http://localhost/KidsAccessoriesStore/login.php");
    }
}
else if((isset($_POST['pass'])&&(isset($_POST['cpass'])))){
    if($_POST['pass']==$_POST['cpass']){
        $pass=$_POST['cpass'];
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            $sql = "SELECT * FROM user WHERE username='$username'";
            $data = $database->query($sql);
            $user = mysqli_fetch_assoc($data);
            if($user['username']){
                $sql = "UPDATE user SET password = '$pass' WHERE username = '$username'";
                $database->query($sql);
            }
            else{
                echo '<script>alert("Ops! Something really went Wrong. Try again Later!")</script>';
            }
            unset($_POST['pass']);
            unset($_POST['cpass']);
            unset($_POST['username']);
            
            goto login;
        }else{
            echo '<script>alert("The user name entered did not match with our database")</script>';
            header("Refresh:0; url='http://localhost/KidsAccessoriesStore/login.php");
        }
    }else{
        echo '<script>alert("Ops! Your Passwords Do not match. Try again Later!")</script>';
        goto pass;
    }
}
else
{
    login:?>
                <h3>Login</h3><hr>
                <form action="login.php" method="post">
                    <table style = "margin-left:auto;margin-right:auto;text-align:left">
                        <tr><td>User Name</td><td><input type="text" name="username" id="username" placeholder="User Name" class="log_text"></td></tr>
                        <tr><td>Password</td><td><input type="password" name="password" id="password" placeholder="Password" class="log_text"></td></tr>
                        <tr><td></td><td><input type="submit" value="Login" class="log_btn"> <a href="login.php?pr=t">Forgot Password?</a>
                    </table>
                    <br> Don't have an Account? <a href="register.php">Register</a>
                </form>
<?php
}?>
            </div>
            <?php include 'includes/footer.php'; ?>
    </body>
</html>
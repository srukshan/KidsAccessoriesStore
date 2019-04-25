<?php 
require_once '../core/init.php';
include 'includes/head.php';

if(isset($_GET['logout'])) logout();

if(isset($_GET['logcancel'])) log_cancel();

function logout(){
    header("Refresh:0; url=$_SERVER[PHP_SELF]");
    if(session_status()){
        session_start();
    }
    session_destroy();
}

function log_cancel(){
    header("Refresh:0; url='http://localhost/KidsAccessoriesStore/admin'");
}
?>
        <div class="log_section">
<?php
session_start();

if(isset($_SESSION['username'])){
    if(($_SESSION['auth_level']==160421) || ($_SESSION['auth_level']==161042)){ ?>
            <p>You are already logged in as <?=$_SESSION['username']?>, you need to log out before logging in as different user</p>
            <a class="btn btn-sm btn-my" href="login.php?logout=1">Log out</a><a class="btn btn-sm btn-my" href="login.php?logcancel=1">Cancel</a>
<?php }}
if(isset($_POST['pass']) && isset($_GET['username'])){
    if($_POST['pass']==$_POST['cpass']){
        $mypass=$_POST['pass'];
        $myname=$_GET['username'];
        $sql="UPDATE user SET password='$mypass' WHERE username='$myname'";
        $database->query($sql);
        if(mysql_error()){
            die();
        }
    }
}
unset($_POST['pass']);
if(isset($_REQUEST['pr'])){ ?>
            <script>document.title="Kid's Universe - Reset Password"</script>
            <h3>Password Reset</h3><hr>
            <form action="login.php" method="POST">
                <table style = "margin-left:auto;margin-right:auto;text-align:left">
                    <tr><td>User Name</td><td><input type="text" name="username" id="username" placeholder="User Name" class="log_text"></td></tr>
                    <tr><td>Key</td><td><input type="password" name="key" id="key" placeholder="Key" class="log_text"></td></tr>
                    <tr><td></td><td><input type="submit" value="Reset Password" class="log_btn" style="width:140px"> Want to go back? <a href="login.php">Login</a>
                </table>
            </form>
<?php
}
else if((isset($_POST['key'])&&(isset($_POST['username'])))){
$sql = "SELECT * FROM `user`";
$result = $database->query($sql);

while($user=mysqli_fetch_assoc($result)){
    if($_POST['username'] == $user['username']){
        if($_POST['key'] == $user['user_key']){ $_SESSION['username'] = $_POST['username']; ?>
            <script>document.title="Kid's Universe - Reset Password"</script>
            <h3>Password Reset</h3><hr>
            <form action="login.php?user='<?php echo $user['username'] ?>'" method="POST">
                <table style = "margin-left:auto;margin-right:auto;text-align:left">
                    <tr><td>New password</td><td><input type="password" name="pass" id="pass" placeholder="Password" class="log_text" required></td></tr>
                    <tr><td>Confirm Password</td><td><input type="password" name="cpass" id="cpass" placeholder="Confirm Password" class="log_text" required></td></tr>
                    <tr><td></td><td><input type="submit" value="Reset Password" class="log_btn" style="width:140px">
                </table>
            </form>
        <?php 
            goto pass;
        }
    }
}
echo '<script>alert("Invalid Username key Combination. Please Re-try")</script>';
unset($_POST['username']);
header("Refresh:0; url=http://localhost/KidsAccessoriesStore/admin/login.php?pr=true");
pass:
}
else if((isset($_POST['password'])&&(isset($_POST['username'])))){
$sql = "SELECT * FROM `user`";
$result = $database->query($sql);

while($user=mysqli_fetch_assoc($result)){
    if($_POST['username'] == $user['username']){
        if($_POST['password'] == $user['password']){
            $_SESSION['username'] = $user['username'];
            $_SESSION['auth_level'] = $user['auth_level'];
            setcookie('username',$_SESSION['username'],time()+10);
            setcookie('auth_level',$_SESSION['auth_level'],time()+10);
            unset($_POST['username']);
            header("Refresh:0; url=http://localhost/KidsAccessoriesStore/admin/index.php");
            die();
        }
    }
}
echo '<script>alert("Invalid Username Password Combination. Please Re-try")</script>';
unset($_POST['username']);
header("Refresh:0; url=http://localhost/KidsAccessoriesStore/admin/login.php");
}
else if(!isset($_SESSION['username']))
{?>
            <h3 class="text-center">Login</h3><hr>
            <form action="login.php" method="post">
                <table style = "margin-left:auto;margin-right:auto;text-align:left">
                    <tr><td>User Name</td><td><input type="text" name="username" id="username" placeholder="User Name" class="log_text"></td></tr>
                    <tr><td>Password</td><td><input type="password" name="password" id="password" placeholder="Password" class="log_text"></td></tr>
                    <tr><td></td><td><input type="submit" value="Login" class="log_btn"> <a href="login.php?pr=t">Forgot Password?</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../index.php">Visit Site</a></td>
                </table>
            </form>
            
<?php
}?>
        </div>
        <?php include 'includes/footer.php'; ?>
</body>
</html>
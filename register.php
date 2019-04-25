<?php 
require_once 'core/init.php';
include 'includes/head.php';
include 'includes/navigation.php'; 
include 'includes/headerfull.php';

$fname=$lname=$email=$zip=$state=$city=$addr=$csc=$exp=$card=$byear=$bmonth=$bday=$email=$lname=$fname=$username="";
$fname_d=$lname_d=$email_d=$pass_d=$cpass_d=$bdate_d=$card_d=$exp_d=$csc_d=$addr_d=$city_d=$state_d=$zip_d=$username_d="";
$agr=null;

if(isset($_POST['agree'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $cpass=$_POST['cpassword'];
    $gender=$_POST['gender'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $city=$_POST['city'];
    $addr=$_POST['address'];
    $csc=$_POST['csc'];
    $exp=$_POST['expdate'];
    $card=$_POST['cardno'];
    $byear=$_POST['birthyear'];
    $bmonth= $_POST['birthmonth'];
    $bday=$_POST['birthday'];
    $username=$_POST['username'];

    if($_POST['agree']==on){
        if(checkall()){
            $sql = "";
        }
    }
    else{
        echo '<script>alert("Please Read Our Terms And Conditions and check agree!");</script>';
    }
}

?>
    <div class="csection regdiv">
        
    <h3>Register</h3><hr>
    <p>Already have an account? <a href="login.php">Login</a></p>
    <form method="POST" action="register.php">
        <div class="row">
        <div class="col-md-6 mb-3 mytop">
                <label for="FirstName">First name</label><small class="danger-spacing text-danger danger-back"><?=$fname_d?></small>
                <input type="text" value="<?=$fname?>" class="form-control" name="fname" placeholder="First name" required>
                
        </div>
        <div class="col-md-6 mb-3 mytop">
                <label for="LastName">Last name</label><small id="lname-danger-text" class="danger-spacing text-danger danger-back"><?=$lname_d?></small>
                <input type="text" value="<?=$lname?>" class="form-control" name="lname" placeholder="Last name" required>
                
        </div>
        <div class="col-md-12 mb-3 mytop">
                <label for="Email">E-mail Address</label><small id="email-danger-text" class="danger-spacing text-danger danger-back"><?=$email_d?></small>
                <input type="text" value="<?=$email?>" class="form-control" name="email" placeholder="someone@stores.com" required>
        </div>
        <div class="col-md-12 mb-3 mytop">
            <label for="UserName">User Name</label><small id="email-danger-text" class="danger-spacing text-danger danger-back"><?=$username_d?></small>
            <input type="text" value="<?=$username?>" class="form-control" name="username" placeholder="username" required>
        </div>
        <div class="col-md-6 mb-3 mytop">
                <label for="Password">Password</label><small id="pass-danger-text" class="danger-spacing text-danger danger-back"><?=$pass_d?></small>
                <input type="password" class="form-control" name="password" placeholder="password" required>
        </div>
        <div class="col-md-6 mb-3 mytop">
                <label for="ConfirmPassword">Confirm Password</label><small id="cpass-danger-text" class="danger-spacing text-danger danger-back"><?=$cpass_d?></small>
                <input type="password" class="form-control" name="cpassword" placeholder="password" required>
        </div>
        <small id="passwordHelpBlock" class="form-text text-muted">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
        </small>
        <div class="col-md-12 mb-3 mytop">
                <label class="inline-block" for="Gender">Gender</label>
                <div class="form-check inline-block">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="male" checked>
                        Male
                    </label>
                </div>
                <div class="form-check inline-block">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
                        Female
                    </label>
                </div>
                
        </div>
        <div class="col-md-12 mb-3 mytop">
                <label class="inline-block" for="Gender">Birthdate</label>
                <div class="form-check inline-block">
                    <input type="text" value="<?=$bday?>" class="form-control short" name="birthday" placeholder="dd">
                </div>
                
                <div class="form-check inline-block">
                    <input type="text" value="<?=$bmonth?>" class="form-control short" name="birthmonth" placeholder="mm">
                </div>
                
                <div class="form-check inline-block">
                    <input type="text" value="<?=$byear?>" class="form-control mediem" name="birthyear" placeholder="yyyy">
                </div>
                <small id="birth-danger-text" class="danger-spacing text-danger danger-back"><?=$bdate_d?></small>
        </div>
        <div>
        &nbsp;<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Card Details<h4>
        <div class="col-md-12 mb-3 mytop">
                <label for="CardNumber">Card Number</label><small id="card-danger-text" class="danger-spacing text-danger danger-back"><?=$card_d?></small>
                <input type="text" value="<?=$card?>" class="form-control" name="cardno" placeholder="Debit or Credit Card Number" required>
        </div>    
        <div class="col-md-6 mb-3 mytop">
                <label for="ExpDate">Expiration Date</label><small id="exp-danger-text" class="danger-spacing text-danger danger-back"><?=$exp_d?></small>
                <input type="text" value="<?=$exp?>" class="form-control" name="expdate" placeholder="mm/yy" required>
        </div>      
        <div class="col-md-6 mb-3 mytop">
                <label for="CSC">CSC</label><small id="csc-danger-text" class="danger-spacing text-danger danger-back"><?=$csc_d?></small>
                <input type="text" value="<?=$csc?>" class="form-control" name="csc" placeholder="XXX" required>
        </div>      
        </div>
        <div class="col-md-12">
        &nbsp;<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Post Details</h4>
        <div class="mb-3 mytop">
                <label for="Address">Address</label><small id="address-danger-text" class="danger-spacing text-danger danger-back"><?=$addr_d?></small>
                <input type="text" value="<?=$addr?>" class="form-control" name="address" placeholder="123 main street, denmark" required>
        </div> 
                <div class="row mytop">
                        <div class="col-md-6 mb-3">
                        <label for="City">City</label><small id="city-danger-text" class="danger-spacing text-danger danger-back"><?=$city_d?></small>
                        <input type="text" value="<?=$city?>" class="form-control is-valid" name="city" placeholder="City" required>
                        </div>
                        <div class="col-md-3 mb-3">
                        <label for="state">State</label><small id="state-danger-text" class="danger-spacing text-danger danger-back"><?=$state_d?></small>
                        <input type="text" value="<?=$state?>" class="form-control is-valid" name="state" placeholder="State" required>
                        </div>
                        <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label><small id="zip-danger-text" class="danger-spacing text-danger danger-back"><?=$zip_d?></small>
                        <input type="text" value="<?=$zip?>" class="form-control is-valid" name="zip" placeholder="Zip" required>
                        </div>
                </div>
        </div>
        </div>
        <hr>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="terms.php">Read Our Term and Conditions</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label">
      <input class="form-check-input" name="agree" value="<?=$agr?>" type="checkbox"> Do you agree with our terms and confirm that you have read our data Policy
    </label>
  </div>
        <hr>
        <br>
        <button class="btn btn-primary" type="submit">Register</button>
    </form>

    <?php include 'includes/footer.php'; ?>
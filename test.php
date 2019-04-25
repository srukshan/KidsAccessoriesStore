<?php
	if(isset($_POST['agree'])){
		echo $_POST['agree'];
	}
?>

<form action="test.php">
<label class="form-check-label">
      <input class="form-check-input" name="agree" type="checkbox"> Do you agree with our terms and confirm that you have read our data Policy
        <hr>
        <button class="btn btn-primary" type="submit">Register</button>

</form>
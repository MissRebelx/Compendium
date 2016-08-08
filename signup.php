<?php 

$PAGE_TITLE="Archades Compendium: Sign Up";
$CSS_NAME="signup";

require './includes/header.php';
require './includes/db.php';

?>

<div class="container">

<?php  
if (isset($_REQUEST['submit']))  {
	
	if($_POST['inputUsername']=="" || $_POST['inputEmail']=="" || $_POST['inputPassword']=="")
	{
		echo "<div class=\"alert alert-danger\" role=\"alert\">There is an empty field. If you believe you received this message in error, please email " . $ADMIN_EMAIL . ".</div>";
	}
	else
	{
		$username = $_POST['inputUsername'];
		$email = $_POST['inputEmail'];
		$password = $_POST['inputPassword'];
		$hashpass = password_hash($password, PASSWORD_DEFAULT);
		
		$sql = "SELECT * FROM user WHERE UPPER(username) = UPPER('$username') || UPPER(email) = UPPER('$email');";
		$result = $connection->query($sql);
		if (!$result = $connection->query($sql)) { die($GENERIC_ERROR); }
	   if($result->num_rows > 0)
	   {
		echo "<div class=\"alert alert-danger\" role=\"alert\">There is already an account registered with that username or email address. Please choose another. If this is your account, try to <a href=\"#\">reset your password</a>.</div>"; 
        }
	    else
		{
			$sql = "INSERT INTO user (username, email, password, active) VALUES ( '$username', '$email', '$hashpass', 0)";
			
			if ($result = $connection->query($sql)) {
				
				//get conf code
				$conf_code = "12345";
				
				$mailbody = file_get_contents(('./includes/email_signup.html'), dirname(__FILE__));
				$mailbody = str_replace('%USERNAME%', $username, $mailbody); 
				$mailbody = str_replace('%CONF_CODE%', $conf_code, $mailbody); 
				$mailbody = str_replace('%ADMIN_EMAIL%', $ADMIN_EMAIL, $mailbody); 
				$mailbody = str_replace('%SITE_ROOT%', $SITE_ROOT, $mailbody); 

				date_default_timezone_set('Etc/UTC');
				require './includes/mailer/PHPMailerAutoload.php';
				$mail = new PHPMailer;
				$mail->isSMTP();
				//Enable SMTP debugging
				// 0 = off (for production use)
				// 1 = client messages
				// 2 = client and server messages
				$mail->SMTPDebug = 0;
				//Ask for HTML-friendly debug output
				$mail->Debugoutput = 'html';
				$mail->IsHTML(true);
				$mail->Host = 'smtp.gmail.com';
				$mail->Port = 587;
				$mail->SMTPSecure = 'tls';
				$mail->SMTPAuth = true;
				$mail->Username = "$ADMIN_EMAIL";
				$mail->Password = "$ADMIN_EMAIL_PASS";
				$mail->setFrom($ADMIN_EMAIL, 'Archades Admins');
				$mail->addAddress($email, $username);
				$mail->Subject = 'Archades Compendium: Account Registration';
				$mail->msgHTML($mailbody);
				if (!$mail->send()) {
					echo "Mailer Error: " . $mail->ErrorInfo;
				} else {
					echo "<div class=\"alert alert-success\" role=\"alert\">Congratulations! You have successfully created your account with us. You should receive an e-mail confirmation shortly. If you do not receive it within a half-hour, consider contacting our admin team at " . $ADMIN_EMAIL . ".</div>";
				}
				
				
				
				
			} else {
				die("<div class=\"alert alert-danger\" role=\"alert\">There was an error when trying to process your request, please try again later. If this error persists, please email " . $ADMIN_EMAIL . ", including the below details:<br>" . mysqli_connect_errno() . mysqli_connect_error() . "</div>"); 
			}
			
		mysqli_close($connection);
			
			
		} 
	}
}	
?>


	<div class="row centered-form">
	<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4" id="form-signup">
		<div class="panel panel-default">
			<div class="panel-heading">
					<h3 class="panel-title">Fill out the form to make your Compendium account with Archades!<br><small>Registration is not required for play on the forum.</small></h3>
					</div>
					<div class="panel-body">
<form data-toggle="validator" role="form" method="post" action="signup.php">
  <div class="form-group has-feedback">
          <label for="inputUsername" class="control-label">Username</label>
            <input type="text" minlength="4" maxlength="15" class="form-control" id="inputUsername" name="inputUsername" placeholder="OOC Name." value="<?php if(isset($username)) { echo $username; }?>"required>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          <div class="help-block with-errors">Your OOC name, between 4 and 15 characters.</div>
        </div>
  <div class="form-group has-feedback">
    <label for="inputEmail" class="control-label">Email</label>
    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" data-error="That email address is invalid." value="<?php if(isset($email)) { echo $email; } ?>" required>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group has-feedback">
    <label for="inputPassword" class="control-label">Password</label>
    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" minlength="8" maxlength="20"  required>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <div class="help-block with-errors"></div>
  </div>
    <div class="form-group has-feedback">
    <label for="inputPasswordConfirm" class="control-label">Confirm Password</label> 
    <input type="password" class="form-control" id="inputPasswordConfirm" name="inputPasswordConfirm" placeholder="Confirm Password" data-match="#inputPassword" data-match-error="Your passwords don't match." required>
          <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group has-feedback">
    <div class="checkbox">
      <label>
        <input type="checkbox" id="terms" data-error="If you haven't done so already, please sign up on the forum first." required>
        You have already signed up an OOC account on Archades (the forum).
      </label>
      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="form-group">
    <button type="submit" name="submit" class="btn btn-primary">Register</button>
  </div>
</form>
					
				</div>
			</div>
		</div>
	</div>

<?php require './includes/footer.php'; ?>


<script src="./js/validator.min.js"></script>

</body>
</html>
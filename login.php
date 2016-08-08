<?php 

$PAGE_TITLE="Archades Compendium: Log In";
$CSS_NAME="login";

require './includes/header.php';
?>

<div class="container">

<?php  
	
if (isset($_REQUEST['submit']))  {
	
	if($_POST['inputUsername']=="" || $_POST['inputPassword']=="")
	{
		echo "<div class=\"alert alert-danger\" role=\"alert\">There is an empty field. If you believe you received this message in error, please email " . $ADMIN_EMAIL . ".</div>";
	}
	else {
		
		$username = $_POST['inputUsername'];
		$password = $_POST['inputPassword'];
		
		$db->query('SELECT password FROM user WHERE UPPER(username) = UPPER(:username)');
		$db->bind(':username', $username);
		if($row = $db->single()){
			if ($passmatch = password_verify($password, $row['password'])) {
				
				$_SESSION['username'] = $username;
				echo "<div class=\"alert alert-success\" role=\"alert\">Thank you, you are logged in successfully " . $_SESSION['username'] . ".</div>";
				header('refresh:5; url=memberhome.php');
				
			} else {
				echo "<div class=\"alert alert-danger\" role=\"alert\">There is a problem with your username or password. If you would like, try to <a href=\"#\">reset your password</a>.</div>";  // no password match
			}
		}
		else {	echo "<div class=\"alert alert-danger\" role=\"alert\">There is a problem with your username or password. If you would like, try to <a href=\"#\">reset your password</a>.</div>";  // no username match
		}
	}
}	else {
	if (isset($_SESSION['username']) && $_SESSION['username'] != '')	{
		echo "<div class=\"alert alert-warning\" role=\"alert\">You are already logged in. If you proceed, you will be logged off from your current user.</div>";
	}
}
?>


	<div class="row centered-form">
	<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4" id="form-login">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Login with your Archades Compendium account!<br><small>This information can be different than your Archades Forum account.</small></h3>
			</div>
				<div class="panel-body">
					<form data-toggle="validator" role="form" method="post" action="login.php">
					  <div class="form-group">
								<input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="Username" value="<?php if(isset($username)) { echo $username; }?>">
					  </div>
					  <div class="form-group">
						<input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
					  </div>
					  <div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary">Login</button>
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
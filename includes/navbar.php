    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./index.php">Archades Compendium</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
		<div class="navbar-form navbar-right">
			
				<?php
				//check for session - if logged in then welcome back.
				if ( isset($_SESSION['username']) && $_SESSION['username'] != '' ) {
				  echo "<p class=\"navbar-text\">Welcome back, <a href=\"./memberhome.php\">".  $_SESSION['username'] . "</a>. &nbsp; &nbsp; <a href=\"./logout.php\" class=\"btn btn-default\" role=\"button\">Log Out</a> </p>";
				} else {
				  echo "<div class=\"btn-group btn-group\" role=\"group\" aria-label=\"Large button group\"><a href=\"./signup.php\" class=\"btn btn-default\" role=\"button\">Sign Up</a> <a href=\"./login.php\" class=\"btn btn-default\" role=\"button\">Log In</a></div>";
				} //if not logged in, show log in button.
				?>
			</div>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
	
	<?php// echo "The session is: " .  print_r($_SESSION); ?>
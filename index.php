<?php 

$PAGE_TITLE="Archades Compendium: Home";
$CSS_NAME="index";

require './includes/header.php';

?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Hello, Archades!</h1>
        <p>This site is tailored to facilitate the application creation and maintenance process for the forum and world of <a href="http://archades.boards.net" target="_blank">Archades</a>.</p>
		<p>If you are already a member: any of the forum staff can link your account on the Compendium with your account on the Forum (just let us know!), enabling you to access all of your character apps in one central location.</p>
		<p>If you are not a member with us yet: <a href="http://archades.boards.net/thread/1884/started-archades" target="_blank">sign up with an OOC account</a> on the forum first and let us know who you are, catch us in the cbox to exchange ideas or ask questions, and then sign up here to work on your first character.</p>
        <p><a class="btn btn-primary btn-lg" href="./signup.php" role="button">Sign up now &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>News Flash</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Statistics</h2>
          <ul class="list-group">
			<li class="list-group-item"><span class="Calandria">Calandria</span>: 27</li>
			<li class="list-group-item"><span class="Desmira">Desmira</span>: 0<span class="mark-attention">!</span></li>
			<li class="list-group-item"><span class="Estersea">Estersea</span>: 36</li>
			<li class="list-group-item"><span class="Faucheux">Faucheux</span>: 26</li>
			<li class="list-group-item"><span class="Nacimiento">Nacimiento</span>: 12</li>
			<li class="list-group-item"><span class="Rohari">Rohari</span>: 9</li>
			<li class="list-group-item"><span class="Seravino">Seravino</span>: 29</li>
			<li class="list-group-item"><span class="Shelbourne">Shelbourne</span>: 19</li>
			<li class="list-group-item"><span class="Vasile">Vasile</span>: 20</li>
			<li class="list-group-item"><span class="Vulcanis">Vulcanis</span>: 24</li>
			<span class="span-note"><span class="mark-attention">!</span>= Not currently in play.</span>
		</ul>
       </div>
        <div class="col-md-4">
          <h2>Newest Characters</h2>
          <ul class="list-group">
			<li class="list-group-item">Cras justo odio : House Name</li>
			<li class="list-group-item">Dapibus ac facilisis in : House Name</li>
			<li class="list-group-item">Morbi leo risus : House Name</li>
			<li class="list-group-item">Porta ac consectetur ac : House Name</li>
			<li class="list-group-item">Vestibulum at eros : House Name</li>
		</ul>
          <p><a class="btn btn-default" href="http://archades.boards.net/members?dir=desc&sort=registered_on" role="button">View details &raquo;</a></p>
        </div>
      </div>

<?php require './includes/footer.php'; ?>
</body>
</html>
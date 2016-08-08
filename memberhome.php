<?php 

$PAGE_TITLE="Archades Compendium: Member Home";
$CSS_NAME="memberhome";

require './includes/header.php';
// if not logged in redirect to login 
// if not the right member, redirect to error log in

?>

<div class="jumbotron">
      <div class="container">
        <h1>Hello, <?php if (isset($_SESSION['username']) && $_SESSION != '') { echo $_SESSION['username']; } ?>!</h1>
      </div>
    </div>

 <div class="container">
      <!-- Example row of columns -->
      <div class="row" id="addcharacterrow">
		<div id="addcharacter">
			<a href="./character.php?id=new" class="btn btn-default">
				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add New Character
			</a>
		</div>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
				<th class="col-md-1"> &nbsp; Action</th>
				<th class="col-md-4">Character Name</th>
				<th class="col-md-2">Status</th>
				<th class="col-md-2">Posting Req</th>
				</tr>
			</thead>
			<tbody>
				<tr><td scope="row"> &nbsp; <a href="character?id=1"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a></td><td class="Naia bs">Itsaso Naia</td><td class="stat-arc">Archived</td><td>3 posts/month</td></tr>
				<tr><td scope="row"> &nbsp; <a href="character?id=1"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a></td><td class="Connell bs">Liam Connell</td><td>Active</td><td>3 posts/month</td></tr>
				<tr><td scope="row"> &nbsp; <a href="character?id=1"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a></td><td class="Deveraux bs">Emile Deveraux</td><td class="stat-inact">Inactive</td><td>10 posts/month</td></tr>
				<tr><td scope="row"> &nbsp; <a href="character?id=1"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a></td><td class="Sinclair bs">Toria Harper</td><td>NPC</td><td>3 posts/month</td></tr>
				<tr> <td scope="row"> &nbsp; <a href="character?id=1"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a></td><td class="Saavedra bs">Daario Saavedra</td><td>Active</td><td>7 posts/month</td></tr>
			</tbody>
		</table>
      </div>
	  
<?php

require './includes/footer.php'; 

?>

</body>
</html>
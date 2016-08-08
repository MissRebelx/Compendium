<?php 

$PAGE_TITLE="Archades Compendium: Character Edit";
$CSS_NAME="character";

require './includes/header.php';
require './includes/class.characters.php';

// if not logged in redirect to login 
// if not the right member, redirect to error log in

?>

<div class="container">

<?php 

$id = ((isset($_GET['id'])  && $_GET['id'] != '"') ? $_GET['id'] : 'new' );
if ($id != 'new') {
	
	echo "id is : " . $id;
	$character = new Characters;
	
	$character->getCharacter($id);
	echo "char name is : " . $character->getName();
	
	//$db->query('SELECT player FROM characters WHERE id = :id;');
	//$db->bind('id', $id);
	
	/*if ($result = $db->execute())
	{
		if ($db->rowCount() == 1) {
			$char_id;
			$char_name;
			$char_gender;
			$char_birthdate;
			$char_city;
		}
	} else {
		echo $GENERIC_ERROR;
	} */
} 

?>

<form class="form-horizontal"  data-toggle="validator" role="form" method="post" action="character.php">
	<fieldset>

	<!-- Form Name -->
	<legend>Character Editor : New Character</legend>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="charname">Character Name</label>  
	  <div class="col-md-3">	  
            <input class="form-control input-md" type="text" minlength="4" maxlength="50" class="form-control" id="charname" name="inputUsername" placeholder="Character Name" value="<?php if(isset($username)) { echo $username; }?>"required>
	  <span class="help-block with-errors">Full character name is required.</span>  
	  </div>
	</div>

	<!-- Multiple Radios -->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="gender">Gender</label>
	  <div class="col-md-3">
	  <div class="radio">
		<label for="gender-0">
		  <input type="radio" name="gender" id="gender-0" value="male" checked="checked">
		  Male
		</label>
		</div>
	  <div class="radio">
		<label for="gender-1">
		  <input type="radio" name="gender" id="gender-1" value="female">
		  Female
		</label>
		</div>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="birthdate">Birthdate</label>  
	  <div class="col-md-3">
	  <input id="birthdate" name="birthdate" type="text" placeholder="Birthdate" class="form-control input-md">
	  <span class="help-block">Current Game Date is : October / November 1427</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group disabled">
	  <label class="col-md-2 control-label" for="age">Age</label>  
	  <div class="col-md-1">
	  <input id="age" name="age" type="text" placeholder="Age" class="form-control input-md" disabled>
	  <span class="help-block"></span>  
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="city">City / Region</label>  
	  <div class="col-md-3">
	  <input id="city" name="city" type="text" placeholder="City / Region" class="form-control input-md">
	  <span class="help-block">City / Region</span>  
	  </div>
	</div>

	<!-- Prepended text-->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="house">House</label>
	  <div class="col-md-3">
		<div class="input-group">
		  <span class="input-group-addon">House</span>
		  <select class="form-control" id="house" name="house">
			  <option>Deveraux</option>
			  <option>Connell</option>
			  <option>Cadag</option>
			  <option>4</option>
			  <option>5</option>
			</select>
		  <!-- <input id="house" name="house" class="form-control" placeholder="House Name" type="text"> -->
		</div>
		<p class="help-block">House [ Birth, Marriage if applicable ]</p>
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="playedby">Played By</label>  
	  <div class="col-md-3">
	  <input id="playedby" name="playedby" type="text" placeholder="Played By" class="form-control input-md">
	  <span class="help-block">Played By Name</span>  
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="playedbylink"></label>  
	  <div class="col-md-3">
	  <input id="playedbylink" name="playedbylink" type="text" placeholder="http://www..." class="form-control input-md">
	  <span class="help-block">Played By Image URL</span>  
	  </div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="appearance">Appearance</label>
	  <div class="col-md-8">                     
		<textarea class="form-control" rows="5" id="appearance" name="appearance">Please provide a text-based description of their looks, preferred clothing and shoes</textarea>
	  </div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="skills">Skills / Abilities</label>
	  <div class="col-md-3">                     
		<textarea class="form-control" rows="5" id="skills" name="skills">Unique to your character.
- Skill / Ability
- Skill / Ability
- Skill / Ability
- Skill / Ability</textarea>
	  </div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="personality">Personality</label>
	  <div class="col-md-8">                     
		<textarea class="form-control" rows="5" id="personality" name="personality">A more in-depth look at what makes this character tick. Please include character ambitions, goals, virtues/flaws. Once you've finished this, we suggest that you reach out to players of your character's family members and have them read it, the better to help establish family relationships - this is especially important for characters who have siblings or parents in play! </textarea>
	  </div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="history">History</label>
	  <div class="col-md-8">                     
		<textarea class="form-control" rows="10" id="history" name="history">A minimum 2 - 3 paragraphs that gives us an idea of how this character has grown into who they are right now. Please note - if this character holds a high rank or significant position, more detail is preferred! Also, please incorporate family relationships into your history, especially if the siblings are in play.</textarea>
	  </div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="sample">Writing Sample</label>
	  <div class="col-md-8">                     
		<textarea class="form-control" rows="5" id="sample" name="sample">One paragraph minimum, third person, to give us a sample on your style and technique. If applying for a Royal Family/Household member, please write it as that character.</textarea>
	  </div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
	  <label class="col-md-2 control-label" for="secrets">Character Secrets</label>
	  <div class="col-md-8">                     
		<textarea class="form-control" rows="3" id="secrets" name="secrets">Any sins, fears, phobias, maybe some long-term personal goals or ambitions. We recommend having at least one so that you have something to start from. You can always add more as you go.</textarea>
	  </div>
	</div>
	
	<!-- Submit -->
	<div class="form-group">
		<div class="col-md-1 col-sm-offset-2"> 
			<button type="submit" name="submit" class="btn btn-primary">Create</button>
		</div>
	</div>

	</fieldset>
	</form>
		
<?php
require './includes/footer.php'; 
?>

<script src="./js/validator.min.js"></script>

</body>
</html>

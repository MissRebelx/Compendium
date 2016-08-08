<?php
/**
 * Characters
*/

require './includes/class.house.php';

class Characters {

	private $id;
	private $name;
	private $gender;
	private $birthdate;
	private $city;
	private $house;
	private $playedby;
	private $playedbylink;
	private $appearance;
	private $personality;
	private $history;
	private $sample;
	private $secrets;
	
	private $admin_status;
	private $admin_updated_date;
	private $admin_updated_by;
	private $admin_comment;
	
	private $version;
	private $player;
	
	private $db;

	public function __construct(){
		$id = 0;
		$name = '';
		$gender = 0;
		$birthdate = '';
		$city = '';
		$house = new House;
		$playedby = '';
		$playedbylink = '';
		$appearance = '';
		$personality = '';
		$history = '';
		$sample = '';
		$secrets = '';

		$admin_status = 0;
		$admin_updated_date = '';
		$admin_updated_by = '';
		$admin_comment = '';

		$version = 0;
		$player = '';
		
		$this->db = new Database;
	}
	
	public function getCharacter($charid) {
		
		$tempchar = new Characters;
		
		$this->db->query("SELECT * FROM characters WHERE id = :charid");
		$this->db->bind('charid', $charid);
		if ($this->db->execute())
		{
			if ($this->db->rowCount() == 1) {
				echo "success";
			}	else {
			echo "<div class=\"alert alert-danger\" role=\"alert\">You do not have a character by the ID provided. Please go back and try again.</div>";
			}
		} else {
			echo "failed charid query";
		}
	}
	
	public function getName() {
		return $this->name;
	}
}
<?php
/**
 * House
*/
class House {

	private $id;
	private $name;
	private $head;
	private $banner;
	private $type;
	private $color;
	
	private $admin_status;

	public function __construct(){
		$id = 0;
		$name = '';
		$head = 0;
		$banner = '';
		$type = 0;
		$color = '';
		
		$admin_status = 0;
	}
	
	public function getHouse($houseid) {
		$db->query("SELECT * FROM house WHERE id = :id");
		$db-> bind(id, $houseid);
		if ($db->execute())
		{
			echo "success2";
			print_r ($db->resultSet());
		} else {
			echo "failed2";
		}
	}
}
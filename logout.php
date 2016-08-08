<?php
require_once('./includes/class.session.php');
require_once('./includes/class.database.php');
$session = new Session;
$db = new Database;
session_destroy();
$_SESSION = array();
header('Location: login.php');
exit;
?>
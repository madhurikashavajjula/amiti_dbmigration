<?php
	include_once 'config/database.php';
	include_once "model/db.php";
	session_start();
	session_destroy();

	header("Location: ".$base_url);
?>
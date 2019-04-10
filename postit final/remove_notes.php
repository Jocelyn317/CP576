<?php
	include 'functions.php';
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$notesid = $_GET["notesid"];
		$courseid = $_GET["courseid"];
	   	runQuery(getDb(), "delete from notes where notesid = ".$notesid);
	   	header("location:notes_dropbox.php?courseid=".$courseid);
   	}
?>
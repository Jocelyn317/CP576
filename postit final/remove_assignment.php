<?php
	include 'functions.php';
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$assignmentid = $_GET["assignmentid"];
		$courseid = $_GET["courseid"];
	   	runQuery(getDb(), "delete from assignment where assignmentid = ".$assignmentid);
	   	header("location:notes_dropbox.php?courseid=".$courseid);
   	}
?>
<?php
	include 'functions.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$courseid = $_POST["courseid"];
		$title = $_POST["title"];
	   	runQuery(getDb(), "insert into notes(title,courseid) values('".$title."',".$courseid.")");
	   	header("location:notes_dropbox.php?courseid=".$courseid);
   	}
?>
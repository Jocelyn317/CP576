<?php
	include 'functions.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$courseid = $_POST["courseid"];
		$title = $_POST["title"];
		$duedate = $_POST["duedate"];
	   	runQuery(getDb(), "insert into assignment(title,courseid,duedate) values('".$title."',".$courseid.",'".$duedate."')");
	   	header("location:notes_dropbox.php?courseid=".$courseid);
   	}
?>
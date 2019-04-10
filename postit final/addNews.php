<?php
	include 'functions.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$courseid = $_POST["courseid"];
		$classnews = $_POST["classnews"];
	   	runQuery(getDb(), "update course set coursenews = '".$classnews."' where id = ".$courseid);
	   	header("location:notes_dropbox.php?courseid=".$courseid);
   	}
?>
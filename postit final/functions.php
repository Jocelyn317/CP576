<?php
include 'include/config.php';
/*
Defines functions to connect to the Database, retrieve the result and 
return them. You need several functions for different questions
*/
function getDB()
{
	// connect to the DB and returns a reference to the DB
	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME); 
	mysqli_query($conn, "set names utf8");
	if (mysqli_connect_errno($conn)) 
	{ 
	    echo "connect_error: " . mysqli_connect_error(); 
	}
	return $conn;
}

function runQuery($db, $query) 
{
	// takes a reference to the DB and a query and returns the results of running the query on the database
	$results = mysqli_query($db, $query);
	mysqli_close($db);
	return $results;
}


?>

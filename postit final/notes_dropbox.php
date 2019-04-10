<!DOCTYPE html>
<html>   
    <head>
        <meta charset="utf-8">
        <title>Notes/Dropbox Page</title>
        <link rel="stylesheet" href="css/project.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    
    <body>
    <?php
    	include 'functions.php';
    	session_start();
		if(!empty($_SESSION["user"])){
			$user = $_SESSION["user"];
		}
		if(!empty($_SESSION["role"])){
			$role = $_SESSION["role"];
		}
    	$courseid = $_GET["courseid"];
    	$results = runQuery(getDb(), "select * from course where id =".$courseid);
		$course = mysqli_fetch_row($results);
    ?>
    <div class="icon-bar">
        <img class="logo-img" src="img/postit.png">
        <a style="font-size: 16px;line-height: 46px;">
        	<?php 
				echo $user[1];
		    ?>
        </a>
        <a href="#"><i class="fa fa-user"></i></a>
        <a href="dictionary.php"><i class="fa fa-book"></i></a> 
        <a href="coursePage_student.php"><i class="fa fa-home"></i></a> 
    </div>
    <h1 id="course_name"><?php echo $course[2].' - '.$course[3] ?></h1>
    <div class="news_area" style="margin-left: 20px;">
    	<form action="addNews.php" method="POST">
	        <h1 id="news_title">Class News</h1>
	        <input type="hidden" name="courseid" value="<?php echo $courseid ?>" />
	        <textarea class="News" name="classnews"><?php echo $course[5] ?></textarea>
	        <?php 
	        	if($role == 1){
	        ?>
	        <input type="submit" value="submit"/>
	        <?php
	        	}	
        	?>
        </form>
    </div>
    <div class="row">
      <div class="column">
        <h2>Class notes/materials</h2>
        <!--<a href="#" onClick="addRow();">Add Notes</a>-->
        <table class="notes" id="notes">
            <tr>
                <th colspan="2">Notes</th>
            </tr>
            <?php
            	$results = runQuery(getDb(), "SELECT * FROM notes where courseid =".$courseid);
        		while($arr = mysqli_fetch_row($results)) {
            ?>
            <tr>
                <td><a target="_blank" href="<?php echo $arr[2]; ?>"><?php echo $arr[1]; ?></a></td>
                <td>
                	<?php 
			        	if($role == 1){
			        ?>
                	<a href="remove_notes.php?notesid=<?php echo $arr[0]?>&courseid=<?php echo $courseid?>" onClick="if(!confirm('Sure to remove？'))return false;">Remove</a>
                	&nbsp;&nbsp;
                	<a href="submit.php?notesid=<?php echo $arr[0]?>&courseid=<?php echo $courseid?>">Upload</a>
                	<?php
			        	}	
		        	?>
                </td>
            </tr>
            <?php
	        	}
	        ?>
        </table>
        <?php 
        	if($role == 1){
        ?>
        <input type="button" onClick="addRow(<?php echo $courseid?>);" style="font-size:16px;" value="+"/>
        <?php
        	}	
    	?>
      </div>
      <div class="column">
        <h2>Dropbox</h2>
        <table class="notes" id="dropbox">
            <tr>
                <th>Assignment</th>
                <th>Due Date</th>
                <th></th>
            </tr>
            <?php
            	$results = runQuery(getDb(), "SELECT * FROM Assignment where courseid =".$courseid);
        		while($arr = mysqli_fetch_row($results)) {
            ?>
            <tr>
                <td><a target="_blank" href="<?php echo $arr[2]; ?>"><?php echo $arr[1]; ?></a></td>
                <td><?php echo $arr[4]; ?></td>
                <td>
                	<?php 
			        	if($role == 1){
			        ?>
                	<a href="remove_assignment.php?assignmentid=<?php echo $arr[0]?>&courseid=<?php echo $courseid?>" onClick="if(!confirm('Sure to remove？'))return false;">Remove</a>
                	<?php
			        	}	
		        	?>
		        	<?php 
			        	if($role == 2){
			        ?>
                	&nbsp;&nbsp;
                	<a href="submit.php?assignmentid=<?php echo $arr[0]?>&courseid=<?php echo $courseid?>">Upload</a>
                	<?php
			        	}	
		        	?>
                </td>
            </tr>
            <?php
	        	}
	        ?>
        </table>
        <?php 
        	if($role == 1){
        ?>
        <input type="button" onClick="addRow2(<?php echo $courseid?>);" style="font-size:16px;" value="+"/>
        <?php
        	}	
    	?>
      </div>
    </div>
        
    <script>
    function addRow(id){
        var oTable = document.getElementById("notes");
        var tBodies = notes.tBodies;
        var tbody = tBodies[0];
        var tr = tbody.insertRow(tbody.rows.length);
        var td_1 = tr.insertCell(0);
        td_1.innerHTML = "<form action='addNotes.php' method='post'><input type='hidden' name='courseid' value='"+id+"'/><input name='title' style='width: 50%;float: left;' value='Notes Title'><button style='float: left;' type='submit'/>Add</button></form>";
    }
    function addRow2(id){
        var oTable = document.getElementById("dropbox");
        var tBodies = dropbox.tBodies;
        var tbody = tBodies[0];
        var tr = tbody.insertRow(tbody.rows.length);
        var td_1 = tr.insertCell(0);
        td_1.innerHTML = "<form action='addAssignment.php' method='post'><input type='hidden' name='courseid' value='"+id+"'/><input name='title' style='width: 40%;float: left;' value='Assignment Title'><input name='duedate' type='date' style='width: 40%;float: left;'><button style='float: left;' type='submit'/>Add</button></form>";
    }
    </script>
    </body>
</html>
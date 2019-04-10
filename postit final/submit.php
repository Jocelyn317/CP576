<!DOCTYPE html>
<html>   
    <head>
        <meta charset="utf-8">
        <title>Submit Page</title>
        <link rel="stylesheet" href="css/project.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <?php
		include 'functions.php';
		$notesid = $assignmentid = '';
		if(!empty($_GET["notesid"])){
			$notesid = $_GET["notesid"];
		}
		if(!empty($_GET["assignmentid"])){
			$assignmentid = $_GET["assignmentid"];
		}
		$courseid = $_GET["courseid"];
		session_start();
		if(!empty($_SESSION["user"])){
			$user = $_SESSION["user"];
		}
    ?>
    <body>
	    <div class="icon-bar">
	        <img class="logo-img" src="img/postit.png">
	        <a style="font-size: 16px;line-height: 46px;">
        	<?php
        		echo $user[1]
    		?>
        </a>
	        <a href="#"><i class="fa fa-user"></i></a>
	        <a href="#"><i class="fa fa-envelope"></i></a> 
	        <a href="#"><i class="fa fa-home"></i></a> 
	    </div>
	    
	    <form action='upload.php' method='post' enctype='multipart/form-data' style="margin: 20px;">
		    <input type='file' name='myfile' id="file"/>
		    <input type="hidden" name="notesid" value="<?php echo $notesid?>"/>
		    <input type="hidden" name="assignmentid" value="<?php echo $assignmentid?>"/>
		    <input type="hidden" name="courseid" value="<?php echo $courseid?>"/>
		    <input type='submit' name="submit" value="upload" style="width: 100px;"/>
		</form>
    </body>
</html>
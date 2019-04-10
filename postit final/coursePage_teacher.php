<!DOCTYPE html>
<html>   
    <head>
        <meta charset="utf-8">
        <title>Course Page Teacher</title>
        <link rel="stylesheet" href="css/project.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    
    <body>
    <div class="icon-bar">
        <img class="logo-img" src="img/postit.png">
        <a style="font-size: 16px;line-height: 46px;">
        	<?php
        		include 'functions.php';
				$results = runQuery(getDb(), "select * from news limit 1");
				$arr = mysqli_fetch_row($results);
    			session_start();
				if(!empty($_SESSION["user"])){
					$user = $_SESSION["user"];
					echo $user[1];
				}
    		?>
        </a>
        <a href="#"><i class="fa fa-user"></i></a>
        <a href="#"><i class="fa fa-envelope"></i></a> 
        <a href="coursePage_teacher.php"><i class="fa fa-home"></i></a>  
    </div>
    <div class="page">
        <div class="news_area">
            <h1 id="news_title">School News</h1>
            <textarea class="News" readonly><?php echo $arr[1];?></textarea>
        </div>
        
        <div class="courses">
            <h2 id="courses_title">Courses</h2>
            <?php  
				$sql = "select * from course a INNER JOIN teacher_course b on a.id = b.CourseID WHERE b.TeacherID = '".$user[0]."'";
				$results = runQuery(getDb(), $sql);
	  			while($arr = mysqli_fetch_row($results)) {
		    ?>
            <div class="courses_block">
                <a href="notes_dropbox.php?courseid=<?php echo $arr[0] ?>"><img class="course_img" src="img/image.jpg"></a>
                <a href="notes_dropbox.php?courseid=<?php echo $arr[0] ?>"><h3 id="couese_id"> <?php echo $arr[2].' - '.$arr[3]?></h3></a>
            </div>
            <?php 
            	} 
            ?>
        </div>
        
    </div>       
    
    </body>
    
    
</html>
<!DOCTYPE html>
<html>   
    <head>
        <meta charset="utf-8">
        <title>Course Page Admin 2</title>
        <link rel="stylesheet" href="css/project.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    
    <body>
    <?php
    	include 'functions.php';
//		$results = runQuery(getDb(), "select * from news limit 1");
//		$arr = mysqli_fetch_row($results);
		
		$id = $_GET["id"];
    	$results = runQuery(getDb(), "select * from course where id =".$id);
		$course = mysqli_fetch_row($results);
		
		$results = runQuery(getDb(), "SELECT * FROM teacher a INNER JOIN teacher_course b on a.TeacherID = b.TeacherID AND b.CourseID =".$id);
		$teacher = mysqli_fetch_row($results);
		
    ?>
    <div class="icon-bar">
        <img class="logo-img" src="img/postit.png">
        <a style="font-size: 16px;line-height: 46px;">
        	<?php
    			session_start();
				if(!empty($_SESSION["user"])){
					$user = $_SESSION["user"];
					echo $user[1];
				}
    		?>
        </a>
        <a href="#"><i class="fa fa-user"></i></a>
        <a href="#"><i class="fa fa-envelope"></i></a> 
        <a href="coursePage_admin.html"><i class="fa fa-home"></i></a>  
    </div>
    <div class="page">
        <h1 id="course_name"><?php echo $course[2].' - '.$course[3] ?></h1>
        <!--<div class="news_area">
            <h1 id="news_title">School News</h1>
            <textarea class="News"><?php echo $arr[1];?></textarea>
        </div>-->
        <div class="news_area">
            <h1 id="news_title">Class News</h1>
            <textarea class="News" readonly><?php echo $course[5];?></textarea>
        </div>
        <h2>Class List</h2>
        <h3>Teacher</h3>
        <button class="collapsible" style="font-size: 20px; color: white;"><?php echo $teacher[1]; ?></button>
        <div class="teacher_intro">
            <p><?php echo $teacher[3]; ?></p>
        </div>
        
        <h3>Students</h3>
        <div style="margin-bottom: 30px;">
        <?php
        	$results = runQuery(getDb(), "SELECT * FROM student a INNER JOIN student_course b on a.StudentID = b.StudentID AND b.CourseID =".$id);
        	while($arr = mysqli_fetch_row($results)) {
        ?>
        <button class="collapsible" style="font-size: 20px; color: white;"><?php echo $arr[1]; ?></button>
        <div class="teacher_intro">
            <p><?php echo $arr[3]; ?></p>
        </div>
        <?php
        	}
        ?>
        </div>
    </div>       
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
      		coll[i].addEventListener("click", function() {
	        	this.classList.toggle("active");
	            var content = this.nextElementSibling;
	            if (content.style.display === "block") {
	          		content.style.display = "none";
	            } else {
	          		content.style.display = "block";
	            }
      		});
        }
    </script>
    </body>
</html>
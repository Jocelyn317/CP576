<!DOCTYPE html>
<html>   
    <head>
        <meta charset="utf-8">
        <title>Course Page Admin</title>
        <link rel="stylesheet" href="css/project.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    
    <body>
    <?php
		include 'functions.php';
		$results = runQuery(getDb(), "select * from news limit 1");
		$arr = mysqli_fetch_row($results);
		session_start();
		$schoolnews = $user = '';
		if(!empty($_SESSION["user"])){
			$user = $_SESSION["user"];
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$schoolnews = $_POST["schoolnews"];
		   	runQuery(getDb(), "update news set newscontent = '".$schoolnews."' where newstype = 1");
		   	$arr[1] = $schoolnews;
	   	}
	?>	
    <div class="icon-bar">
        <img class="logo-img" src="img/postit.png">
        <a style="font-size: 16px;line-height: 46px;"><?php echo $user[1]; ?></a>
        <a href="#"><i class="fa fa-user"></i></a>
        <a href="coursePage_admin.php"><i class="fa fa-home"></i></a> 
    </div>
    <div class="page">
        <div class="news_area">
        	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	            <h1 id="news_title">School News</h1>
	            <textarea class="News" name="schoolnews"><?php echo $arr[1];?></textarea>
	            <input type="submit" value="submit"/>
            </form>
        </div>
        <h2 id="courses_list">Courses List</h2>
        <table class="admin">
            <tr>
                <th>Grade 9</th>
                <th>Grade 10</th>
                <th>Grade 11</th>
                <th>Grade 12</th>
            </tr>
            <tr>
                <td><a href="coursePage_admin2.php?id=1">MPM1D</a></td>
                <td><a href="coursePage_admin2.php?id=5">MPM2D</a></td>
                <td><a href="coursePage_admin2.php?id=9">MCR3U</a></td>
                <td><a href="coursePage_admin2.php?id=12">MHF4U</a></td>
            </tr>
            <tr>
                <td><a href="coursePage_admin2.php?id=2">ENG1D</a></td>
                <td><a href="coursePage_admin2.php?id=6">ENG2D</a></td>
                <td><a href="coursePage_admin2.php?id=10">ENG3U</a></td>
                <td><a href="coursePage_admin2.php?id=13">ENG4U</a></td>
            </tr>
            <tr>
                <td><a href="coursePage_admin2.php?id=3">ACT1O</a></td>
                <td><a href="coursePage_admin2.php?id=7">ACT2O</a></td>
                <td><a href="coursePage_admin2.php?id=11">ACT3M</a></td>
                <td><a href="coursePage_admin2.php?id=14">ACT4M</a></td>
            </tr>
            <tr>
                <td><a href="coursePage_admin2.php?id=4">SNC1D</a></td>
                <td><a href="coursePage_admin2.php?id=8">SNC2D</a></td>
                <td></td>
                <td><a href="coursePage_admin2.php?id=15">SNC4M</a></td>
            </tr>
        </table>      
    </div>
    </body>
    
    
</html>
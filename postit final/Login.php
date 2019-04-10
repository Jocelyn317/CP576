<!DOCTYPE html>
<html>   
    <head>
        <meta charset="utf-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="css/project.css">
    </head>
    <div class="icon-bar">
        <img class="logo-img" src="img/postit.png">
    </div>
    <body>
	<?php
		include 'functions.php';
		$username = $password = $role = '';
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$username = $_POST["username"];
		   	$password = $_POST["password"];
		   	$role = $_POST["role"];
		   	$sql = '';
		   	if($role == '0'){ //admin
		   		# $sql = "select * from admin where username='".$username."' and password='".$password."'";
		   		$sql = "select * from admin where username='".$username."'";
		   		$results = runQuery(getDb(), $sql);
			  	$arr = mysqli_fetch_row($results);
			  	if(empty($arr)){
			  		echo 'Incorrect username or password';
			  	}else{
			  		if(password_verify($password, $arr[4])){
			  			session_start();
				  		$_SESSION["user"] = $arr;
				  		$_SESSION["role"] = 0;
			  			header("location:coursePage_admin.php");
			  		}else{
			  			echo 'Incorrect username or password';
			  		}
			  	}
		   	} else if ($role == '1'){ //teacher
		   		$sql = "select * from teacher where username='".$username."'";
		   		$results = runQuery(getDb(), $sql);
			  	$arr = mysqli_fetch_row($results);
			  	if(empty($arr)){
			  		echo 'Incorrect username or password';
			  	}else{
			  		if(password_verify($password, $arr[5])){
			  			session_start();
				  		$_SESSION["user"] = $arr;
				  		$_SESSION["role"] = 1;
			  			header("location:coursePage_teacher.php");
			  		}else{
			  			echo 'Incorrect username or password';
			  		}
			  	}
		   	} else if ($role == '2'){ //student
		   		$sql = "select * from student where username='".$username."'";
		   		$results = runQuery(getDb(), $sql);
			  	$arr = mysqli_fetch_row($results);
			  	if(empty($arr)){
			  		echo 'Incorrect username or password';
			  	}else{
			  		if(password_verify($password, $arr[5])){
			  			session_start();
				  		$_SESSION["user"] = $arr;
				  		$_SESSION["role"] = 2;
			  			header("location:coursePage_student.php");
			  		}else{
			  			echo 'Incorrect username or password';
			  		}
			  	}
		   	}
		}
	?>
    <p id="welcome">Welcome</p>
    <p class="msg">Login here to access your courses</p>
    <p class="msg">The use of MyLearningSpace assumes you have read and agreed to the Policy Governing the Use of Information Technology.</p>
    <div class="login_section">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username" class="login_text"><br>

            <label for="password">Password </label><br>
            <input type="password" id="password" name="password" class="login_text"><br>
			<input name="role" checked="checked" type="radio" value="0"/>admin
			<input name="role" type="radio" value="1"/>teacher
			<input name="role" type="radio" value="2"/>student<br>
            <input type="submit" value="Login" class="login_submit">
        </form>
    </div>

    </body>
</html>
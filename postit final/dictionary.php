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
		include 'api.php';
		session_start();
		if(!empty($_SESSION["user"])){
			$user = $_SESSION["user"];
		}
		$xdef = '';
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$word = $_POST["word"]; //baseball
			if(!empty($word)){
				$xdef = grab_xml_definition($word, "collegiate", "0f6d6cc2-4d27-44fa-9686-e678e04ea2db");
				$xdef = json_decode($xdef, TRUE);
			}
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
	        <a href="dictionary.php"><i class="fa fa-book"></i></a> 
	        <a href="coursePage_student.php"><i class="fa fa-home"></i></a> 
	    </div>
	    
	    <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method='post' style="margin: 20px;">
		    <input type="text" name="word" style="width: 50%;">
		    <input type='submit' name="submit" value="search" style="width: 100px;margin-left: 20px;"/>
		</form>
		<div style="margin: 20px;">
			<?php 
				if(!empty($xdef)&&!empty($xdef[0])){
					if(!empty($xdef[0]['hwi'])&&!empty($xdef[0]['hwi']['hw'])){
						echo '<h3>'.$xdef[0]['hwi']['hw'].'</h3><br>';
					}
					if(!empty($xdef[0]['hwi'])&&!empty($xdef[0]['hwi']['prs'])&&!empty($xdef[0]['hwi']['prs'][0])&&!empty($xdef[0]['hwi']['prs'][0]['mw'])){
						echo $xdef[0]['hwi']['prs'][0]['mw'].'<br>';
					}
					if(!empty($xdef[0]['shortdef'])&&!empty($xdef[0]['shortdef'][0])){
						echo '<p>'.$xdef[0]['shortdef'][0].'</p>';
					}
				} 
			?>
			
		</div>
    </body>
</html>
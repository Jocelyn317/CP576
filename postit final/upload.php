<?php
include 'functions.php';
$save_path = "./upload";                               //file path
$max_size = 1000000;                                    //file max size
$allow_type = array('gif','png','jpg','jpeg','doc','txt','xls','xlsx','docx','pdf');   //file type allowed

//check if path exits, if not create new 
if(!is_dir($save_path))
        mkdir($save_path);

//check if upload succeed
if($_FILES['myfile']['error']){
        echo "upload fail<br>";
        switch($_FILES['myfile']['error']){
                case 1: die('file size exceed system allowed <br>');break;
                case 2: die('file size exceed a form allowed<br>');break;
                case 3: die('only partial file uploaded<br>');break;
                case 4: die('upload 0 fail<br>');break;
                default: die('unknow error<br>');break;
        }   
}

//check if file type allowed 
$temp = explode(".", $_FILES["myfile"]["name"]);
$hz = end($temp);
if(!in_array($hz,$allow_type)){
        die("the type of file is not allowed<br>");
}

//check file size
if($max_size < $_FILES['myfile']['size']){
        die("file is too big<br>");
}

//in case file name exits already, new name in the system
$save_file_name = date('YmdHis').rand(100,900).'.'.$hz;

//check if uploaded by HTTP POST，if yes move file from temp directory to saved directory, print out saved file info
if(is_uploaded_file($_FILES['myfile']['tmp_name'])){
        if(move_uploaded_file($_FILES['myfile']['tmp_name'],$save_path.'/'.$save_file_name)){
                echo "upload successful!<br>file{$_FILES['myfile']['name']}saveed in{$save_path}/{$save_file_name}!<br>";
                	
                $notesid = $_POST["notesid"];
				$assignmentid = $_POST["assignmentid"];
				$courseid = $_POST["courseid"];
				if(!empty($notesid)){
					runQuery(getDb(), "update notes set file='upload/".$save_file_name."' where notesid=".$notesid);
				}else if(!empty($assignmentid)){
					runQuery(getDb(), "update assignment set file='upload/".$save_file_name."' where assignmentid=".$assignmentid);
				}
		        header("location:notes_dropbox.php?courseid=".$courseid);
        }
        else{
                echo "file transfer failed<br>";
        }
}
else{
        die("file{$_FILES['myfile']['name']}no uploaded by HTTP POST");
}
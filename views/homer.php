<?php
session_start();
if(!isset($_SESSION['id'])){
	header('Location: login.php');
}
include('../db_sch/sch1_db.php');

$favorite_subject=$error='';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	# code..
	if (empty($_POST['favorite_subject'])) {
        $error = 'checkbox must not be empty ';
        header('Location: home.php?error='.$error);
    } else {
	    $favorite_subject = $_POST['favorite_subject'];
	    if (count($favorite_subject) == 5){
	      	# code...
	      	$j = 0;
	      	$newArr = [];
	      	for($i = 0; $i < count($favorite_subject); $i++){
	      		if(empty($favorite_subject[$i])){
	      			$j++;
	      		}else{
	      			array_push($newArr, $favorite_subject[$i]);
	      		}
	      	}
	      	if($j > 0){
	      		// header()
	      		$error = 'You are to choose 5 subject only';
				header('Location: home.php?error='.$error);
	      	}elseif(count($newArr) == 5){
				$subject1 = $newArr[0]; 
				$subject2 = $newArr[1]; 
				$subject3 = $newArr[2]; 
				$subject4 = $newArr[3]; 
				$subject5 = $newArr[4]; 
				$sql = "INSERT INTO reg_tab(userId,subject1,subject2,subject3,subject4,subject5) VALUES('".$_SESSION["id"]."','$subject1', '$subject2', '$subject3', '$subject4', '$subject5')";
				    // save to db and check
				    if (mysqli_query($conn, $sql)) {
				    // safe id of the user 
				        header('Location: courses.php');
				    } else{
				        // error
				        header('Location: home.php?error='.mysqli_error($conn));
				        // echo 'query error: '. mysqli_error($conn);
				    }
	      	}
        }else{
        	$error="must be 5 subjects";
        	 header('Location: home.php?error='.$error);
        }      
    }
}else{
	echo 'not set!';
}





  // }








?>
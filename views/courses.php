<?php
session_start();
if(!isset($_SESSION['id'])){
	header('Location: login.php');
}
include('../db_sch/sch1_db.php');

$sql = "SELECT subject1, subject2, subject3, subject4, subject5  FROM  reg_tab WHERE userId=".$_SESSION['id'];
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <h2>Registation Was Successful.</h2>
        <ul><h3><?php echo $row['subject1'] ?></h3> </ul>
        <ul><h3><?php echo $row['subject2'] ?></h3></ul>
        <ul><h3><?php echo $row['subject3'] ?></h3></ul>
        <ul><h3><?php echo $row['subject4'] ?> </h3></ul>
        <ul><h3><?php echo $row['subject5'] ?> </h3></ul>
</body>
</html>
<?php 
}
?>
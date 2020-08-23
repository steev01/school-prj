<?php 
session_start();
include('../db_sch/sch_db.php');
if(!isset($_SESSION['id'])){
    header('Location: login.php');
}else{
$sql = "SELECT firstname, lastname FROM  sch_tab WHERE id=".$_SESSION['id'];
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
}else{
    $row = [];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>

<style>
    body {
    background: #3e4144;
}

form {
    margin: 50px auto;
    width: 300px;
    padding: 50px 25px;
    background: white;
}
fieldset{
    color: #000;
}


</style>


</head>
<body>
 <form class="form" action="homer.php" method="POST">

    <h4><?php echo 'Welcome '.strtoupper($row['firstname']).' '.strtoupper($row['lastname']) ?></h4>
    <fieldset>  
    <legend>Select Five Subjects To Register</legend>  
    <input type="checkbox" name="favorite_subject[]" value="Maths" onclick="return ValidateSubject();">Maths<br>  
    <input type="checkbox" name="favorite_subject[]" value="English" onclick="return ValidateSubject();">English<br>  
    <input type="checkbox" name="favorite_subject[]" value="Social Studies" onclick="return ValidateSubject();">Social Studies<br> 
    <input type="checkbox" name="favorite_subject[]" value="Int Sci" onclick="return ValidateSubject();">Int Sci<br> 
    <input type="checkbox" name="favorite_subject[]" value="French" onclick="return ValidateSubject();">French<br> 
    <input type="checkbox" name="favorite_subject[]" value="Geography" onclick="return ValidateSubject();">Geography<br>  
        <br>  
    <input type="submit" name='submit' value="Submit now">  
    </fieldset> 
    <div class='err'><?php echo isset($_GET['error']) ? $_GET['error'] : '' ?><div>
</form>  

<script type="text/javascript">  
function ValidateSubject()  
{  
    var checkboxes = document.getElementsByName("favorite_subject[]");  
    var numberOfCheckedItems = 0;  
    for(var i = 0; i < checkboxes.length; i++)  
    {  
        if(checkboxes[i].checked)  
            numberOfCheckedItems++;  
    }  
    if(numberOfCheckedItems > 5)  
    {  
        alert("You can't select more than five subjeccts!");  
        return false;  
    }  
}  
</script>
</body>
</html>
<?php 
}
?>

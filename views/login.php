
<?php
session_start();
include("../db_sch/sch_db.php");
if(isset($_SESSION['id'])){
  header('Location: home.php');
}else{
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = mysqli_real_escape_string($conn,$_POST["username"]);
    $sql = "SELECT id, password FROM  sch_tab WHERE user_name ='$username'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      if ($_POST["password"] == $row['password']) {
        $_SESSION['id'] = $row['id'];
        $sql = "SELECT * FROM reg_tab WHERE userId=".$_SESSION['id'];
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if(mysqli_num_rows($result) > 0){
          header('Location: home.php');
        }else{
          header('Location: regist.php');
        }
      }else{
        $error = 'username and password mismatch';
        header('Location: login.php?error='.$error);
      }
    }else{
      $error = 'username and password mismatch';
      header('Location: login.php?error='.$error);
    }
  }else{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>school project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/7077b063ac.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <h1 class="login-title">login</h1>
        <?php echo isset($_GET['error']) ? "<h6>".$_GET['error']."</h6>" : '' ; ?>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <div class="feedback"></div>
        <input type="password" class="login-input" name="password" placeholder="Password">
        <div class="request"></div>
        <input type="submit" name="submit" value="Login" class="login-button">
        <p class="link"><a href="regist.php">New Registration</a></p>     
        <?php
              if(isset($found))
            {
               echo '<p class="w3-center w3-text-red">Invalid user id or password<br><a href="index.php">Please try again</p>';
            }
        ?>
    </form>
    <script src="javs/jiz.js"></script>
  </body>
</html>
<?php
  }
}
?>
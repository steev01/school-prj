<?php
session_start();
  include('../db_sch/sch_db.php');
  // include('../packages/array_filter.php');

$firstname = $lastname = $user_name = $password = $confirm = $email = $ingredients = '';
$errors = array();

if($_SERVER["REQUEST_METHOD"] == 'POST'){
   # code...
    echo '<h1>saw this</h1>';
    if (empty($_POST['firstname'])) {
        $errors['firstname'] = ' firstname is required </br>';
    } 
    else{
        $firstname = $_POST['firstname'];
        if (!preg_match('/^[a-z]{3,12}+$/', $firstname)) {
           $errors['firstname'] = 'firstname must be letters and spaces only';
        }
    }

    if (empty($_POST['lastname'])) {
        $errors['lastname'] = ' lastname is required </br>';
    } 
    else{
        $lastname = $_POST['lastname'];
        if (!preg_match('/^[a-z]{3,12}+$/', $lastname)) {
           $errors['lastname'] = 'lastname must be letters and spaces only';
        }
    }

    if (empty($_POST['user_name'])) {
        $errors['user_name'] = ' username is required </br>';
    } 
    else{
        $user_name = $_POST['user_name'];
        if (!preg_match('/^[a-z]{3,12}+$/', $user_name)) {
           $errors['user_name'] = 'username must be letters and spaces only';
        }
    }

    if (empty($_POST['password'])) {
        $errors['password'] = ' password is required </br>';
    } 
    else{
        $password = $_POST['password'];
        if (!preg_match('/^[a-z]{3,12}+$/', $password)) {
           $errors['password'] = 'password must be letters and spaces only';
        }
    }

    if (empty($_POST['confirm'])) {
        $errors['confirm'] = ' confirm password is required </br>';
    } 
    else{
        $confirm = $_POST['confirm'];
        if (!preg_match('/^[a-z]{3,12}+$/', $confirm)) {
           $errors['confirm'] = 'confirm password must be letters and spaces only';
        }
    }

   // check mail
    if (empty($_POST['email'])) {
        $errors['email'] = 'An email is required </br>';
    } 
    else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $errors['email'] = 'email must be a valid email address';
        }
    }

   // check title

    // checking error array for keys which imperatively means 
    // there is an error from the valiadation process  if key exist
    if (count(array_keys($errors)) < 1) {
       // successful form validation
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        // creat sql
        $sql = "INSERT INTO sch_tab(firstname,lastname,user_name,password,email) VALUES('$firstname', '$lastname', '$user_name', '$password', '$email')";

        // save to db and check
        if (mysqli_query($conn, $sql)) {
        // safe id of the user    
          $_SESSION['id'] = mysqli_insert_id($conn);
           header('Location: home.php');
        } else{
           // error
           echo 'query error: '. mysqli_error($conn);
        }
    } 
    else{
?>

<!DOCTYPE html>
<html lang="en">

<?php  include('../temp/head.php');  ?>
        <h1 style='color: #fff'>Here</h1>
        <div class="popup-wrapper">
      <div class="popup">
        <div class="popup-close"> x </div>
        <div class="popup-content">
           <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <h1 class="registration-title">Registration</h1>
            <input type="text" class="register-input" name="firstname" id="firstname" placeholder="firstname" value="<?php echo htmlspecialchars($firstname) ?>">
            <div class="feedback"></div> <div class="red-text"><?php echo isset($errors['firstname']) ? $errors['firstname'] : '' ; ?></div>
            <input type="text" class="register-input" name="lastname" id="lastname" placeholder="lastname" value="<?php echo htmlspecialchars($lastname) ?>">
            <div class="request"></div><div class="red-text"><?php echo isset($errors['lastname']) ? $errors['lastname'] : ''; ?></div>
            <input type="text" class="register-input" name="user_name" id="username" placeholder="username" value="<?php echo htmlspecialchars($user_name) ?>">
            <div class="reply"></div><div class="red-text"><?php echo isset($errors['user_name']) ? $errors['user_name'] : ''; ?></div>
            <input type="password" class="register-input" name="password" id="password" placeholder="password" value="<?php echo htmlspecialchars($password) ?>">
            <div class="refuse"></div><div class="red-text"><?php echo isset($errors['password']) ? $errors['password'] : '' ; ?></div>
            <input type="password" class="register-input" name="password" id="password" placeholder="confirm password" value="<?php echo htmlspecialchars($password) ?>">
            <div class="request"></div><div class="red-text"><?php echo isset($errors['password']) ? $errors['password'] : '' ; ?></div>
            <input type="text" class="register-input" name="email" id="email" placeholder="email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="relay"></div><div class="red-text"><?php echo isset($errors['email']) ? $errors['email'] : '' ; ?></div>
            <input type="submit" class="register-button" name="submit" value="register">
                    <p class="link">Already Registered:<br><a href="login.php">Login here</a></p>
          </form>
        </div>
       </div>
    <div>






   <script src="../javs/jaz.js"></script>
</body>
</html>
<?php
    }
}else{
  

?>



<!DOCTYPE html>
<html lang="en">

<?php  include('../temp/head.php');  ?>
    <div class="popup-wrapper">
      <div class="popup">
        <div class="popup-close"> x </div>
        <div class="popup-content">
           <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
              <h1 class="registration-title">Registration</h1>
              <input type="text" class="register-input" name="firstname" id="firstname" placeholder="firstname" value="<?php echo htmlspecialchars($firstname) ?>">
              <div class="feedback"></div> <div class="red-text"></div>
              <input type="text" class="register-input" name="lastname" id="lastname" placeholder="lastname" value="<?php echo htmlspecialchars($lastname) ?>">
              <div class="request"></div><div class="red-text"></div>
              <input type="text" class="register-input" name="user_name" id="username" placeholder="username" value="<?php echo htmlspecialchars($user_name) ?>">
              <div class="reply"></div><div class="red-text"></div>
              <input type="password" class="register-input" name="password" id="password" placeholder="password" value="<?php echo htmlspecialchars($password) ?>">
              <div class="refuse"></div><div class="red-text"></div>
              <input type="password" class="register-input" name="confirm" id="confirm" placeholder="confirm password" value="<?php echo htmlspecialchars($confirm) ?>">
              <div class="quest"></div><div class="red-text"></div>
              <input type="text" class="register-input" name="email" id="email" placeholder="email" value="<?php echo htmlspecialchars($email) ?>">
              <div class="relay"></div><div class="red-text"></div>
              <input type="submit" class="register-button" value="Continue">
              <p class="link">Already Registered:<br><a href="login.php">Login here</a></p>
          </form>
        </div>
       </div>
    <div>






   <script src="../javs/jaz.js"></script>
</body>
</html>
<?php
}
?>

         


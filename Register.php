<?php
  if(isset($_GET['reg'])){
    include 'dbconnect.php';

    $email = $_GET['email'];
    $fname = $_GET['fName'];
    $lname = $_GET['lName'];
    $pass = $_GET['password'];
    $cpass = $_GET['cPass'];
    $day = $_GET['dayBirth'];
    $month = $_GET['monthBirth'];
    $year = $_GET['yearBirth'];

    $UMPass = False;
    $EmailUsed = False;

    if($pass != $cpass || empty($pass)) $UMPass = True;

    $query = 'SELECT email FROM users WHERE email ="' . $email . '";';
    $result = mysqli_query($db, $query);
    $emCheck = mysqli_fetch_all($result);
    if(sizeof($emCheck)) $EmailUsed = True;

    if(!$UMPass && !$EmailUsed){
      $pass = password_hash($pass, PASSWORD_DEFAULT);
      $insert = 'INSERT INTO users(email, password, first_name, last_name, bday, bmonth, byear) VALUES("' . $email . '", "' . $pass . '", "' . $fname . '", "' . $lname . '", ' . $day . ', ' . $month . ', ' . $year . ');';
      mysqli_query($db, $insert);

      $create_table = "CREATE TABLE `" . $email . "` (
        `item_id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `description` varchar(255) NOT NULL,
        `quantity` varchar(255) NOT NULL,
        `units` varchar(20) NOT NULL,
        PRIMARY KEY (`item_id`) USING BTREE
      ) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8";

      mysqli_query($db, $create_table);
      header("Location: Login.php?success=");
    }
    else{
      header("Location: Register.php?fail=");
    }

  }
  else{

  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/register.css">
  </head>
  <body>
    <div class="body">
      <div class="title">Register Account</div>
      <form>
        <table class="registerForm">
          <tr>
            <td>Email: </td>
            <td><input class="textBox" name="email" type="text" required></input></td>
            <td>First Name: </td>
            <td><input class="textBox" name="fName" type="text" required></input></td>
          </tr>
          <tr>
            <td>Password: </td>
            <td><input class="textBox" name="password" type="password" required></input></td>
            <td>Last Name: </td>
            <td><input class="textBox" name="lName" type="text" required></input></td>
          </tr>
          <tr>
            <td>Confirm Password: </td>
            <td><input class="textBox" name="cPass" type="password" required></input></td>
            <td>Date of Birth: </td>
            <td>
              M<input class="textBox" id="two" name="monthBirth" type="text" maxlength="2" required></input>
              D<input class="textBox" id="two" name="dayBirth" type="text" maxlength="2" required></input>
              Y<input class="textBox" id="four" name="yearBirth" type="text" maxlength="4" required></input>
            </td>
          </tr>
          <?php
            if(isset($_GET['fail'])){
              print '<tr><td colspan=4 style="text-align: center;">Registration Failed</td></tr>';
            }
          ?>
        </table>
        <div id="registerButton"><button type=submit formaction="Register.php" name="reg">Register</button></div>
        <div id="login"><a href="Login.php">Already have an account? Login</a></div>
      </form>
    </div>
    <div class="header">
      <div id="left"><form><button formaction="Home.php" id="l" style="background-color: inherit;">
        <img src="/art/MedMap_Logo.png" alt="">
      </button></form></div>
      <div id="right">
      </div>
    </div>
  </body>
  <script src="https://kit.fontawesome.com/55588c0c96.js" crossorigin="anonymous"></script>
</html>

<?php
  if(isset($_GET['log'])){
    include 'dbconnect.php';

    $email = $_GET['email'];
    $pass = $_GET['password'];

    $query = 'SELECT id, password FROM users WHERE email="' . $email . '";';
    $result = mysqli_query($db, $query);
    $logCheck = mysqli_fetch_all($result);

    if(sizeof($logCheck) && password_verify($pass, $logCheck[0][1])){
      header("Location: Dashboard.php?ID=" . $logCheck[0][0]);
    }
    else{
      header("Location: Login.php?fail=");
    }

  }
  else{

  }


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
    <div class="body">
      <div class="title">Welcome Back!</div>
      <form>
        <table class="loginForm">
          <tr>
            <td>Email: </td>
            <td><input class="textBox" name="email" type="text"></input></td>
          </tr>
          <tr>
            <td>Password: </td>
            <td><input class="textBox" name="password" type="password"></input></td>
          </tr>
          <?php
            if(isset($_GET['fail'])){
              print '<tr><td colspan=4 style="text-align: center;">Login Failed</td></tr>';
            }
            elseif(isset($_GET['success'])){
              print '<tr><td colspan=4 style="text-align: center;">Registration Successful</td></tr>';
            }
          ?>
        </table>
        <!--div id="forgot"><a href="Login.php">forgot password?</a></div-->
        <div id="loginButton"><button type='submit' href="Login.php" name="log">Login</button></div>
        <div id="register"><a href="Register.php">New? Register Account</a></div>
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
</html>

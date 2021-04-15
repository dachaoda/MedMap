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
            <td><input class="textBox" name="email" type="text"></input></td>
            <td>First Name: </td>
            <td><input class="textBox" name="fName" type="text"></input></td>
          </tr>
          <tr>
            <td>Password: </td>
            <td><input class="textBox" name="password" type="text"></input></td>
            <td>Last Name: </td>
            <td><input class="textBox" name="lName" type="text"></input></td>
          </tr>
          <tr>
            <td>Confirm Password: </td>
            <td><input class="textBox" name="cPass" type="text"></input></td>
            <td>Date of Birth: </td>
            <td>
              M<input class="textBox" id="two" name="monthBirth" type="text" maxlength="2"></input>
              D<input class="textBox" id="two" name="dayBirth" type="text" maxlength="2"></input>
              Y<input class="textBox" id="four" name="monthBirth" type="text" maxlength="4"></input>
            </td>
          <tr>
        </table>
        <div id="registerButton"><a href="Home.html">Register</a></div>
        <div id="login"><a href="Login.html">Already have an account? Login</a></div>
      </form>
    </div>
    <div class="header">
      <div id="left"><a href="Home.html" id="logo">MedMap</a></div>
      <div id="right">
      </div>
    </div>
  </body>
</html>

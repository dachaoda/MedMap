<!DOCTYPE html>
<html>

<head>
  <title>Login</title>

  <script src="https://kit.fontawesome.com/55588c0c96.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/general.css">
  <link rel="stylesheet" href="css/login.css">
  <script type="text/javascript" src="js/Login.js"></script>
</head>

<body>
  <div class="body">
    <div class="title">Welcome Back!</div>
    <form>
      <table class="loginForm">
        <tr>
          <td>Email: </td>
          <td><input id="email" class="textBox" name="email" type="email" placeholder="example@example.com"
              required></input></td>
        </tr>
        <tr>
          <td>Password: </td>
          <td><input id="password" class="textBox" name="password" type="password"
              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Password must be 8 characters minimum with at least one uppercase letter, one lowercase letter, and one number."
              required></input></td>
          <td> 
          <td>
            <div onclick="TogglePasswordVisual()">
              <i id="passwordVisual" class="fas fa-eye-slash"></i>
            </div>
          </td>
        </tr>
      </table>
      <div id="forgot"><a href="Login.html">forgot password?</a></div>
      <button id="loginButton" onclick="ValidateLogin()" >Login</button>
      <div id="register"><a href="Register.html">New? Register Account</a></div>
    </form>
  </div>
  <div class="header">
    <div id="left"><a href="Home.html" id="logo"><img src="/art/MedMap_logo.png"></a></div>
    <div id="right">
    </div>
  </div>
</body>

</html>
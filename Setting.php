<?php
  if(isset($_GET['ID'])){
    $id = $_GET['ID'];
  }
  else{
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Setting</title>
    <link rel="stylesheet" href="css/setting.css">
    <link rel="stylesheet" href="css/general.css">

</head>

<body>
    <div id="sidebar">
        <div>
            <div id="circle"> &nbsp;K</div>
            <p>Lorem Ipsum</p>
        </div>
    </div>

    <div class="body">
       <form>
            <h3>Profile Picture</h3>
            <div id="circle"> &nbsp;K</div>
            <Button>Change</Button>
            <br>
            <h3>Username</h3>
            <input type="text" placeholder="Lorem Ipsum">
            <Button>Change</Button>
            <h3>Email Address</h3>
            <input type="text" placeholder="LoremIpsum@gmail.com">
            <Button>Change</Button>
            <h3>New Password</h3>
            <input type="text" placeholder="">
            <Button>Change</Button>
            <h3>Confirm Password</h3>
            <input type="text" placeholder="">
            <Button>Change</Button>
        </form>
    </div>

    <div class="header">
      <div id="left">
        <form>
          <input type="hidden" name="ID" value=<?php echo $id;?>></input>
          <button formaction="Dashboard.php" id="logo">MedMap</button>
          <button formaction="Dashboard.php" id="back">Back</button>
        </form>
      </div>

        <div id="right">
            <!--<a href="dropdown.html">
              <img src="art/dropdown.png" height="40px">
            </a>-->
            <button class="mButton" onclick="showMenu()">-</button>
        </div>

    </div>

    <div class="menu" id="menu">
      <form>
        <input type="hidden" name="ID" value=<?php echo $id;?>></input>
        <div><button formaction="Dashboard.php">Dashboard</button></div>
        <div><button formaction="Planner.php">Planner</button></div>
        <div><button formaction="Item.php">Items</button></div>
        <div><button formaction="Setting.php">Settings</button></div>
        <div><button formaction="Contact.php">Support</button></div>
        <div><a href="Home.php">Logout</a></div>
      </form>
      <button onclick="hideMenu()">X</button>
    </div>
</body>

<script>
  function showMenu(){
    document.getElementById("menu").style.display="block";
    return;
  }
  function hideMenu(){
    document.getElementById("menu").style.display="none";
    return;
  }
</script>

</html>

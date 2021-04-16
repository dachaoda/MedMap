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
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/contact.css">
  </head>
  <body>
    <div class="body">
      <div class="title">Contact Info</div>
      <div class="info">
        totallynotfakeemail@realemails.com<br />
        1-800-NTA-FKNM<br />
        M-F 1:00 am - 1:05 am WAT
      </div>
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

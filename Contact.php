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
    <link rel="stylesheet" href="css/all.css"> <!--font awesome-->
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
          <button id="l" formaction="Dashboard.php" style="background-color: inherit;">
            <img src="/art/MedMap_Logo.png" alt="">
          </button>
          <button formaction="Dashboard.php" id="back">Back</button>
        </form>
      </div>
      <div id="right">
        <button id="menuButton" class="mButton" onclick="showMenu()"><i id="menuArrow" class="fas fa-angle-double-down fa-2x"></i></button>
        <div class="menu" id="menu">
          <form>
            <input type="hidden" name="ID" value=<?php echo $id;?>></input>
            <li>
              <i class="fas fa-compass fa-2x"></i>
              <button formaction="Dashboard.php">Dashboard</button>
            </li>
            <li>
              <i class="far fa-calendar-alt fa-2x"></i>
              <button formaction="Planner.php">Planner</button>
            </li>
            <li>
              <i class="fas fa-pills fa-2x"></i>
              <button formaction="Item.php">Medications</button>
            </li>
            <li>
              <i class="fas fa-cogs fa-2x"></i>
              <button formaction="Setting.php">Settings</button>
            </li>
            <li>
              <i class="far fa-id-card fa-2x"></i>
              <button formaction="Contact.php">Contact</button>
            </li>
            <li>
              <i class="fas fa-sign-out-alt fa-2x"></i>
              <a href="Home.php">Logout</a>
            </li>
          </form>
        </div>
      </div>
    </div>
  </body>

  <script>
    function showMenu(){
      document.getElementById("menuButton").onclick=function() { hideMenu(); }
      document.getElementById("menu").style.display="block";
      document.getElementById("menuArrow").className="fas fa-angle-double-up fa-2x";
      return;
    }
    function hideMenu(){
      document.getElementById("menuButton").onclick=function() { showMenu(); }
      document.getElementById("menu").style.display="none";
      document.getElementById("menuArrow").className="fas fa-angle-double-down fa-2x";
      return;
    }
  </script>

</html>

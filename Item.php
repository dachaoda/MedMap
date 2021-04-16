<?php
  if(isset($_GET['ID'])){
    $id = $_GET['ID'];
    $db = mysqli_connect('localhost', 'root', '', 'gui');
  }
  else{
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Items</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/item.css">
  </head>
  <body>
    <div class="toolbar">
      <form>
        <input type="hidden" name="ID" value=<?php echo $id;?>></input>
        <div><button formaction="AddItem.php">Add Item</button></div>
      <form>
    </div>
    <div class="header">
      <div id="left">
        <form>

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
        <div><button type= formaction="Dashboard.php">Dashboard</button></div>
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

<?php
  if(isset($_GET['ID'])){
    $id = $_GET['ID'];

    if(isset($_GET['add'])){
      include 'dbconnect.php';

      $name = $_GET['name'];
      $quantity = $_GET['quantity'];
      $description = $_GET['description'];
      $unit = $_GET['unit'];

      $query = 'SELECT email FROM users WHERE id=' . $id . ';';
      $email = mysqli_fetch_array(mysqli_query($db, $query))[0];

      $query = 'INSERT INTO `' . $email . '`(name, description, quantity, units) VALUES("' . $name . '", "' . $description . '", ' . $quantity . ', "' . $unit . '");';
      mysqli_query($db, $query);

      header("Location: AddItem.php?ID=" . $id);
    }

  }
  else{
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.css"> <!--font awesome-->
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/addItem.css">
  </head>
  <body>
    <div class="body">
      <div class="title">Add Item</div>
      <!--div class="search">Search: <input type="textbox" id="searchBox" name="search"></div-->
      <form>
        <input type="hidden" name="ID" value=<?php echo $id;?>></input>
        <div class="form-r1">
          <span>
            Name:
            <input type="textbox" id="nameBox" name="name"></input>
          </span>
          <span>
            Quantity:
            <input type="textbox" id="quantityBox" name="quantity"></input>
            Units:
            <input type="textbox" id="unitBox" name="unit"></input>
          </span>
        </div>
        <div class="form-descr">
          Description: <br />
          <textarea id="descriptionBox" name="description" maxlength="255"></textarea>
        </div>
        <button class="submitButton" type="submit" formaction="AddItem.php" name="add">Add Item</button>
      </form>
    </div>
    <div class="header">
      <div id="left">
        <form>
          <input type="hidden" name="ID" value=<?php echo $id;?>></input>
          <button id="l" formaction="Dashboard.php" style="background-color: inherit;">
            <img src="/art/MedMap_Logo.png" alt="">
          </button>
          <button formaction="Item.php" id="back">Back</button>
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
              <a href="logout.php?ID=<?php echo $id;?>">Logout</a>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/55588c0c96.js" crossorigin="anonymous"></script>
</html>

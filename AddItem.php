<?php
  if(isset($_GET['ID'])){
    $id = $_GET['ID'];

    if(isset($_GET['add'])){
      $db = mysqli_connect('localhost', 'root', '', 'gui');

      $name = $_GET['name'];
      $quantity = $_GET['quantity'];
      $description = $_GET['description'];

      $query = 'SELECT email FROM users WHERE id=' . $id . ';';
      $email = mysqli_fetch_array(mysqli_query($db, $query))[0];

      $query = 'INSERT INTO `' . $email . '`(name, description, quantity) VALUES("' . $name . '", "' . $description . '", ' . $quantity . ');';
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
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/addItem.css">
  </head>
  <body>
    <div class="body">
      <div class="title">Add Item</div>
      <div class="search">Search: <input type="textbox" id="searchBox" name="search"></div>
      <form>
        <input type="hidden" name="ID" value=<?php echo $id;?>></input>
        <div class="form-r1">
          <span>
            Name:
            <input type="textbox" id="nameBox" name="name"></input>
          </span>
          <span>
            Q:<?php echo $query;?>
            <input type="textbox" id="quantityBox" name="quantity"></input>
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
          <button formaction="Dashboard.php" id="logo">MedMap</button>
          <button formaction="Item.php" id="back">Back</button>
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

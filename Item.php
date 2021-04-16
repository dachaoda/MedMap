<?php
  if(isset($_GET['ID'])){
    $id = $_GET['ID'];
    include 'dbconnect.php';

    $query = 'SELECT email FROM users WHERE id=' . $id . ';';
    $email = mysqli_fetch_array(mysqli_query($db, $query))[0];

    if(isset($_GET['upd'])){
      $query1 = 'UPDATE `' . $email . '` SET quantity = ' . $_GET['q'] . ' WHERE item_id=' . $_GET['ItemID'] . ';';
      mysqli_query($db, $query1);
      header("Location: Item.php?ID=" . $id);
    }

    $query = 'SELECT item_id, name, description, quantity FROM `' . $email . '` ORDER BY name;';
    $items = mysqli_fetch_all(mysqli_query($db, $query));
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
    <div class="items">
      <?php
        foreach($items as $item){
          echo '<div class="itemCont"><div class="item"><span style="width: 50px;">' . $item[1] . '</span>';
          echo '<form><input type="hidden" name="ID" value=' . $id . '></input>';
          echo '<input type="hidden" name="upd"></input>';
          echo '<span><input type="number" name="q" value="' . $item[3] . '" maxlength=4 style="width: 40px;"></input><button name="ItemID" value=' . $item[0] . '>Update</button></span></form>';
          echo '<span><button  onclick="info(this)">Info</button></span></div>';
          echo '</br><div class="description" style="display: none;">' . $item[2] . '</div></div>';
        }
      ?>
    </div>
    <div class="toolbar">
      <form>

        <div><button formaction="AddItem.php">Add Item</button></div>
      <form>
    </div>
    <div class="header">
      <div id="left">
        <form>
          <input type="hidden" name="ID" value=<?php echo $id;?>></input>
          <button formaction="Dashboard.php" id="logo" >MedMap</button>
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

    function info(e){
      e = e.parentElement.parentElement.parentElement.children[2];
      if(e.style.display == "none"){
        e.style = "display: visible;";
      }
      else{
        e.style = "display: none;";
      }

      return;
    }

  </script>
</html>

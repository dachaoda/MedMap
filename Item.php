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
    <link rel="stylesheet" href="css/all.css"> <!--font awesome-->
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
    <div id="header" class="header">
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
      document.getElementById("header").style.height="397px";
      return;
    }
    function hideMenu(){
      document.getElementById("menuButton").onclick=function() { showMenu(); }
      document.getElementById("menu").style.display="none";
      document.getElementById("menuArrow").className="fas fa-angle-double-down fa-2x";
      document.getElementById("header").style.height="108px";
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

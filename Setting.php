<?php
  if(isset($_GET['ID'])){
    include 'dbconnect.php';
    $id = $_GET['ID'];

    $query = 'SELECT first_name, last_name, email FROM users WHERE id=' . $id . ';';
    $result = mysqli_fetch_array(mysqli_query($db, $query));
    $fname = $result[0];
    $lname = $result[1];
    $email = $result[2];

    if(isset($_GET['email']) && isset($_GET['eVal'])) {
      $query = 'SELECT email FROM users WHERE email ="' . $eVal . '";';
      $result = mysqli_query($db, $query);
      $emCheck = mysqli_fetch_all($result);
      if(!sizeof($emCheck)){
        $query = 'UPDATE users SET email="' . $_GET['eVal'] . '" WHERE id=' . $id . ';';
        mysqli_query($db, $query);
        $query = 'ALTER TABLE `' . $email . '` RENAME TO `' . $_GET['eVal'] . '`;';
        mysqli_query($db, $query);
      }
      header("Location: Setting.php?ID=" . $id . "&success=");
    }
    elseif(isset($_GET['password']) && isset($_GET['pVal']) && isset($_GET['cVal'])){
      if($_GET['pVal'] == $_GET['cVal']){
        $pass = password_hash($_GET['pVal'], PASSWORD_DEFAULT);
        $query = 'UPDATE users SET password="' . $pass . '" WHERE id=' . $id . ';';
        mysqli_query($db, $query);
      }
      header("Location: Setting.php?ID=" . $id . "&success=");
    }
    elseif(isset($_GET['email']) && isset($_GET['eVal']) || isset($_GET['password']) || isset($_GET['pVal']) || isset($_GET['cVal'])){
      header("Location: Setting.php?ID=" . $id . "&fail=");
    }

  }
  else{
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Setting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="css/all.css"> <!--font awesome-->
    <!--link rel="stylesheet" href="css/setting.css"-->
    <link rel="stylesheet" href="css/general.css">

</head>

<body>

    <div class="body">
       <form>
            <input type="hidden" name="ID" value=<?php echo $id;?>></input>
            <h3>Name</h3>
            <span><?php echo "<h4>" . $fname . " " . $lname . "</h4>";?></span>
            <h3>Email Address</h3>
            <input type="text" name="eVal">
            <Button type="submit" name="email" formaction="Setting.php">Change</Button>
            <h3>New Password</h3>
            <input type="text" placeholder="">
            <h3>Confirm Password</h3>
            <input type="text" placeholder="">
            <Button>Change</Button>
        </form>
        <?php
          if(isset($_GET['success'])){
            print '<div></br>Change Successful</div>';
          }
          elseif(isset($_GET['fail'])){
            print '<div></br>Change Failed</div>';
          }
        ?>
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
              <i class="fas fa-cogs fa-2x text-light"></i>
              <button class="text-light"formaction="Setting.php">Settings</button>
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
<script src="https://kit.fontawesome.com/55588c0c96.js" crossorigin="anonymous"></script>

</html>

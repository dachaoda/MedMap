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
    <title>Planner</title>
    <link rel="stylesheet" href="css/planner.css">
    <link rel="stylesheet" href="css/general.css">

</head>

<body>


    <div class="body">
        <h2>Add Event</h2>
        <form>
            <label>Title</label>
            <input type="text">
            <br>
            <label>Start Time</label>
            <input type="time">
            <br>
            <label>End Time</label>
            <input type="time">
            <br>
            <label>Start Date</label>
            <input type="date">
            <br>
            <label>End Date</label>
            <input type="date">
            <br>
            <label>Occurrences</label>
            <input type="radio">Mon</radio>
            <input type="radio">Tue</radio>
            <input type="radio">Wed</radio>
            <input type="radio">Thu</radio>
            <input type="radio">Fri</radio>
            <input type="radio">Sat</radio>
            <input type="radio">Sun</radio>
            <label>Decription:</label>
            <br>
            <textarea type="text" cols="50" rows="15">

            </textarea>

            <br>
            <button type="submit">submit</button>
        </form>
        <div id="events">
            List of Added Event
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

<!DOCTYPE html>
<html>

<head>
  <title>Items</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/55588c0c96.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/general.css">
  <link rel="stylesheet" href="css/item.css">
</head>

<body>
  <div>
    <div class="toolbar">
      <div><a href="AddItem.html">Add Item</a></div>
    </div>
    <div class="header">
      <div id="left"><a href="Dashboard.html" id="logo"><img src="/art/MedMap_logo.png"></a></div>
      <div id="right">
        <button class="mButton" onclick="showMenu()"><i class="fas fa-angle-double-down"></i></button>
      </div>
    </div>
    <div class="menu" id="menu">
      <div><a href="Dashboard.html">Dashboard</a></div>
      <div><a href="Planner.html">Planner</a></div>
      <div><a href="Item.html">Items</a></div>
      <div><a href="Setting.html">Settings</a></div>
      <div><a href="Contact.html">Support</a></div>
      <div><a href="index.html">Logout</a></div>
      <button onclick="hideMenu()"><i class="fas fa-angle-double-up"></i></button>
    </div>
  </div>
</body>
<script>
  function showMenu() {
    document.getElementById("menu").style.display = "block";
    return;
  }

  function hideMenu() {
    document.getElementById("menu").style.display = "none";
    return;
  }
</script>

</html>
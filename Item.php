<!DOCTYPE html>
<html>
  <head>
    <title>Items</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/item.css">
  </head>
  <body>
    <div class="toolbar">
      <div><a href="AddItem.html">Add Item</a></div>
    </div>
    <div class="header">
      <div id="left">
        <a href="Home.html" id="logo">MedMap</a>
        <a href="Dashboard.html" id="back">Back</a>
      </div>
      <div id="right">
        <button class="mButton" onclick="showMenu()">-</button>
      </div>
    </div>
    <div class="menu" id="menu">
      <div><a href="Dashboard.html">Dashboard</a></div>
      <div><a href="Planner.html">Planner</a></div>
      <div><a href="Item.html">Items</a></div>
      <div><a href="Setting.html">Settings</a></div>
      <div><a href="Contact.html">Support</a></div>
      <div><a href="Home.html">Logout</a></div>
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

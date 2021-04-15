<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">

</head>

<body>
    <div class="body">
        <div id="planner" >
            <a href="planner.html">
            <div id="calender">

            </div>
            </a>
            <div id="alerts">
                <ul>
                    <li class="danger"> Alert! Lorem ipsum </li>
                    <li class="warning">Reminder: Lorem ipsum </li>
                    <li class="warning">Reminder: Lorem ipsum</li>
                    <li class="warning">Reminder: Lorem ipsum</li>
                    <li class="warning">Reminder: Lorem ipsum</li>
                </ul>
            </div>
        </div>

        <div id="medication">
            <div id="cart">

            </div>
            <button>Clear</button>
            <button>Take</button>
            <br><br>
            <div id="list">
                <form>
                    <button>Recent</button>
                    <button>New</button>
                    <input type="text" placeholder="input medication name">
                    <button>Search</button>
                </form>
                <ul>
                    <li>medication 1</li>
                    <button>+</button>
                    <input placeholder="quantity">
                    <button>-</button>
                    <li>medication 2</li>
                    <button>+</button>
                    <input placeholder="quantity">
                    <button>-</button>
                    <li>medication 3</li>
                    <button>+</button>
                    <input placeholder="quantity">
                    <button>-</button>
                </ul>
            </div>
        </div>
    </div>
    <div class="header">
        <div id="left"><a href="Dashboard.html" id="logo">MedMap</a></div>

        <div id="right">
            <!--<a href="dropdown.html">
              <img src="art/dropdown.png" height="40px">
            </a>-->
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

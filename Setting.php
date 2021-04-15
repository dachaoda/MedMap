<!DOCTYPE html>
<html>

<head>
    <title>Setting</title>
    <link rel="stylesheet" href="css/setting.css">

</head>

<body>
    <div class="header">
        <div id="left"><a href="Dashboard.html" id="logo">MedMap</a></div>

        <div id="right">
            <a href="dropdown.html">
              <img src="art/dropdown.png" height="40px">
            </a>
        </div>

    </div>

    <div id="sidebar">
        <div>
            <div id="circle"> &nbsp;K</div>
            <p>Lorem Ipsum</p>
        </div>
    </div>

    <div class="body">
       <form>
            <h3>Profile Picture</h3>
            <div id="circle"> &nbsp;K</div>
            <Button>Change</Button>
            <br>
            <h3>Username</h3>
            <input type="text" placeholder="Lorem Ipsum">
            <Button>Change</Button>
            <h3>Email Address</h3>
            <input type="text" placeholder="LoremIpsum@gmail.com">
            <Button>Change</Button>
            <h3>New Password</h3>
            <input type="text" placeholder="">
            <Button>Change</Button>
            <h3>Confirm Password</h3>
            <input type="text" placeholder="">
            <Button>Change</Button>
        </form>
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

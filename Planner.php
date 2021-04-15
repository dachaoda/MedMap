<!DOCTYPE html>
<html>

<head>
    <title>Planner</title>
    <link rel="stylesheet" href="css/planner.css">

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

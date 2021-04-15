<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/55588c0c96.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/dashboard.css?version=#">
</head>

<body>
    <div class="body">
        <div id="planner">
            <a href="planner.html">
                <div id="calender">
                    <div id="month">
                        <ul>
                            <li class="prev"></li>
                            <li class="next"></li>
                            <li id="year">August
                                <br>
                                <span style="font-size:18px">2021</span>
                            </li>
                          </ul>
                    </div>

                    <ul id="weekdays">
                        <li>Mon</li>
                        <li>Tue</li>
                        <li>Wed</li>
                        <li>Thu</li>
                        <li>Fri</li>
                        <li>Sat</li>
                        <li>Sun</li>

                    </ul>

                    <ul id="days">
                        <li id="0">0</li>
                        <li id="1">1</li>
                        <li id="2">2</li>
                        <li id="3">3</li>
                        <li id="4">4</li>
                        <li id="5">5</li>
                        <li id="6">6</li>
                    </ul>

                </div>
            </a>
        </div>

        <div id="medication">
            <div id="contenter">
                <button onclick="clearAll()">Clear</button>
                <button>Take</button>
                <div id="cart">

                </div>
            </div>
            <br>
            <div id="list">
                <form id="search">
                    <input type="text" placeholder="input medication name">
                    <button>Search</button>
                </form>
                <div id="medlist">
                    <div id="medication1"class="meditem">
                        <li>medication 1</li>
                        <div class="button">
                            <button name="medication1" onclick="add(this)">+</button>
                            <input name="medication1" class="quantity"  value="234" min="0" maxlength="3" type="number">
                            <button name="medication1" onclick="minus(this)">-</button>
                            <button>Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header">
        <div id="left"><a href="Dashboard.html" id="logo"><img src="/art/MedMap_logo.png"></a></div>
        
        <div id="right">
            <!--<a href="dropdown.html">
              <img src="art/dropdown.png" height="40px">
            </a>-->
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

<script type="text/javascript" src="js/Dashboard.js"></script>

</html>
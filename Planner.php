<?php
  $id = 'testid';
  if(isset($_GET['ID'])){
    include 'dbconnect.php';
    $id = $_GET['ID'];

    if(isset($_GET['add'])){
      include 'dbconnect.php';
    }

    if(true){
      $email = "testidEvent";

      $create_table = "CREATE TABLE " . $email . " (
        'event_id' int(11) NOT NULL AUTO_INCREMENT,
        PRIMARY KEY ('event_id') USING BTREE
      ) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8";
      

      mysqli_query($db, $create_table);

    }

  }
  else{
    header("Location: Planner.php?ID=testid");
  }
?>


<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


  <link rel="stylesheet" href="css/planner.css">

</head>

<body class="container-fluid bg_3">
  <nav class="navbar navbar-md fixed-top navbar-dark bg_1 border-bottom border-dark">
    <div class="container-fluid">
      <form>
        <input type="hidden" name="ID" value=<?php echo $id;?>></input>
        <button class="navbar-brand nav_clear" formaction="Dashboard.php">
          <img src="/art/MedMap_Logo.png" alt="" Width="100" height="80" class="d-inline-block align-text-top">
        </button>
      </form>

      <button class="navbar-toggler border-5" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" onclick="ToggledropdownVisual()">
        <i id="dropdownicon" class=" btn-lg fas fa-angle-double-down fa-2x"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <form class="navbar-nav">
          <input type="hidden" name="ID" value=<?php echo $id;?>></input>
          <li class="nav-item d-flex justify-content-end">
            <i class="fas fa-compass fa-2x align-self-center pt-1 px-1"></i>
            <button class="nav-link nav_clear fs-5" formaction="Dashboard.php">Dashboard</button>
          </li>
          <li class="nav-item d-flex justify-content-end">
            <i class="far fa-calendar-alt fa-2x align-self-center pt-1 px-1 fc_2"></i>
            <button class="nav-link nav_clear active fs-5" formaction="Planner.php">Planner</button>
          </li>
          <li class="nav-item d-flex justify-content-end">
            <i class="fas fa-pills fa-2x align-self-center pt-1 px-1"></i>
            <button class="nav-link nav_clear fs-5" formaction="Item.php">Medications</button>
          </li>
          <li class="nav-item d-flex justify-content-end">
            <i class="fas fa-cogs fa-2x align-self-center pt-1 px-1"></i>
            <button class="nav-link nav_clear fs-5" formaction="Setting.php">Setting</button>
          </li>
          <li class="nav-item d-flex justify-content-end">
            <i class="far fa-id-card fa-2x align-self-center pt-1 px-1"></i>
            <button class="nav-link nav_clear fs-5" formaction="Contact.php">Contact</button>
          </li>
          <li class="nav-item d-flex justify-content-end">
            <i class="fas fa-sign-out-alt fa-2x align-self-center pt-1 px-1"></i>
            <button class="nav-link nav_clear fs-5" formaction="Home.php">Logout</button>
          </li>
        </form>
      </div>
    </div>
  </nav>

  <div class="container-fluid p-0 mt-2">
    <div class="row">

      <div class="border border-dark col-lg bg_5">
        Add Event
        <form class="text-light row">

          <div class="mb-3 col-12">
            <label for="eventTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="eventTitle">
          </div>

          <div class="mb-3 col-6">
            <label for="eventStartDate" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="eventStartDate">
          </div>

          <div class="mb-3 col-6">
            <label for="medicationName" class="form-label">Medication Name</label>
            <input type="text" class="form-control" id="medicationName">
            
          </div>

          <div class="mb-3 col-6" id="eventStartTimeBox">
            <label for="eventStartTime" class="form-label">Start Time</label>
            <input type="time" class="form-control" name="eventStartTime" id="eventStartTime" value="00:00:00">
          </div>

          <div class="mb-3 col-12">
            <div class="form-checkbox">
              <input class="form-check-input" type="checkbox" name="checkRepeat" id="checkRepeat" checked="true" onclick="eventcheckRepeat(this)">
              <label class="form-check-label" for="checkRepeat">
                Does Not Repeat
              </label>
            </div>
          </div>

          <div class="mb-3 col-6 invisible" id="eventEndDateBox">
            <label for="eventEndDate" class="form-label">End Date</label>
            <input type="date" class="form-control" id="eventEndDate">
          </div>

          <!--CheckBox for Weekdays -->
          <div class="mb-3 col-7 invisible" id="checkWeekdayBox">
            <div class="row">
              <div class="form-checkbox col pe-0">
                <input class="form-check-input" type="checkbox" name="checkMon" id="checkMon">
                <label class="form-check-label" for="checkMon">
                  Mon
                </label>
              </div>

              <div class="form-checkbox col pe-0">
                <input class="form-check-input" type="checkbox" name="checkTue" id="checkTue">
                <label class="form-check-label" for="checkTue">
                  Tue
                </label>
              </div>

              <div class="form-checkbox col pe-0">
                <input class="form-check-input" type="checkbox" name="checkWed" id="checkWed">
                <label class="form-check-label" for="checkWed">
                  Wed
                </label>
              </div>

              <div class="form-checkbox col pe-0">
                <input class="form-check-input" type="checkbox" name="checkThu" id="checkThu">
                <label class="form-check-label" for="checkThu">
                  Thu
                </label>
              </div>

              <div class="form-checkbox col pe-0">
                <input class="form-check-input" type="checkbox" name="checkFri" id="checkFri">
                <label class="form-check-label" for="checkFri">
                  Fri
                </label>
              </div>

              <div class="form-checkbox col pe-0">
                <input class="form-check-input" type="checkbox" name="checkSat" id="checkSat">
                <label class="form-check-label" for="checkSat">
                  Sat
                </label>
              </div>

              <div class="form-checkbox col pe-0">
                <input class="form-check-input" type="checkbox" name="checkSun" id="checkSun">
                <label class="form-check-label" for="checkSun">
                  Sun
                </label>
              </div>
            </div>

          </div>

          <!--Description Input-->
          <div class="mb-3">
            <label for="eventDes" class="form-label">Description</label>
            <textarea class="form-control" style="height: 175px" col="50" row="5" maxlength="300" id="eventDes" placeholder="Max 300 characters"></textarea>
          </div>
          
          <button type="submit" name="add" formaction="Planner.php" class="btn btn-primary mb-3">Add Event</button>
        </form>
      </div>

      <div class="container border border-dark col-lg-8 bg_5 ms-lg-1">

        <div class="text-light">
          Event list
          <button onclick="" class="btn btn-primary mb-3">Remove Event</button>
        </div>

      </div>

    </div>
  </div>



</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/55588c0c96.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/VisualChange.js"></script>
<script type="text/javascript" src="js/Planner.js"></script>


</html>
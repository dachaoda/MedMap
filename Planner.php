<?php
  $id = 'testid';
  if(isset($_GET['ID'])){
    include 'dbconnect.php';
    $id = $_GET['ID'];
    $debug ='NO Message';
    if(isset($_GET['debug'])){
      $debug = $_GET['debug'];
    }
    if(isset($_GET['Page'])){
      $page = $_GET['Page'];
      $count = 6 * ($page - 1);
    }else{
      $page = 1;
      $count= 0;
    }


    
    //update event sql
    if(isset($_GET['add'])){
      $debug ='AddEvent';


      $name = ($_GET['ID']) . 'event';      
      $title = $_GET['eventTitle'];
      $medname = $_GET['medicationName'];
      $starttime = $_GET['eventStartTime'];
      $startdate = $_GET['eventStartDate'];
      $description = $_GET['eventDescription'];

      if (isset($_GET['checkRepeat'])){
        $occurday = "('All')";
        $endDate = $_GET['eventStartDate'];
      }else{
        $occurday ="('";
        if(isset($_GET['checkMon'])){
          $occurday = $occurday . "Mon";
        }
        if(isset($_GET['checkTue'])){
          $occurday = $occurday . ",Tue";
        }
        if(isset($_GET['checkWed'])){
          $occurday = $occurday . ",Wed";
        }
        if(isset($_GET['checkThu'])){
          $occurday = $occurday . ",Thu";
        }
        if(isset($_GET['checkFri'])){
          $occurday = $occurday . ",Fri";
        }
        if(isset($_GET['checkSat'])){
          $occurday = $occurday . ",Sat";
        }
        if(isset($_GET['checkSun'])){
          $occurday = $occurday . ",Sun";
        }
        $occurday = $occurday . "')";
        $endDate = $_GET['eventEndDate'];
      }
        

      $insert = "INSERT INTO " . $name . " (
        title,
        med_name,
        start_time,
        start_date,
        end_date,
        description,
        occur_day) VALUES(
          '" . $title ."',
          '" . $medname ."',
          '" . $starttime ."',
          '" . $startdate ."',
          '" . $endDate ."',
          '" . $description ."',
          $occurday
        );
      ";
      
      mysqli_query($db, $insert);
      
      /*
        sql test sample
        INSERT INTO testidevent ( 
        title,
        med_name,
        start_time,
        start_date,
        end_date,
        description,
        occur_day) VALUES(
          'TestTitle',
          'TestMedName',
          '1234-12-13',
          'Test test test description',
          ('Mon,Wed')
        );
 
      */
      header("Location: Planner.php?ID=". $id ."&Page=" . $page ."&debug=".$debug);
    }
    

    //create sql table
    if(true){
      $name = ($_GET['ID']) . 'event'; 

      $create_table = "CREATE TABLE " . $name . " (
        event_id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(255) NOT NULL,
        med_name varchar(255) NOT NULL,
        start_time time NOT NULL,
        start_date date NOT NULL,
        end_date date NOT NULL,
        description varchar(255) NOT NULL,
        occur_day set('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun', 'All') NOT NULL,
        PRIMARY KEY (event_id) USING BTREE
      ) DEFAULT CHARSET=utf8";
    
      /*
        sql test sample
        CREATE TABLE testidEvent ( 
        event_id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(255) NOT NULL,
        med_name varchar(255) NOT NULL,
        start_time time NOT NULL,
        start_date date NOT NULL,
        end_date date Not NULL,
        description varchar(255) NOT NULL,
        occur_day set('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun') NOT NULL,
        PRIMARY KEY (event_id) USING BTREE
        )ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8
 
      */

      mysqli_query($db, $create_table);
      //$debug ='NO Message';
             
    }

    //remove sql data
    if(isset($_GET['remove'])){
      $debug ='RemoveEvent';

      $name = ($_GET['ID']) . 'event'; 

      $delete_event = "DELETE FROM " . $name . "
      WHERE event_id =\"" . $_GET['DeleteID'] ."\"";
      

      mysqli_query($db, $delete_event);
      header("Location: Planner.php?ID=". $id ."&Page=" . $page ."&debug=".$debug);
    }

    /*
    DELETE FROM testidevent WHERE event_id = "20"
    */

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

        <form class="text-light row" onsubmit="return validate()">

          <input type="hidden" name="ID" value=<?php echo $id;?>></input>
          <input type="hidden" name="Page" value=<?php echo $page;?>></input>

          <div class="col-12 py-2 text-center">

            Add New Reminder
          </div>

          <div class="mb-3 col-12">
            <label for="eventTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="eventTitle" name="eventTitle" maxlength="255" required>
          </div>

          <div class="mb-3 col-6">
            <label for="eventStartDate" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="eventStartDate" name="eventStartDate" 
              required>
          </div>

          <div class="mb-3 col-6">
            <label for="medicationName" class="form-label">Medication Name</label>
            <input type="text" class="form-control" id="medicationName" maxlength="255" name="medicationName" 
              required>

          </div>

          <div class="mb-3 col-6" id="eventStartTimeBox">
            <label for="eventStartTime" class="form-label">Time</label>
            <input type="time" class="form-control" name="eventStartTime" id="eventStartTime" required>
          </div>

          <div class="mb-3 col-12">
            <div class="form-checkbox">
              <input class="form-check-input" type="checkbox" name="checkRepeat" id="checkRepeat" checked="true"
                onclick="eventcheckRepeat(this)">
              <label class="form-check-label" for="checkRepeat">
                Does Not Repeat
              </label>
            </div>
          </div>

          <div class="mb-3 col-6 invisible" id="eventEndDateBox">
            <label for="eventEndDate" class="form-label">End Date</label>
            <input type="date" class="form-control" id="eventEndDate" name="eventEndDate">
          </div>

          <!--CheckBox for Weekdays -->
          <div class="mb-3 col-7 col-xxl-12 invisible" id="checkWeekdayBox">
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
            <textarea class="form-control" style="height: 175px" col="50" row="5" maxlength="255" id="eventDes" 
              placeholder="Max 255 characters" value="None" name="eventDescription" required></textarea>
          </div>

          <button type="submit" name="add" formaction="Planner.php" onclick="validate(this)"
            class="btn btn-primary mb-3">Add</button>
        </form>
      </div>

      <div class="container border border-dark col-lg-8 bg_5 ms-lg-1">

        <div class="text-light row">

          <div class="col-12 py-2 text-center">

            Event List
          </div>

          <?php
            include 'dbconnect.php';
            $query = "
            SELECT event_id, title, med_name, start_time, start_date, end_date, description, occur_day
            FROM " . $name . "
            ORDER BY event_id DESC";
            $items = mysqli_fetch_all(mysqli_query($db, $query));

            
            /*
            sql test sample
            
            SELECT event_id, title, med_name, start_time, start_date, end_date, description, occur_day
            FROM testidevent
            ORDER BY event_id DESC

            */

            $ehtml = '<div class="col-12 invisible">
                <div class="row m-1 bg_4 rounded">

                <div class="col-11 bg_4 py-2 rounded">
                  test
                </div>

                <form class="col-1 bg_4 ps-xxl-5 ps-sm-2 rounded">
                  <input type="hidden" name="ID" value="test"></input>
                  <input type="hidden" name="DeleteID" value="test"></input>
                  <button name="remove" class="btn fc_1">
                    <i class="fas fa-times-circle fa-2x "></i>
                  </button>
                </form>

                <div class="col-3 bg_4 align-self-center rounded">
                test
                </div>

                <div class="col-3 bg_4  align-self-center rounded">
                  test
                </div>

                <div class="col-3 bg_4  rounded">
                  Repeat
                  <button type="button" class="btn fc_2" data-bs-toggle="popover" title="Weekday:"
                    data-bs-content=
                    "test"; 
                    >
                    <i class="fas fa-calendar-week fa-lg"></i>
                  </button>
                </div>

                <div class="col-3 bg_4  rounded">
                  Description
                  <button type="button" class="btn fc_2" data-bs-toggle="popover" title="Description"
                    data-bs-content=
                    "test"; 
                    >
                    <i class="fas fa-info-circle fa-lg"></i>
                  </button>

                </div>

                </div>

                </div>';


            $total = count($items);

            for ($x = 0 ;$x <= 5; $x++) {
              if($total > $count){
                echo 
                  '<div class="col-12">
                  <div class="row m-1 bg_4 rounded">
    
    
                  <div class="col-11 bg_4 py-2 rounded">
                    ' . $items[$count][1]  .'
                  </div>
    
                  <form class="col-1 bg_4 ps-xxl-5 ps-sm-2 rounded">
                    <input type="hidden" name="ID" value=' . $id .'></input>
                    <input type="hidden" name="DeleteID" value='. $items[$count][0] .'></input>
                    <input type="hidden" name="Page" value=' . $page .'></input>
                    <button name="remove" class="btn fc_1">
                      <i class="fas fa-times-circle fa-2x "></i>
                    </button>
                  </form>
    
    
                  <div class="col-2 bg_4  align-self-center rounded">
                    '. date('h:i:s a', strtotime($items[$count][3])) .'
                  </div>

                  <div class="col-3 bg_4 align-self-center rounded">
                  '. date('m/d/Y', strtotime($items[$count][4])).' - ' .  date('m/d/Y', strtotime($items[$count][5])) .'
                  </div>

                  <div class="col-2 bg_4  rounded">
                    Medication
                    <button type="button" class="btn fc_2" data-bs-toggle="popover" title="Medication Name:"
                      data-bs-content=
                      "'. $items[$count][2] . '"; 
                      >
                      <i class="fas fa-pills fa-lg"></i>
                    </button>
                  </div>
    
                  <div class="col-2 bg_4  rounded">
                    Repeat
                    <button type="button" class="btn fc_2" data-bs-toggle="popover" title="Weekday:"
                      data-bs-content=
                      "'. $items[$count][7] . '"; 
                      >
                      <i class="fas fa-calendar-week fa-lg"></i>
                    </button>
                  </div>
    
                  <div class="col-3 bg_4  rounded">
                    Description
                    <button type="button" class="btn fc_2" data-bs-toggle="popover" title="Description:"
                      data-bs-content=
                      "'. $items[$count][6] . '"; 
                      >
                      <i class="fas fa-info-circle fa-lg"></i>
                    </button>
    
                  </div>
    
                  </div>
    
                  </div>'
                ;
                $count = $count + 1;
              }else{
                echo $ehtml;
              }
            }
            

          ?>

          <!--after event items-->

          <div class="col-12 py-4">
            <nav id="nav_allitem" class="pt-2">
            <form>
              <ul class="pagination justify-content-center align-self-center">
                <input type="hidden" name="ID" value=<?php echo $id;?>></input>
                <?php

                  $y = intdiv($total, 6);
                  if($y < $total/6){
                    $y = $y +1;
                  }

                  if ($page == 1) {
                    echo '<li class="page-item disabled"><button name="Page" value="'. ($page - 1).'" class="page-link rounded-start" href="#">Previous</button></li>';
                  }else {
                    echo '<li class="page-item "><button name="Page" value="'. ($page - 1).'" class="page-link rounded-start" href="#">Previous</button></li>';
                    if( ($page == $y) && (2 < $total/6) ){
                      echo '<li class="page-item "><button name="Page" value="'. ($page - 2).'" class="page-link rounded-start" href="#">'. $page - 2 .'</button></li>';
                    }
                    echo '<li class="page-item "><button name="Page" value="'. ($page - 1).'" class="page-link rounded-start" href="#">'. $page - 1 .'</button></li>';
                  
                  }

                  echo '<li class="page-item active"><button name="Page" value="'. $page.'" class="page-link rounded-start" href="#">'. $page .'</button></li>';
                  

                  if ($page == $y || $y == 0) {
                    echo '<li class="page-item disabled"><button name="Page" value="'. ($page + 1).'" class="page-link rounded-start" href="#">Next</button></li>';
                  }else {
                    echo '<li class="page-item "><button name="Page" value="'. ($page + 1).'" class="page-link rounded-start" href="#">'. $page + 1 .'</button></li>';
                    if( ($page == 1) && (2 < $total/6) ){
                      echo '<li class="page-item "><button name="Page" value="'. ($page + 2).'" class="page-link rounded-start" href="#">'. $page + 2 .'</button></li>';
                    }
                    echo '<li class="page-item "><button name="Page" value="'. ($page + 1).'" class="page-link rounded-start" href="#">Next</button></li>';
                  }
                ?>
              </ul>
              </form>
            </nav>
          </div>
    


        </div>
      </div>
    </div>
  </div>
  <?php

  if($debug == "RemoveEvent"){
    echo '
    <div class="toast-container position-absolute bottom-0 end-0 p-3">
    <div class="toast show" role="alert" aria-live="assertive" >
      <div class="toast-header">

        <strong class="me-auto">Event List Updated!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Event Removed Successfully! 
      </div>
    </div>';
  }else if($debug == "AddEvent"){
    echo '
    <div class="toast-container position-absolute bottom-0 end-0 p-3">
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" >
      <div class="toast-header">
  
        <strong class="me-auto">Event List Updated!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
      Event Added Successfully ! 
      </div>
    </div>';
  }

  ?>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/55588c0c96.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/VisualChange.js"></script>
<script type="text/javascript" src="js/Planner.js"></script>


</html>















<!-- 
          Event item html sample code

          <div class="col-12">
            <div class="row m-1 bg_4 rounded">

              <div class="col-11 bg_4 py-2 rounded">
              <?php 
                echo $items[$count][1];
                ?>
              </div>

              <form class="col-1 bg_4 ps-xxl-5 ps-sm-2 rounded">
                <input type="hidden" name="ID" value=<?php echo $id;?>></input>
                <input type="hidden" name="DeleteID" value=<?php echo $items[$count][0];?>></input>
                <button name="remove" class="btn fc_1">
                  <i class="fas fa-times-circle fa-2x "></i>
                </button>
              </form>

              <div class="col-3 bg_4 align-self-center rounded">
                <?php echo date('m/d/Y', strtotime($items[$count][4]));?> -
                <?php echo date('m/d/Y', strtotime($items[$count][5]));?>
              </div>

              <div class="col-3 bg_4  align-self-center rounded">
                <?php 
                  echo date('h:i:s a', strtotime($items[$count][3]));
                ?>
              </div>

              <div class="col-3 bg_4  rounded">
                Repeat
                <button type="button" class="btn fc_2" data-bs-toggle="popover" title="Weekday:" data-bs-content=<?php
                  echo '"'. $items[$count][7] . '"'; 
                  ?>>
                  <i class="fas fa-calendar-week fa-lg"></i>
                </button>
              </div>

              <div class="col-3 bg_4  rounded">
                Description
                <button type="button" class="btn fc_2" data-bs-toggle="popover" title="Description" data-bs-content=<?php
                  echo '"'. $items[$count][6] . '"'; 
                  ?>>
                  <i class="fas fa-info-circle fa-lg"></i>
                </button>

              </div>

            </div>

          </div>

-->
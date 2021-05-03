<?php
  if(isset($_GET['ID'])){
    include 'dbconnect.php';
    $id = $_GET['ID'];
    $debug ='NO Message';
    if(isset($_GET['debug'])){
      $debug = $_GET['debug'];
    }
    if(isset($_GET['medPage'])){
      $medpage = $_GET['medPage'];
      $medcount = 8 * ($medpage - 1);
    }else{
      $medpage = 1;
      $medcount= 0;
    }

    if(isset($_GET['tmedPage'])){
      $tmedpage = $_GET['tmedPage'];
      $tmedcount = 8 * ($tmedpage - 1);
    }else{
      $tmedpage = 1;
      $tmedcount= 0;
    }

    if(isset($_GET['tPage'])){
      $tpage = $_GET['tPage'];
      $tcount = 8 * ($tpage - 1);
    }else{
      $tpage = 1;
      $tcount= 0;
    }

    if(isset($_GET['today'])){
      $today = $_GET['today'];
      $weekday = $_GET['weekday'];
    }else{
      header("Location: getDate.php?ID=". $id);
    }

    if(isset($_GET['trackPage'])){
      $tpage = $_GET['trackPage'];
      $tcount = 8 * ($tpage - 1);
    }else{
      $tpage = 1;
      $tcount= 0;
    }

    $query = 'SELECT email FROM users WHERE id="' . $id .'"';
    $email = mysqli_fetch_array(mysqli_query($db, $query))[0];


    //create temp sql table
    if(true){
      $create_table = "CREATE TABLE " . $id . "temp (
        t_id int(11) NOT NULL AUTO_INCREMENT,
        item_id int(11) NOT NULL,
        med_name varchar(255) NOT NULL,
        quantity varchar(255) NOT NULL,
        q_type varchar(255) NOT NULL,
        PRIMARY KEY (t_id) USING BTREE,
        UNIQUE (item_id)
      ) DEFAULT CHARSET=utf8";
    
      mysqli_query($db, $create_table);
              
    }

    if(isset($_GET['addtoTrack'])){
      $query = '
      INSERT INTO '.$id.'temp ( 
        item_id,
        med_name,
        quantity,
        q_type) VALUES(
          "'. $_GET['addtoTrack'].'",
          "'. $_GET['med_name'].'",
          "'. $_GET['med_q'].'",
          "'. $_GET['med_t'].'"
        )
      ';
      mysqli_query($db, $query);
    }

    if(isset($_GET['update_id'])){

      if(isset($_GET['update_q'])){

        $query = '
        UPDATE `'.$email.'`
        SET quantity ='.$_GET['update_q'] .'
        WHERE item_id ="'. $_GET['update_item'].'"';

        mysqli_query($db, $query);

        
        $query = '
        DELETE FROM '.$id.'temp 
        WHERE t_id ="'. $_GET['update_id'].'"';
        mysqli_query($db, $query);

      }else{
        $query = '
        DELETE FROM '.$id.'temp 
        WHERE t_id ="'. $_GET['update_id'].'"';

        mysqli_query($db, $query);
      }
    }
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

    

  }else{
    header("Location: index.php");
  }

?>

<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


  <link rel="stylesheet" href="css/dashboard.css">
</head>

<body class="container-fluid bg_3 ">
  <nav class="navbar navbar-md fixed-top navbar-dark bg_1 border-bottom border-dark" >
    <div class="container-fluid">


      <form>
        <input type="hidden" name="ID" value=<?php echo $id;?>></input>

        <button class="navbar-brand nav_clear" formaction="Dashboard.php">
          <img src="art/MedMap_Logo.png" alt="" Width="100" height="80" class="d-inline-block align-text-top">
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
            <i class="fas fa-compass fa-2x align-self-center pt-1 px-1 fc_2"></i>
            <button class="nav-link nav_clear active fs-5" formaction="Dashboard.php">Dashboard</button>
          </li>
          <li class="nav-item d-flex justify-content-end">
            <i class="far fa-calendar-alt fa-2x align-self-center pt-1 px-1"></i>
            <button class="nav-link nav_clear fs-5" formaction="Planner.php">Planner</button>
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
            <button class="nav-link nav_clear fs-5" formaction="logout.php">Logout</button>
          </li>
        </form>
      </div>
    </div>
  </nav>

  <div class="container-fluid p-0 mt-2">

    <div class="row">
    

      <div class="container col-xxl col-md-12  ">

        <div class="row border border-dark p-4 fc_2 bg_5">
          <div class="col-2 d-flex invisible">
            <i class="fas fa-chevron-left fa-2x"></i>
          </div>
          <div class="col-8">
            <div id="month" class="row d-flex justify-content-center">
              Month
            </div>
            <div id="year" class="row d-flex justify-content-center">
              year
            </div>
          </div>
          <div class="col-2 d-flex ">
            <form>
              <input type="hidden" name="ID" value=<?php echo $id;?>></input>
              <button class="navbar-brand nav_clear" formaction="Planner.php">
                <i class="far fa-calendar-alt fa-2x align-self-center text-light"></i>
              </button>
            </form>
          </div>
        </div>


        <div class="row border border-dark bg_4 fc_2">

          <div class="col-2 p-3 border border-top-0 border-bottom-0 border-dark">

            <div class="row text-center m-0 d-flex justify-content-center">
              Sunday
            </div>
            <div id="0" class="row text-center m-0 d-flex justify-content-center">
              day
            </div>
          </div>


          <div id="0event" class="col-10">
            <?php 
              include "dbconnect.php";

              if($weekday =='Sun'){
                $query = "SELECT  title, med_name, start_time, description
                FROM ". $id ."event
                WHERE start_date <= '".$today."'
                AND end_date >= '".$today."'
                AND (FIND_IN_SET('All',occur_day)>0 OR FIND_IN_SET('Sun',occur_day)>0) 
                ORDER BY start_time ASC";
                $eventlist = mysqli_fetch_all(mysqli_query($db, $query)); 
  
                foreach ($eventlist as $list){
                  echo '<button type="button" class="btn btn-primary border-light fc_2" data-bs-toggle="popover" title="Medication: '. $list[1] . '"
                        data-bs-content=
                        "'. $list[3] . '"; 
                        >
                        <span>'. $list[0] . ' </span>
                      </button>';
                }

              }
            ?>
            
          </div>

        </div>


        <div class="row border border-dark bg_4 fc_2">

          <div class="col-2 p-3 border border-top-0 border-bottom-0 border-dark">

            <div class="row text-center m-0 d-flex justify-content-center">
              Monday
            </div>
            <div id="1" class="row text-center m-0 d-flex justify-content-center">
              day
            </div>
          </div>


          <div id="1event" class="col-10">
          <?php 
              include "dbconnect.php";

              if($weekday =='Mon'){
                $query = "SELECT  title, med_name, start_time, description
                FROM ". $id ."event
                WHERE start_date <= '".$today."'
                AND end_date >= '".$today."'
                AND (FIND_IN_SET('All',occur_day)>0 OR FIND_IN_SET('Sun',occur_day)>0) 
                ORDER BY start_time ASC";
                $eventlist = mysqli_fetch_all(mysqli_query($db, $query)); 
  
                foreach ($eventlist as $list){
                  echo '<button type="button" class="btn btn-primary border-light fc_2" data-bs-toggle="popover" title="Medication: '. $list[1] . '"
                        data-bs-content=
                        "'. $list[3] . '"; 
                        >
                        <span>'. $list[0] . ' </span>
                      </button>';
                }

              }
            ?>
          </div>
        </div>

        <div class="row border border-dark bg_4 fc_2">

          <div class="col-2 p-3 border border-top-0 border-bottom-0 border-dark">

            <div class="row text-center m-0 d-flex justify-content-center">
              Tuesday
            </div>
            <div id="2" class="row text-center m-0 d-flex justify-content-center">
              day
            </div>
          </div>


          <div id="2event" class="col-10">
          <?php 
              include "dbconnect.php";

              if($weekday =='Tue'){
                $query = "SELECT  title, med_name, start_time, description
                FROM ". $id ."event
                WHERE start_date <= '".$today."'
                AND end_date >= '".$today."'
                AND (FIND_IN_SET('All',occur_day)>0 OR FIND_IN_SET('Sun',occur_day)>0) 
                ORDER BY start_time ASC";
                $eventlist = mysqli_fetch_all(mysqli_query($db, $query)); 
  
                foreach ($eventlist as $list){
                  echo '<button type="button" class="btn btn-primary border-light fc_2" data-bs-toggle="popover" title="Medication: '. $list[1] . '"
                        data-bs-content=
                        "'. $list[3] . '"; 
                        >
                        <span>'. $list[0] . ' </span>
                      </button>';
                }

              }
            ?>
          </div>

        </div>

        <div class="row border border-dark bg_4 fc_2">

          <div class="col-2 p-3 border border-top-0 border-bottom-0 border-dark">

            <div class="row text-center m-0 d-flex justify-content-center">
              Wednesday
            </div>
            <div id="3" class="row text-center m-0 d-flex justify-content-center">
              day
            </div>
          </div>


          <div id="3event" class="col-10">
          <?php 
              include "dbconnect.php";

              if($weekday =='Wed'){
                $query = "SELECT  title, med_name, start_time, description
                FROM ". $id ."event
                WHERE start_date <= '".$today."'
                AND end_date >= '".$today."'
                AND (FIND_IN_SET('All',occur_day)>0 OR FIND_IN_SET('Sun',occur_day)>0) 
                ORDER BY start_time ASC";
                $eventlist = mysqli_fetch_all(mysqli_query($db, $query)); 
  
                foreach ($eventlist as $list){
                  echo '<button type="button" class="btn btn-primary border-light fc_2" data-bs-toggle="popover" title="Medication: '. $list[1] . '"
                        data-bs-content=
                        "'. $list[3] . '"; 
                        >
                        <span>'. $list[0] . ' </span>
                      </button>';
                }

              }
            ?>
          </div>


        </div>

        <div class="row border border-dark bg_4 fc_2">

          <div class="col-2 p-3 border border-top-0 border-bottom-0 border-dark">

            <div class="row text-center m-0 d-flex justify-content-center">
              Thursday
            </div>
            <div id="4" class="row text-center m-0 d-flex justify-content-center">
              day
            </div>
          </div>


          <div id="4event" class="col-10">
          <?php 
              include "dbconnect.php";

              if($weekday =='Thu'){
                $query = "SELECT  title, med_name, start_time, description
                FROM ". $id ."event
                WHERE start_date <= '".$today."'
                AND end_date >= '".$today."'
                AND (FIND_IN_SET('All',occur_day)>0 OR FIND_IN_SET('Sun',occur_day)>0) 
                ORDER BY start_time ASC";
                $eventlist = mysqli_fetch_all(mysqli_query($db, $query)); 
  
                foreach ($eventlist as $list){
                  echo '<button type="button" class="btn btn-primary border-light fc_2" data-bs-toggle="popover" title="Medication: '. $list[1] . '"
                        data-bs-content=
                        "'. $list[3] . '"; 
                        >
                        <span>'. $list[0] . ' </span>
                      </button>';
                }

              }
            ?>
          </div>


        </div>


        <div class="row border border-dark bg_4 fc_2">

          <div class="col-2 p-3 border border-top-0 border-bottom-0 border-dark">

            <div class="row text-center m-0 d-flex justify-content-center">
              Friday
            </div>
            <div id="5" class="row text-center m-0 d-flex justify-content-center">
              day
            </div>
          </div>


          <div id="5event"id="5event" class="col-10">
          <?php 
              include "dbconnect.php";

              if($weekday =='Fri'){
                $query = "SELECT  title, med_name, start_time, description
                FROM ". $id ."event
                WHERE start_date <= '".$today."'
                AND end_date >= '".$today."'
                AND (FIND_IN_SET('All',occur_day)>0 OR FIND_IN_SET('Sun',occur_day)>0) 
                ORDER BY start_time ASC";
                $eventlist = mysqli_fetch_all(mysqli_query($db, $query)); 
  
                foreach ($eventlist as $list){
                  echo '<button type="button" class="btn btn-primary border-light fc_2" data-bs-toggle="popover" title="Medication: '. $list[1] . '"
                        data-bs-content=
                        "'. $list[3] . '"; 
                        >
                        <span>'. $list[0] . ' </span>
                      </button>';
                }

              }
            ?>
          </div>


        </div>


        <div class="row border border-dark bg_4 fc_2">

          <div class="col-2 p-3 border border-top-0 border-bottom-0 border-dark">

            <div class="row text-center m-0 d-flex justify-content-center">
              Saturday
            </div>
            <div id="6" class="row text-center m-0 d-flex justify-content-center">
              day
            </div>
          </div>


          <div id="6event" class="col-10">
          <?php 
              include "dbconnect.php";

              if($weekday =='Sat'){
                $query = "SELECT  title, med_name, start_time, description
                FROM ". $id ."event
                WHERE start_date <= '".$today."'
                AND end_date >= '".$today."'
                AND (FIND_IN_SET('All',occur_day)>0 OR FIND_IN_SET('Sun',occur_day)>0) 
                ORDER BY start_time ASC";
                $eventlist = mysqli_fetch_all(mysqli_query($db, $query)); 
  
                foreach ($eventlist as $list){
                  echo '<button type="button" class="btn btn-primary border-light fc_2" data-bs-toggle="popover" title="Medication: '. $list[1] . '"
                        data-bs-content=
                        "'. $list[3] . '"; 
                        >
                        <span>'. $list[0] . ' </span>
                      </button>';
                }

              }
            ?>
          </div>


        </div>

      </div>


      <div class="container border border-dark col-xxl-4 col-lg col-sm-12 bg_5 ms-xxl-2 mt-sm-2 mt-xxl-0">

        <div class="d-flex justify-content-center text-light">
          Medications
        </div>

        <!--Medication Item Sort Tabs-->
        <ul class="nav nav-tabs pt-1">
          <li class="nav-item">
            <button id="alltrigger" type="button" class="nav-link
            <?php 
              if(isset($_GET['medPage'])){
                echo 'active';
              }else if(isset($_GET['tmedPage'])){
                echo 'border-light text-light';
              }else{
                echo 'active';
              }
            ?>
            " onclick="enableMedAll()">All</button>
          </li>

          <li class="nav-item">
            <button id="todaytrigger" type="button" class="nav-link 
            <?php 
              if(isset($_GET['tmedPage'])){
                echo 'active';
              }else if(isset($_GET['medPage'])){
                echo 'border-light text-light';
              }else{
                echo 'border-light text-light';
              }
            ?>"
              onclick="enableMedToday()">Today</button>
          </li>


          <li class="flex-fill position-relative">
            <!--
            <button type="button" class="btn position-absolute bottom-0 end-0" data-bs-toggle="modal"
              data-bs-target="#exampleModal1">
              <i class="fas fa-pills fa-2x text-light"></i>
            </button>
            -->
            <form>
              <input type="hidden" name="ID" value=<?php echo $id;?>></input>
              <button class="navbar-brand nav_clear position-absolute bottom-0 end-0" formaction="Item.php">
                <i class="fas fa-pills fa-2x align-self-center text-light"></i>
              </button>
            </form>
          </li>

        </ul>

        <div class="container-fluid overfluid-scroll text-light p-0">

          <div id="AllMedication" <?php 
              if(isset($_GET['medPage'])){
                echo '';
              }else if(isset($_GET['tmedPage'])){
                echo 'hidden';
              }else{
                echo '';
              }
            ?>>

            <div class="py-3">
              <ul class="list-group">
                <?php
                  include 'dbconnect.php';
                  $query = "
                  SELECT item_id, name, description, quantity, units
                  FROM `" . $email . "`
                  WHERE item_id NOT IN (SELECT item_id FROM ". $id."temp)
                  ORDER BY item_id DESC";

                  //echo $query;

                  $meditems = mysqli_fetch_all(mysqli_query($db, $query));

                  //print_r($meditems);
                  /*
                  sql test sample
                  
                  SELECT item_id, name, description, quantity, q_type
                  FROM testidemail
                  ORDER BY item_id DESC

                  */

                  $medhtml = '<li class="list-group-item invisible">
                        <div class="container-fluid m-0 p-0">

                          <div class="row">

                            <div class="col-5 align-self-center">
                              <div>
                                Medication Name
                              </div>
                            </div>


                            <!--
                            
                            <div class="col-5 align-self-center">
                              <div class="row">

                                <i class="col-2 fas fa-box"></i>
                                
                                <div class="col-5">
                                  Amount
                                </div>
                                <div class="col-5 p-0">
                                  unit
                                </div>
                                
                              </div>
                            </div>
                            -->

                            <div class="col-5 align-self-center ">

                              <div class="input-group input-group-sm">
                                <span class="input-group-text " id="inputGroup-sizing-sm"><i
                                    class="col-2 fas fa-box"></i></span>
                                <span class="form-control">Amount</span>
                                <span class="input-group-text">Unit</span>
                              </div>

                            </div>


                            <div class="col-2 align-self-center">
                              <button class="btn btn-dark ">
                                Track
                              </button>
                            </div>

                          </div>
                        </div>
                      </li>';
                  $medtotal = count($meditems);

                  for ($x = 0 ;$x <= 8; $x++) {
                    if($medtotal > $medcount){
                      echo '
                        <li class="list-group-item" id ="' . $meditems[$medcount][0]  .'">
                          <div class="container-fluid m-0 p-0">
        
                            <div class="row">
        
                              <div class="col-5 align-self-center">
                                <div>
                                ' . $meditems[$medcount][1]  .'
                                </div>
                              </div>
        
                              <div class="col-5 align-self-center ">
        
                                <div class="input-group input-group-sm">
                                  <span class="input-group-text " id="inputGroup-sizing-sm"><i
                                      class="col-2 fas fa-box"></i></span>
                                  <span class="form-control">' . $meditems[$medcount][3]  .'</span>
                                  <span class="input-group-text">' . $meditems[$medcount][4]  .'</span>
                                </div>
        
                              </div>
        
        
                              <div class="col-2 align-self-center">
                                <form>
                                  <input type="hidden" name="ID" value='. $id .'></input>
                                  <input type="hidden" name="today" value='. $today .'></input>
                                  <input type="hidden" name="weekday" value='. $weekday .'></input>
                                  <input type="hidden" name="medPage" value='. $medpage .'></input>
                                  <input type="hidden" name="addtoTrack" value=' . $meditems[$medcount][0]  .'></input>
                                  <input type="hidden" name="med_name" value=' . $meditems[$medcount][1]  .'></input>
                                  <input type="hidden" name="med_q" value=' . $meditems[$medcount][3]  .'></input>
                                  <input type="hidden" name="med_t" value=' . $meditems[$medcount][4]  .'></input>
                                  <button class="btn btn-dark ">
                                    Track
                                  </button>
                                </form>
                              </div>
        
                            </div>
                          </div>
                        </li>';
                      $medcount = $medcount + 1;
                    }else{
                      echo $medhtml;
                    }
                  }
                  
                  

                ?>

                <!--
                <li class="list-group-item">
                  <div class="container-fluid m-0 p-0">

                    <div class="row">

                      <div class="col-5 align-self-center">
                        <div>
                          Medication Name
                        </div>
                      </div>

                      <div class="col-5 align-self-center ">

                        <div class="input-group input-group-sm">
                          <span class="input-group-text " id="inputGroup-sizing-sm"><i
                              class="col-2 fas fa-box"></i></span>
                          <span class="form-control">Amount</span>
                          <span class="input-group-text">Unit</span>
                        </div>

                      </div>


                      <div class="col-2 align-self-center">
                        <button class="btn btn-dark ">
                          Track
                        </button>
                      </div>

                    </div>
                  </div>
                </li>
                -->


              </ul>
            </div>

            <nav id="nav_allitem" class="pt-2">
              <form>
                <ul class="pagination justify-content-center">
                  <input type="hidden" name="ID" value=<?php echo $id;?>></input>
                  <input type="hidden" name="today" value=<?php echo $today;?>></input>
                  <input type="hidden" name="weekday" value=<?php echo $weekday;?>></input>
                  <?php

                    $y = intdiv($medtotal,8);
                    if($y < $medtotal/8){
                      $y = $y +1;
                    }

                    if ($medpage == 1) {
                      echo '<li class="page-item disabled"><button name="medPage" value="'. ($medpage - 1).'" class="page-link rounded-start" href="#">Previous</button></li>';
                    }else {
                      echo '<li class="page-item "><button name="medPage" value="'. ($medpage - 1).'" class="page-link rounded-start" href="#">Previous</button></li>';
                      if( ($medpage == $y) && (2 < $medtotal/8) ){
                        echo '<li class="page-item "><button name="medPage" value="'. ($medpage - 2).'" class="page-link rounded-start" href="#">'. $medpage - 2 .'</button></li>';
                      }
                      echo '<li class="page-item "><button name="medPage" value="'. ($medpage - 1).'" class="page-link rounded-start" href="#">'. $medpage - 1 .'</button></li>';
                    
                    }

                    echo '<li class="page-item active"><button name="medPage" value="'. $medpage.'" class="page-link rounded-start" href="#">'. $medpage .'</button></li>';
                    

                    if ($medpage == $y || $y == 0) {
                      echo '<li class="page-item disabled"><button name="medPage" value="'. ($medpage + 1).'" class="page-link rounded-start" href="#">Next</button></li>';
                    }else {
                      echo '<li class="page-item "><button name="medPage" value="'. ($medpage + 1).'" class="page-link rounded-start" href="#">'. $medpage + 1 .'</button></li>';
                      if( ($medpage == 1) && (2 < $medtotal/8) ){
                        echo '<li class="page-item "><button name="medPage" value="'. ($medpage + 2).'" class="page-link rounded-start" href="#">'. $medpage + 2 .'</button></li>';
                      }
                      echo '<li class="page-item "><button name="medPage" value="'. ($medpage + 1).'" class="page-link rounded-start" href="#">Next</button></li>';
                    }
                  ?>
                </ul>
              </form>
            </nav>
          </div>

          <div id="TodayMedication" <?php 
              if(isset($_GET['tmedPage'])){
                echo '';
              }else{
                echo 'hidden';
              }
            ?>>

            <div class="py-3">
              <ul class="list-group">

                <?php
                  include 'dbconnect.php';
                  $query = "SELECT item_id, name, description, quantity, units 
                    FROM `". $email ."`
                    WHERE name IN (
                      SELECT med_name
                      FROM ". $id ."event
                      WHERE start_date <= '". $today ."' 
                      AND end_date >= '". $today ."' 
                      AND (FIND_IN_SET('All',occur_day)>0 OR FIND_IN_SET('". $weekday ."',occur_day)>0)
                    ) AND item_id NOT IN (SELECT item_id FROM ". $id."temp)";
                  
                  //echo $query;


                  $tmeditems = mysqli_fetch_all(mysqli_query($db, $query));

                  //print_r($meditems);
                  /*
                  sql test sample
                  
                  
                  SELECT item_id, name, description, quantity, q_type 
                  FROM testidemail
                  WHERE name IN (
                    SELECT med_name
                    FROM 40405050event
                    WHERE start_date <= '2021-05-02' 
                    AND end_date >= '2021-05-02' 
                    AND (FIND_IN_SET('All',occur_day)>0 OR FIND_IN_SET('Sun',occur_day)>0)
                    )

                  */

                  $tmedhtml = '<li class="list-group-item invisible">
                        <div class="container-fluid m-0 p-0">

                          <div class="row">

                            <div class="col-5 align-self-center">
                              <div>
                                Medication Name
                              </div>
                            </div>


                            <!--
                            
                            <div class="col-5 align-self-center">
                              <div class="row">

                                <i class="col-2 fas fa-box"></i>
                                
                                <div class="col-5">
                                  Amount
                                </div>
                                <div class="col-5 p-0">
                                  unit
                                </div>
                                
                              </div>
                            </div>
                            -->

                            <div class="col-5 align-self-center ">

                              <div class="input-group input-group-sm">
                                <span class="input-group-text " id="inputGroup-sizing-sm"><i
                                    class="col-2 fas fa-box"></i></span>
                                <span class="form-control">Amount</span>
                                <span class="input-group-text">Unit</span>
                              </div>

                            </div>


                            <div class="col-2 align-self-center">
                              <button class="btn btn-dark ">
                                Track
                              </button>
                            </div>

                          </div>
                        </div>
                      </li>';
                  $tmedtotal = count($tmeditems);

                  for ($x = 0 ;$x <= 8; $x++) {
                    if($tmedtotal > $tmedcount){
                      echo '
                        <li class="list-group-item" id ="' . $tmeditems[$tmedcount][0]  .'">
                          <div class="container-fluid m-0 p-0">
        
                            <div class="row">
        
                              <div class="col-5 align-self-center">
                                <div>
                                ' . $tmeditems[$tmedcount][1]  .'
                                </div>
                              </div>
        
                              <div class="col-5 align-self-center ">
        
                                <div class="input-group input-group-sm">
                                  <span class="input-group-text " id="inputGroup-sizing-sm"><i
                                      class="col-2 fas fa-box"></i></span>
                                  <span class="form-control">' . $tmeditems[$tmedcount][3]  .'</span>
                                  <span class="input-group-text">' . $tmeditems[$tmedcount][4]  .'</span>
                                </div>
        
                              </div>
        
        
                              <div class="col-2 align-self-center">
                                <form>
                                  <input type="hidden" name="ID" value='. $id .'></input>
                                  <input type="hidden" name="today" value='. $today .'></input>
                                  <input type="hidden" name="weekday" value='. $weekday .'></input>
                                  <input type="hidden" name="tmedPage" value='. $tmedpage .'></input>
                                  <input type="hidden" name="addtoTrack" value=' . $tmeditems[$tmedcount][0]  .'></input>
                                  <input type="hidden" name="med_name" value=' . $tmeditems[$tmedcount][1]  .'></input>
                                  <input type="hidden" name="med_q" value=' . $tmeditems[$tmedcount][3]  .'></input>
                                  <input type="hidden" name="med_t" value=' . $tmeditems[$tmedcount][4]  .'></input>
                                  <button class="btn btn-dark ">
                                    Track
                                  </button>
                                </form>
                              </div>
        
                            </div>
                          </div>
                        </li>';
                      $tmedcount = $tmedcount + 1;
                    }else{
                      echo $tmedhtml;
                    }
                  }
                  
                  

                ?>

                <!--
                <li class="list-group-item">
                  <div class="container-fluid m-0 p-0">

                    <div class="row">

                      <div class="col-5 align-self-center">
                        <div>
                          Medication Name
                        </div>
                      </div>

                      <div class="col-5 align-self-center ">

                        <div class="input-group input-group-sm">
                          <span class="input-group-text " id="inputGroup-sizing-sm"><i
                              class="col-2 fas fa-box"></i></span>
                          <span class="form-control">Amount</span>
                          <span class="input-group-text">Unit</span>
                        </div>

                      </div>


                      <div class="col-2 align-self-center">
                        <button class="btn btn-dark ">
                          Track
                        </button>
                      </div>

                    </div>
                  </div>
                </li>
                -->


              </ul>
              
            </div>

            <nav id="nav_allitem" class="pt-2">
              <form>
                <input type="hidden" name="ID" value=<?php echo $id;?>></input>
                <input type="hidden" name="today" value=<?php echo $today;?>></input>
                <input type="hidden" name="weekday" value=<?php echo $weekday;?>></input>
                <ul class="pagination justify-content-center">
                  <input type="hidden" name="ID" value=<?php echo $id;?>></input>
                  <?php

                    $y = intdiv($tmedtotal,8);
                    if($y < $tmedtotal/8){
                      $y = $y +1;
                    }

                    if ($tmedpage == 1) {
                      echo '<li class="page-item disabled"><button name="medPage" value="'. ($tmedpage - 1).'" class="page-link rounded-start" href="#">Previous</button></li>';
                    }else {
                      echo '<li class="page-item "><button name="medPage" value="'. ($tmedpage - 1).'" class="page-link rounded-start" href="#">Previous</button></li>';
                      if( ($tmedpage == $y) && (2 < $tmedtotal/8) ){
                        echo '<li class="page-item "><button name="medPage" value="'. ($tmedpage - 2).'" class="page-link rounded-start" href="#">'. $tmedpage - 2 .'</button></li>';
                      }
                      echo '<li class="page-item "><button name="medPage" value="'. ($tmedpage - 1).'" class="page-link rounded-start" href="#">'. $tmedpage - 1 .'</button></li>';
                    
                    }

                    echo '<li class="page-item active"><button name="medPage" value="'. $medpage.'" class="page-link rounded-start" href="#">'. $tmedpage .'</button></li>';
                    

                    if ($tmedpage == $y || $y == 0) {
                      echo '<li class="page-item disabled"><button name="medPage" value="'. ($tmedpage + 1).'" class="page-link rounded-start" href="#">Next</button></li>';
                    }else {
                      echo '<li class="page-item "><button name="medPage" value="'. ($tmedpage + 1).'" class="page-link rounded-start" href="#">'. $tmedpage + 1 .'</button></li>';
                      if( ($tmedpage == 1) && (2 < $tmedtotal/8) ){
                        echo '<li class="page-item "><button name="medPage" value="'. ($tmedpage + 2).'" class="page-link rounded-start" href="#">'. $tmedpage + 2 .'</button></li>';
                      }
                      echo '<li class="page-item "><button name="medPage" value="'. ($tmedpage + 1).'" class="page-link rounded-start" href="#">Next</button></li>';
                    }
                  ?>
                </ul>
              </form>
            </nav>
          </div>

        </div>

      </div>

      <div
        class="container border border-dark col-xxl-4 col-lg col-sm-12 bg_5 ms-xxl-2 mt-sm-2 ms-lg-2 ms-xxl-0 mt-xxl-0">
        <div class="d-flex justify-content-center text-light">
          Medication Tracker
        </div>

        <ul class="nav nav-tabs pt-1 border-bottom-0">
          <li class="nav-item invisible">
            <a class="nav-link active" href="#">All</a>
          </li>

          <li class="flex-fill position-relative">
            <button type="button" class="btn position-absolute bottom-0 end-0" data-bs-toggle="modal"
              data-bs-target="#exampleModal2">
              <i class="fas fa-question-circle fa-2x text-light"></i>
            </button>
          </li>
        </ul>

        <div class="container-fluid overfluid-scroll text-light p-0">

          <div>
            <div class="py-3">
              <ul class="list-group">

                <?php
                  include 'dbconnect.php';
                  $query = "
                    SELECT t_id, item_id, med_name, quantity, q_type
                    FROM " . $id ."temp
                    ORDER BY item_id ASC";
                  
                  //echo $query;


                  $titems = mysqli_fetch_all(mysqli_query($db, $query));

                  $thtml = '<li class="list-group-item invisible">
                    <div class="container-fluid m-0 p-0">
                      <div class="row">

                        <div class="col-5 align-self-center pe-0">
                          <div>
                            Medication Name
                          </div>
                        </div>

                        <div class="col-4 align-self-center ps-0">

                          <div class="input-group input-group-sm">
                            <span class="input-group-text " id="inputGroup-sizing-sm">QTY</span>
                            <input type="number" class="form-control">
                            <span class="input-group-text">Unit</span>
                          </div>

                        </div>

                        <div class="col-2 align-self-center ">
                          <button class="btn btn-dark ">
                            Remove
                          </button>
                        </div>

                      </div>
                    </div>

                    </li>';
                  $ttotal = count($titems);

                  for ($x = 0 ;$x <= 7; $x++) {
                    if($ttotal > $tcount){
                      echo'
                      <li class="list-group-item">
                      <div class="container-fluid m-0 p-0">
                        <div class="row">
    
                          <div class="col-5 align-self-center pe-0">
                            <div>
                            ' . $titems[$tcount][2]  .'
                            </div>
                          </div>

                          
                          
                          <div class="col-4 align-self-center ps-0">
    
                            <div class="input-group input-group-sm">
                              
                              <span class="input-group-text ">QTY</span>
                              <input name=item' . $titems[$tcount][0]  .' type="number" value="0" min="0" max='.$titems[$tcount][3].' class="form-control" onchange="setQ(this)">
                              <span class="input-group-text">' . $titems[$tcount][4]  .'</span>
                            </div>
                            
                          </div>

                          <div class="col-1 align-self-center ">
                            <form>
                              <input type="hidden" name="ID" value='. $id .'></input>
                              <input type="hidden" name="today" value='. $today .'></input>
                              <input type="hidden" name="weekday" value='. $weekday .'></input>
                              <input type="hidden" name="update_id" value=' . $titems[$tcount][0]  .'></input>
                              <input type="hidden" name="update_item" value=' . $titems[$tcount][1]  .'></input>
                              <input id =item' . $titems[$tcount][0]  .' type="hidden" name="update_q" value="0"></input>
                              <button class="btn btn-dark">
                                Take
                              </button>
                            </form>
                          </div>
                          
    
                          <div class="col-1 align-self-center pe-1">
                            <form>
                              <input type="hidden" name="ID" value='. $id .'></input>
                              <input type="hidden" name="today" value='. $today .'></input>
                              <input type="hidden" name="weekday" value='. $weekday .'></input>

                              <input type="hidden" name="update_id" value=' . $titems[$tcount][0]  .'></input>
                              <button class="btn fc_1">
                                <i class="fas fa-times-circle fa-2x "></i>
                              </button>
                            </form>
                          </div>
    
                        </div>
                      </div>
    
                    </li>';
                      $tcount = $tcount + 1;
                    }else{
                      echo $thtml;
                    }
                  }
                  
                  

                ?>
              </ul>
            </div>
            <nav id="nav_allitem" class="pt-2">
              <form>
                <ul class="pagination justify-content-center">
                  <input type="hidden" name="ID" value=<?php echo $id;?>></input>
                  <input type="hidden" name="today" value=<?php echo $today;?>></input>
                  <input type="hidden" name="weekday" value=<?php echo $weekday;?>></input>
                  <?php

                    $y = intdiv($ttotal,8);
                    if($y < $ttotal/7){
                      $y = $y +1;
                    }

                    if ($tpage == 1) {
                      echo '<li class="page-item disabled"><button name="medPage" value="'. ($tpage - 1).'" class="page-link rounded-start" href="#">Previous</button></li>';
                    }else {
                      echo '<li class="page-item "><button name="medPage" value="'. ($tpage - 1).'" class="page-link rounded-start" href="#">Previous</button></li>';
                      if( ($tpage == $y) && (2 < $ttotal/7 )){
                        echo '<li class="page-item "><button name="medPage" value="'. ($tpage - 2).'" class="page-link rounded-start" href="#">'. $tpage - 2 .'</button></li>';
                      }
                      echo '<li class="page-item "><button name="medPage" value="'. ($tpage - 1).'" class="page-link rounded-start" href="#">'. $tpage - 1 .'</button></li>';
                    
                    }

                    echo '<li class="page-item active"><button name="medPage" value="'. $tpage.'" class="page-link rounded-start" href="#">'. $tpage .'</button></li>';
                    

                    if ($tpage == $y || $y == 0) {
                      echo '<li class="page-item disabled"><button name="medPage" value="'. ($tpage + 1).'" class="page-link rounded-start" href="#">Next</button></li>';
                    }else {
                      echo '<li class="page-item "><button name="medPage" value="'. ($tpage + 1).'" class="page-link rounded-start" href="#">'. $tpage + 1 .'</button></li>';
                      if( ($tpage == 1) && (2 < $ttotal/7) ){
                        echo '<li class="page-item "><button name="medPage" value="'. ($tpage + 2).'" class="page-link rounded-start" href="#">'. $tpage + 2 .'</button></li>';
                      }
                      echo '<li class="page-item "><button name="medPage" value="'. ($tpage + 1).'" class="page-link rounded-start" href="#">Next</button></li>';
                    }
                  ?>
                </ul>
              </form>
            </nav>
          </div>


        </div>
      </div>



      <!--All Pop Modals-->
      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Medication Tracker Help</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              The medication tracker is a quick way or updating your medication storage record as you take your daily dose of medication. Simply add a medication from your medication list by clicking "Track", and enter the consumation quantity in the tracker. Now you can just click "Take" to update your online information or click "remove" to remove medication from the current medication tracker. 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/55588c0c96.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/Dashboard.js"></script>
<script type="text/javascript" src="js/VisualChange.js"></script>

</html>
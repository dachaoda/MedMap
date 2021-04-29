<?php
  $id = 'testid';
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
      <button class="navbar-brand nav_clear" href="Dashboard.php">
        <img src="/art/MedMap_Logo.png" alt="" Width="100" height="80" class="d-inline-block align-text-top">
      </button>

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

      <div class="container border border-dark col-lg bg_5">
        Add Event
        <form class="text-light">

          <div class="mb-3">
            <label for="eventTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="eventTitle">
          </div>

          <div class="mb-3">
            <label for="eventStartTime" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="eventStartTime">
          </div>

          <div class="mb-3">
            <label for="eventEndTime" class="form-label">End Date</label>
            <input type="date" class="form-control" id="eventEndTime">
          </div>

          <div id="Occurence" class="mb-3">
            <input class="form-check-input" type="checkbox" value="" id="CheckMonday">
            <label class="form-check-label" for="CheckMonday">
              Occurrence
            </label>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="CheckMonday">
              <label class="form-check-label" for="CheckMonday">
                Monday
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Tuesdays
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Wednesday
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Thursday
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Friday
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Saturday
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Sunday
              </label>
            </div>
          </div>


          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>

      <div class="container border border-dark col-lg-8 bg_5 ms-lg-1">

        <div class="text-light">
          Event list
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
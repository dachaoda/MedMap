<?php
  $id = 'testid';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


  <link rel="stylesheet" href="css/dashboard.css">
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
            <button class="nav-link nav_clear fs-5" formaction="Home.php">Logout</button>
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
            <i class="far fa-calendar-alt fa-2x align-self-center"></i>
          </div>
        </div>


        <div class="row border border-dark bg_4 fc_2">

          <div class="col-2 p-3 border border-top-0 border-bottom-0 border-dark">

            <div class="row text-center m-0 d-flex justify-content-center">
              Sunday
            </div>
            <div id="6" class="row text-center m-0 d-flex justify-content-center">
              day
            </div>
          </div>


          <div class="col-10">
            events
          </div>

        </div>


        <div class="row border border-dark bg_4 fc_2">

          <div class="col-2 p-3 border border-top-0 border-bottom-0 border-dark">

            <div class="row text-center m-0 d-flex justify-content-center">
              Monday
            </div>
            <div id="0" class="row text-center m-0 d-flex justify-content-center">
              day
            </div>
          </div>


          <div class="col-10">
            events
          </div>
        </div>

        <div class="row border border-dark bg_4 fc_2">

          <div class="col-2 p-3 border border-top-0 border-bottom-0 border-dark">

            <div class="row text-center m-0 d-flex justify-content-center">
              Tuesday
            </div>
            <div id="1" class="row text-center m-0 d-flex justify-content-center">
              day
            </div>
          </div>


          <div class="col-10">
            events
          </div>

        </div>

        <div class="row border border-dark bg_4 fc_2">

          <div class="col-2 p-3 border border-top-0 border-bottom-0 border-dark">

            <div class="row text-center m-0 d-flex justify-content-center">
              Wednesday
            </div>
            <div id="2" class="row text-center m-0 d-flex justify-content-center">
              day
            </div>
          </div>


          <div class="col-10">
            events
          </div>


        </div>

        <div class="row border border-dark bg_4 fc_2">

          <div class="col-2 p-3 border border-top-0 border-bottom-0 border-dark">

            <div class="row text-center m-0 d-flex justify-content-center">
              Thursday
            </div>
            <div id="3" class="row text-center m-0 d-flex justify-content-center">
              day
            </div>
          </div>


          <div class="col-10">
            events
          </div>


        </div>


        <div class="row border border-dark bg_4 fc_2">

          <div class="col-2 p-3 border border-top-0 border-bottom-0 border-dark">

            <div class="row text-center m-0 d-flex justify-content-center">
              Friday
            </div>
            <div id="4" class="row text-center m-0 d-flex justify-content-center">
              day
            </div>
          </div>


          <div class="col-10">
            events
          </div>


        </div>


        <div class="row border border-dark bg_4 fc_2">

          <div class="col-2 p-3 border border-top-0 border-bottom-0 border-dark">

            <div class="row text-center m-0 d-flex justify-content-center">
              Saturday
            </div>
            <div id="5" class="row text-center m-0 d-flex justify-content-center">
              day
            </div>
          </div>


          <div class="col-10">
            events
          </div>


        </div>

      </div>


      <div class="container border border-dark col-xxl-4 col-lg col-sm-12 bg_5 ms-xxl-2 mt-sm-2 mt-xxl-0">

        <div class="d-flex justify-content-center text-light">
          Medication Item
        </div>

        <!--Medication Item Sort Tabs-->
        <ul class="nav nav-tabs pt-1">
          <li class="nav-item">
            <a class="nav-link active" href="#">All</a>
          </li>

          <li class="nav-item">
            <a class="nav-link border-light text-light" href="#">Today</a>
          </li>


          <li class="flex-fill position-relative">
            <button type="button" class="btn position-absolute bottom-0 end-0" data-bs-toggle="modal"
              data-bs-target="#exampleModal1">
              <i class="fas fa-pills fa-2x text-light"></i>
            </button>
          </li>
        </ul>

        <div class="container-fluid overfluid-scroll text-light p-0">

          <div id="AllMedication">
            <div class="py-3">
              <ul class="list-group">

                <li class="list-group-item">
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
                </li>

                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
                <li class="list-group-item">And a fifth one</li>
                <li class="list-group-item">And a fifth one</li>
                <li class="list-group-item">And a fifth one</li>
                <li class="list-group-item">And a fifth one</li>
                <li class="list-group-item">And a fifth one</li>
                <li class="list-group-item">And a fifth one</li>
                <li class="list-group-item">And a fifth one</li>
              </ul>
            </div>

            <nav id="nav_allitem" class="pt-2">
              <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>
            </nav>
          </div>

          <div id="TodayMedication" class="row" hidden="true">
            <div class="col">
              medication 2
            </div>
          </div>
        </div>

      </div>

      <div class="container border border-dark col-xxl-4 col-lg col-sm-12 bg_5 ms-xxl-2 mt-sm-2 ms-lg-2 ms-xxl-0 mt-xxl-0">
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

          <div id="AllMedication">
            <div class="py-3">
              <ul class="list-group">

                <li class="list-group-item">
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
                </li>

                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
                <li class="list-group-item">And a fifth one</li>
                <li class="list-group-item">And a fifth one</li>
                <li class="list-group-item">And a fifth one</li>
                <li class="list-group-item">And a fifth one</li>
                <li class="list-group-item">And a fifth one</li>
                <li class="list-group-item">And a fifth one</li>
                <li class="list-group-item">And a fifth one</li>
              </ul>
            </div>

            <nav id="nav_allitem" class="pt-2">
              <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>
            </nav>
          </div>

          <div id="TodayMedication" class="row" hidden="true">
            <div class="col">
              medication 2
            </div>
          </div>
        </div>
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
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
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
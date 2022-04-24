<!DOCTYPE html>
<html lang="en">
<head>
  <title>card </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body style="background-color: #f9fcff;">



<?php include 'navbar1.php';?>

<div class="container" style="margin-top:0">
  <div class="row">
    <div class="col-12">
      <div class="title-heading">
        What Features Do We Offer
      </div>
    </div>
  </div>
  <div class="row help-card-row1">
    <div class = "col-lg-4 col-sm-4 col-md-4 col-xl-4 col-xs-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Insert</h4>
          <div class="card-image" style="color: #213661;">
            <!--<i class="fas fa-laptop-code fa-5x" src="icons8-download-resume-16.png"></i>-->
            <img src="img/insert-svgrepo-com.svg" alt="" height="100vh" width="100vw">
          </div>
          <p class="card-text ">The Training & Placement Officer can insert new company and internship details by clicking on the insert button in the navbar.</p>
        </div>
      </div>
    </div>
     <div class = "col-lg-4 col-sm-4 col-md-4 col-xl-4 col-xs-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Udpade</h4>
          <div class="card-image" style="color: #5e371b;">
            <!--<i class="fas fa-chalkboard-teacher fa-5x"></i>-->
            <img src="img/update-repeat-svgrepo-com.svg" alt="" height="100vh" width="100vw">
          </div>
          <p class="card-text">The Training & Placement Officer can update existing records by clicking on the update icon of each record.</p>
        </div>
      </div>
    </div>
     <div class = "col-lg-4 col-sm-4 col-md-4 col-xl-4 col-xs-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Delete</h4>
          <div class="card-image" style="color:#bc3330;">
            <!--<i class="fas fa-bullseye fa-5x"></i>-->
            <img src="img/delete-svgrepo-com.svg" alt="" height="100vh" width="100vw">
          </div>
          <p class="card-text">The Training & Placement Officer can delete the existing record which is no longer needed by ckicking on the delete icon of each record.</p>
        </div>
      </div>
    </div>


  </div>

  <div class="row help-card-row1">
    <div class = "col-lg-4 col-sm-4 col-md-4 col-xl-4 col-xs-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Search</h4>
          <div class="card-image" style="color: #213661;">
            <!--<i class="fas fa-laptop-code fa-5x"></i>-->
            <img src="img/search-svgrepo-com.svg" alt="" height="100vh" width="100vw">
          </div>
          <p class="card-text ">The Training & Placement Officer and the Training & Placement member can search for records according to their requiremnet by applying various filters.</p>
        </div>
      </div>
    </div>
     <div class = "col-lg-4 col-sm-4 col-md-4 col-xl-4 col-xs-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Display</h4>
          <div class="card-image" style="color: #5e371b;">
            <!--<i class="fas fa-chalkboard-teacher fa-5x"></i>-->
            <img src="img/display-svgrepo-com.svg" alt="" height="100vh" width="100vw">
          </div>
          <p class="card-text">The Training & Placement Officer and the Training & Placement member can display the searched records according to their requiremnet.</p>
        </div>
      </div>
    </div>
     <div class = "col-lg-4 col-sm-4 col-md-4 col-xl-4 col-xs-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Submit Your Resume</h4>
          <div class="card-image" style="color:#bc3330;">
            <!--<i class="fas fa-bullseye fa-5x"></i>-->
            <img src="img/curriculum-resume-svgrepo-com.svg" alt="" height="100vh" width="100vw">
          </div>
          <p class="card-text">The Students can submit their Resume for the companies which they choose to apply for.</p>
        </div>
      </div>
    </div>
</div>


</body>

<style>
  .card{
      margin: 10px auto;
      box-shadow: 0px 2px 4px 0 rgba(0,0,0,0.2);
      border-radius: 6px;
      height: 100%;
      transition: 0.3s;
    }
.card:hover {
    box-shadow: 1px 10px 16px 0 rgba(0,0,0,0.3);
}
    .card-title{
      text-align: center;
      color: #666666;
      font-weight: bold;
    }
    .card-text{
          font-weight: 500;
    color: #66686b;
    }
    .card-image{
      text-align: center;
      margin: 5vh 0;
    }
    .card-text{
      text-align: center;
    }

    .title-heading{
      font-size: 3em;
      text-align: center;
      margin: 4%;
      margin-top: 8%;
      font-weight: bold;

    }
    .help-card-row1 {
        margin-bottom: 10vh;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
</html>

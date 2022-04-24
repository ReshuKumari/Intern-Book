<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="homecss.css">
  <title>Internship Management System</title>
</head>

<body>
<?php include 'navbar1.php';?>
  <!-- Header -->
  <!--<section id="header">
    <div class="header container">
        <div class="container_nav">
            <ul class="nav">
              <li><a href="homepagetpo.php" class="three-d">
                HOME
                <span aria-hidden="true" class="three-d-box">
                    <span class="front">HOME</span>
                    <span class="back">HOME</span>
                </span>
            </a></li>
            <li><a href="welcome.php" class="three-d">
                VIEW
                <span aria-hidden="true" class="three-d-box">
                    <span class="front">VIEW</span>
                    <span class="back">VIEW</span>
                </span>
            </a></li> 
              ?php if($_SESSION["user_role"]=="TPO") {
              echo '<li><a href="insert.php" class="three-d">
                      INSERT
                      <span aria-hidden="true" class="three-d-box">
                          <span class="front">INSERT</span>
                          <span class="back">INSERT</span>
                      </span>
                  </a></li>'; }
                  ?>
                <li><a href="javascript:void(0);" class="three-d">
                    CONTACT
                    <span aria-hidden="true" class="three-d-box">
                        <span class="front">CONTACT</span>
                        <span class="back">CONTACT</span>
                    </span>
                </a></li>
                <li><a href="javascript:void(0);" class="three-d">
                    HELP
                    <span aria-hidden="true" class="three-d-box">
                        <span class="front">HELP</span>
                        <span class="back">HELP</span>
                    </span>
                </a></li>
                <li><a href="logout.php" class="three-d">
                    LOGOUT
                    <span aria-hidden="true" class="three-d-box">
                        <span class="front">LOGOUT</span>
                        <span class="back">LOGOUT</span>
                    </span>
                </a></li>
            </ul>
        </div>
    </div>
  </section>-->
  <!-- End Header -->


  <!-- Hero Section  -->
  <section id="hero">
    <div class="hero container">
      <div>
        <h1>INTERNSHIP <span></span></h1>
        <h1>MANAGEMENT <span></span></h1>
        <h1>SYSTEM <span></span></h1>
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->

  <!-- Service Section -->
  <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title"><span>WHAT</span> DO WE DO</h1>
        <p>Internship Mangement System is used tomanage the company details for the placement cell<br>  It reduces the manual work 
            and makes it easier for placement team to conduct internship drive</p>
      </div>
      <div class="service-bottom">
        <div class="service-item">
          <div class="icon"><img src="img/admin.jpg" /></div>
          <h2>Training and Placement Officer</h2>
          <p>Manages the data <br>     
              Insert details<br>
              Update details <br>
              Generate Reports</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="img/user.png" /></div>
          <h2>Training and Placement Cell</h2>
          <p>Generate Report<br>
        for company and students</p>
        </div>
      </div>
    </div>
  </section>
  <!-- End Service Section -->
 
  <!-- Footer -->
  <!--?php include 'footer.php';?>-->
  <section id="footer">
    <div class="footer container setmargin">
      <div class="brand">
        <h1>IMS</h1>
      </div>
      <h2>Internship Management System</h2>
      <p>Copyright © 2022 RRR. All rights reserved</p>
    </div>
  </section>
  <!-- End Footer -->
  <script src="./app.js"></script>
  <style>
    .setmargin{
     margin-top:0;
    }
     </style>
</body>

</html>
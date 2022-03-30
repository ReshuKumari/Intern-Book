<?php
include 'connect.php';
  $ucname=$_GET['updatecname'];
  $ucity=$_GET['updatecity'];
  $sql="select * from company_details where cid=(select cid from company_details where cname= '".$ucname."' AND city = '".$ucity."')";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result); 
    $cname=$row['cname'];
    $cname_abb=$row['cname_abb'];
    $address=$row['address'];
    $city=$row['city'];
    $state=$row['state'];
    $pincode=$row['pincode'];
    $fte=$row['fte'];
    $smi=$row['smi'];
    $tmi=$row['tmi'];
    $ctc_ug=$row['ctc_ug'];
    $stipend=$row['stipend'];


  $sql2="select * from internship_details where cid=(select cid from company_details 
    where cname= '".$ucname."' AND city = '".$ucity."')";
  $result2=mysqli_query($con,$sql2);
  
    $row=mysqli_fetch_assoc($result2);
    $test=$row['test'];
    $paid=$row['paid'];
    $tentative_students_taken=$row['tentative_students_taken'];
    $tentative_resume_sent=$row['tentative_resume_sent'];

    


    /*if(isset($_POST['submit'])){
      $cname=$_POST['cname'];
      $cname_abb=$_POST['cname_abb'];
      $address=$_POST['address'];
      $city=$_POST['city'];
      $state=$_POST['state'];
      $pincode=$_POST['pincode'];
      $fte=$_POST['fte'];
      $smi=$_POST['smi'];
      $tmi=$_POST['tmi'];
      $ctc_ug=$_POST['ctc_ug'];
      $stipend=$_POST['stipend'];

      $sql1="update company_details set cname='$cname',cname_abb='$cname_abb',
      address='$address', city='$city', state='$state', pincode='$pincode', fte='$fte', smi='$smi',
      tmi='$tmi', ctc_ug='$ctc_ug', stipend='$stipend' where cid=(select cid from company_details where cname= '".$ucname."' AND city = '".$ucity."')";
      $result1=mysqli_query($con,$sql1);
      
      if($result1){
         // echo "Data updated successfully";
         header('location:disp.php');
      }
      else{
          die(mysqli_error($con));
      }
    }*/

    /*if(isset($_POST['submit'])){
      $test=$_POST['test'];
      $paid=$_POST['paid'];
      $tentative_students_taken=$_POST['tentative_students_taken'];
      $tentative_resume_sent=$_POST['tentative_resume_sent'];

      $sql2="update internship_details set test='$test', paid='$paid',
      tentative_students_taken='$tentative_students_taken',
      tentative_resume_sent='$tentative_resume_sent' where cid=(select cid from company_details where cname= '".$ucname."' AND city = '".$ucity."')";
     
       $result2=mysqli_query($con,$sql2);
      if($result2){
         // echo "Data updated successfully";
         header('location:welcome.php');
      }
      else{
          die(mysqli_error($con));
      }
    }*/

    

?>






<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="myScripts.js"></script>
    <title>Internship Management system</title>
    <style type="text/css">
		.error {
			font-size: 15px;
			color: red;
		}
    
 }
	</style>
  </head>
  <body>
  <nav class="navbar navbar-expand-custom navbar-mainbg">
        <a class="navbar-brand navbar-logo" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="fas fa-tachometer-alt"></i>About Us</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-address-book"></i>Contact Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="welcome.php"><i class="far fa-clone"></i>Home Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-calendar-alt"></i>Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="insert.php"><i class="far fa-chart-bar"></i>Insert</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><i class="far fa-copy"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container my-5">
    <form  method="POST">
    <h2 style="text-align:left">COMPANY DETAILS</h2>
  
  <div class="mb-3">
    <label >Company Name</label>
    <input type="text" class="form-control"
    placeholder="Enter Company name" name="cname" autocomplete="off" value=<?php echo $cname; ?>>
    </div>

   
  <div class="mb-3">
    <label >Company Abbreviation</label>
    <input type="text" class="form-control"
    placeholder="Enter company abbreviation" name="cname_abb" autocomplete="off" value=<?php echo $cname_abb; ?>>
    </div>

   
  <div class="mb-3">
    <label >Adress of the Company</label>
    <input type="text" class="form-control"
    placeholder="Enter company address" name="address" autocomplete="off" value=<?php echo $address; ?> >
    </div>

    <div class="mb-3">
    <label >City of Company</label>
    <input type="text" class="form-control"
    placeholder="Enter company city" name="city" autocomplete="off" value=<?php echo $city; ?>>
    </div>

    
    
  <div class="mb-3">
    <label >State of the Company</label>
    <input type="text" class="form-control"
    placeholder="Enter Company state" name="state"autocomplete="off" value=<?php echo $state; ?>>
    </div>

   
  <div class="mb-3">
    <label >Pincode</label>
    <input type="number" class="form-control"
    placeholder="Enter pincode" name="pincode" autocomplete="off" value=<?php echo $pincode; ?>>
    </div>

   
  <div class="mb-3">
    <label >Total Students selected for full time employment-FTE*</label>
    <input type="number" class="form-control"
    placeholder="Enter total no. of fte" name="fte" autocomplete="off" value=<?php echo $fte; ?>>
    </div>

    <div class="mb-3">
    <label >Total Students selected for two month Internship-TMI*</label>
    <input type="number" class="form-control"
    placeholder="Enter total no. of tmi" name="tmi" autocomplete="off" value=<?php echo $tmi; ?>>
    </div>

    <div class="mb-3">
    <label >Total Students selected for six month Internship-SMI</label>
    <input type="number" class="form-control"
    placeholder="Enter total no. of smi" name="smi" autocomplete="off" value=<?php echo $smi; ?>>
    </div>

    <div class="mb-3">
    <label >CTC of the Company</label>
    <input type="number" class="form-control"
    placeholder="Enter ctc_ug" name="ctc_ug" autocomplete="off" value=<?php echo $ctc_ug; ?>>
    </div>

    <div class="mb-3">
    <label >Stipend of the company</label>
    <input type="number" class="form-control"
    placeholder="Enter stipend" name="stipend" autocomplete="off" value=<?php echo $stipend; ?>>
    </div>

    <div class="mb-3">
    <label for="test">Does Company Take Test?</label>
    <select class="form-control" id="test" name="test" value=<?php echo $test;?>>
      <option>Yes</option>
      <option>No</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="paid">Is Company Paid?</label>
    <select class="form-control" id="paid"  name="paid" value=<?php echo $paid;?>>
      <option>Yes</option>
      <option>No</option>
    </select>
  </div>

  <div class="mb-3">
    <label >Tentative number of Students selected for six month Internship</label>
    <input type="number" class="form-control"
    placeholder="Enter tentative numer of students taken" name="tentative_students_taken" autocomplete="off" value=<?php echo $tentative_students_taken; ?>>
    </div>

  <div class="mb-3">
    <label >Tentative number of Student's Resume sent for six month Internship</label>
    <input type="number" class="form-control"
    placeholder="Enter tentative number of resume sent" name="tentative_resume_sent" autocomplete="off" value=<?php echo $tentative_resume_sent; ?>>
    </div>

</form>
    </div>
  </body>
</html>
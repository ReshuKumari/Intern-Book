<?php

include 'connect.php';
$cname = $city = $state = $pincode=$fte=$smi=$tmi=$ctc_ug=$stipend=$test=$paid=$tentative_students_taken=$tentative_resume_sent=NULL;
$cnameErr = $cityErr = $stateErr = $pincodeErr=$fteErr=$smiErr=$tmiErr=$ctc_ugErr=$stipendErr=$testErr=$paidErr=$tentative_students_takenErr=$tentative_resume_sentErr=NULL;
$flag = true;
if(isset($_POST['submit'])){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["cname"])) {
        
        $cnameErr = " Company name is required";
        $flag = false;
    } else {
        $cname = test_input($_POST["cname"]);
     }

    $cname_abb=$_POST['cname_abb'];
   
    $address=$_POST['address'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (empty($_POST["city"])) {
          
          $cityErr = " City is required";
          $flag = false;
      } else {
          $city = test_input($_POST["city"]);
      }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["state"])) {
        
        $stateErr = " State is required";
        $flag = false;
    } else {
        $state = test_input($_POST["state"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["pincode"])) {
      
      $pincodeErr = " Pincode is required";
      $flag = false;
  } else 
     $pincode = test_input($_POST["pincode"]);
         
      }

  

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["fte"])) {
      
      $fteErr = " FTE is required";
      $flag = false;
  } else{ 
     $fte= test_input($_POST["fte"]);
     }
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["smi"])) {
      
      $smiErr = " SMI is required";
      $flag = false;
  } else {
      $smi = test_input($_POST["smi"]);
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["tmi"])) {
      
      $tmiErr = " TMI is required";
      $flag = false;
  } else {
      $tmi = test_input($_POST["tmi"]);
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["ctc_ug"])) {
      
      $ctc_ugErr = " CTC is required";
      $flag = false;
  } else {
      $ctc_ug= test_input($_POST["ctc_ug"]);
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["stipend"])) {
      
      $stipendErr = " Stipend is required";
      $flag = false;
  } else {
      $stipend= test_input($_POST["stipend"]);
  }
}

   $test=$_POST['test'];
   $paid=$_POST['paid'];


  
   if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["tentative_students_taken"])) {
        
        $tentative_students_takenErr = " Tentative Students taken is required";
        $flag = false;
    } else {
        $tentative_students_taken= test_input($_POST["tentative_students_taken"]);
    }
  }

  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["tentative_resume_sent"])) {
        
        $tentative_resume_sentErr = " Tentative resume sent is required";
        $flag = false;
    } else {
        $tentative_resume_sent= test_input($_POST["tentative_resume_sent"]);
    }
  }

  if($flag){
    $sql="insert into company_details(cname,cname_abb,address,city,state,pincode,fte,smi,tmi,ctc_ug,stipend) 
    values('$cname','$cname_abb','$address','$city','$state','$pincode','$fte','$smi','$tmi','$ctc_ug','$stipend')";
    $result=mysqli_query($con,$sql);
    $sql3="INSERT INTO internship_details (cid,test,paid,tentative_students_taken,tentative_resume_sent) VALUES(LAST_INSERT_ID(),'$test','$paid','$tentative_students_taken','$tentative_resume_sent')";
    $result3=mysqli_query($con,$sql3);
    
    //$result2=mysqli_query($con,$result3);
    if($result&&$result3){
       // echo "Data inserted successfully";
       header('location:welcome.php');
    }
    else{
        die(mysqli_error($con));
    }
}
}
}
function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
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
    <!--<script src="myScripts.js"></script> -->
    <script type="text/javascript" src="myScripts.js"></script>

    <script type="text/javascript">

    // Add active class on another page linked
    // ==========================================
    $(window).on('load',function () {
        var current = location.pathname;
        console.log(current);
        $('#navbarSupportedContent ul li a').each(function(){
            var $this = $(this);
            // if the current path is like this link, make it active
            if($this.attr('href').indexOf(current) !== -1){
                $this.parent().addClass('active');
                $this.parents('.menu-submenu').addClass('show-dropdown');
                $this.parents('.menu-submenu').parent().addClass('active');
            }else{
                $this.parent().removeClass('active');
            }
        })
    });
      </script>
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
    <form action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <h2 style="text-align:left">COMPANY DETAILS</h2>
  
  <div class="mb-3">
    <label >Company Name*</label>
    <input type="text" class="form-control"
    placeholder="Enter Company name" name="cname"autocomplete="off" value="<?= $cname; ?>">
    <span  class="error"> <?= $cnameErr; ?></span>
    </div>

   
  <div class="mb-3">
    <label >Company Abbreviation</label>
    <input type="text" class="form-control"
    placeholder="Enter company abbreviation" name="cname_abb" autocomplete="off">
    </div>

   
  <div class="mb-3">
    <label >Adress of the Company</label>
    <input type="text" class="form-control"
    placeholder="Enter company address" name="address" autocomplete="off">
    </div>

    <div class="mb-3">
    <label >City of Company*</label>
    <input type="text" class="form-control"
    placeholder="Enter company city" name="city" autocomplete="off" value="<?= $city; ?>">
    <span  class="error"> <?= $cityErr; ?></span>
    </div>

    
    
  <div class="mb-3">
    <label >State of the Company*</label>
    <input type="text" class="form-control"
    placeholder="Enter Company state" name="state"autocomplete="off" value="<?= $state; ?>">
    <span  class="error"> <?= $stateErr; ?></span>
    </div>

   
  <div class="mb-3">
    <label >Pincode</label>
    <input type="number" class="form-control"
    placeholder="Enter pincode" name="pincode" autocomplete="off" value="<?= $pincode; ?>">
    <span  class="error"> <?= $pincodeErr; ?></span>
    </div>

   
  <div class="mb-3">
    <label >Total Students selected for full time employment-FTE*</label>
    <input type="number" class="form-control"
    placeholder="Enter total no. of fte" name="fte" autocomplete="off" value="<?= $fte; ?>">
    <span  class="error"> <?= $fteErr; ?></span>
    </div>

    <div class="mb-3">
    <label >Total Students selected for two month Internship-TMI*</label>
    <input type="number" class="form-control"
    placeholder="Enter total no. of tmi" name="tmi" autocomplete="off" value="<?= $tmi; ?>">
    <span  class="error"> <?= $tmiErr; ?></span>
    </div>

    <div class="mb-3">
    <label >Total Students selected for six month Internship-SMI*</label>
    <input type="number" class="form-control"
    placeholder="Enter total no. of smi" name="smi" autocomplete="off" value="<?= $smi; ?>">
    <span  class="error"> <?= $smiErr; ?></span>
    </div>

    <div class="mb-3">
    <label >CTC of the Company-UG*</label>
    <input type="number" class="form-control"
    placeholder="Enter ctc_ug" name="ctc_ug" autocomplete="off" value="<?= $ctc_ug; ?>">
    <span  class="error"> <?= $ctc_ugErr; ?></span>
    </div>

    <div class="mb-3">
    <label >Stipend of the company*</label>
    <input type="number" class="form-control"
    placeholder="Enter stipend" name="stipend" autocomplete="off" value="<?= $stipend; ?>">
    <span  class="error"> <?= $stipendErr; ?></span>
    </div>

    <div class="mb-3">
    <label for="test">Does Company Take Test?*</label>
    <select class="form-control" id="test" name="test">
      <option>Yes</option>
      <option>No</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="paid">Is Company Paid?*</label>
    <select class="form-control" id="paid"  name="paid">
      <option>Yes</option>
      <option>No</option>
    </select>
  </div>

  <div class="mb-3">
    <label >Tentative number of Students selected for six month Internship*</label>
    <input type="number" class="form-control"
    placeholder="Enter tentative numer of students taken" name="tentative_students_taken" autocomplete="off" value="<?= $tentative_students_taken; ?>">
    <span  class="error"> <?= $tentative_students_takenErr; ?></span>
    </div>


  <div class="mb-3">
    <label >Tentative number of Student's Resume sent for six month Internship*</label>
    <input type="number" class="form-control"
    placeholder="Enter tentative number of resume sent" name="tentative_resume_sent" autocomplete="off" value="<?= $tentative_resume_sent; ?>">
    <span  class="error"> <?= $tentative_resume_sentErr; ?></span>
    </div>

    
   

 
  <button type="submit" class="btn btn-primary" name="submit">submit</button>
</form>
    </div>
  </body>
</html>
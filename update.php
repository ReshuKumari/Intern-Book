<?php
include 'connect.php';

$cnameErr =$cname_abbErr = $cityErr = $stateErr = $pincodeErr=$fteErr=NULL;
$addressErr=$smiErr=$tmiErr=$ctc_ugErr=$stipendErr=$testErr=$paidErr=NULL;
$tentative_students_takenErr=$tentative_resume_sentErr=NULL;
$flag = true;

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

  if(isset($_POST['submit'])){
    $cname = $city = $state = $pincode=NULL;
    $cname_abb=$address=NULL;
    $fte=$smi=$tmi=$ctc_ug=$stipend=NULL;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (empty($_POST["cname"])) {
          $cnameErr = "Company name is required";
          $flag = false;
      }
      else if (preg_match('/^[-a-zA-Z0-9 ]+$/', $_POST["cname"])==false) {
        $cnameErr = "Company name can be alphabet or number";
        $flag = false;
      }
      else if(strlen($_POST["cname"])>200){
        $cnameErr = "Company name can be of maximum length 200";
        $flag = false;
      } else {
          $cname = $_POST["cname"];
      }
  
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (preg_match('/^[-a-zA-Z -]+$/', $_POST["cname_abb"])==false && 
        empty($_POST["cname_abb"])==false) {
        $cname_abbErr = "Company abbreviation can only be alphabet";
        $flag = false;
      }
      else if(strlen($_POST["cname_abb"])>10){
        $cname_abbErr = "Company abbreviation can be of maximum length 10";
        $flag = false;
      } else {
          $cname_abb = $_POST["cname_abb"];
        }
      }
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (preg_match('/^[A-Za-z0-9_! "#$%&\'()*+,.:\/;=?@^-]+$/', $_POST["address"])==false &&
        empty($_POST['address'])==false) {
          $addressErr = "Company address can only be alphabet and number";
          $flag = false;
        }
        else if(strlen($_POST["address"])>150){
          $addressErr = "Company address can be of maximum length 150";
          $flag = false;
        } else{
            $address=$_POST['address'];
          } 
      }
  
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["city"])) {
            $cityErr = " City is required";
            $flag = false;
        } else if (preg_match('/^[-a-zA-Z0-9 ]+$/', $_POST["city"])==false) {
          $cityErr = "Company city can only be alphabet";
          $flag = false;
        }
        else if(strlen($_POST["city"])>60){
          $cityErr = "Company city can be of maximum length 60";
          $flag = false;
        } else {
            $city = $_POST["city"];
        }
      }
  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["state"])) {
          
          $stateErr = " State is required";
          $flag = false;
      } else if (preg_match('/^[-a-zA-Z ]+$/', $_POST["state"])==false) {
        $stateErr = "Company state can only be alphabet";
        $flag = false;
      }
      else if(strlen($_POST["state"])>20){
        $stateErr = "Company state can be of maximum length 20";
        $flag = false;
      } else {
          $state = $_POST["state"];
      }
    }
  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if(preg_match('/^[0-9]{6}$/', $_POST["pincode"])==false && 
        empty($_POST["pincode"])==false){  
        $pincodeErr = "Pincode can be of maximum length 6";
        $flag = false;
      }
      else{
        $pincode = $_POST['pincode'];
      } 
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($_POST["fte"] >= 0) {
        $fte= $_POST["fte"];
      } else if (preg_match("/([0-9]+)/", $_POST["fte"])==false &&
       is_numeric($_POST["fte"])==false) {
        $fteErr = "Full time employee can only be number";
        $flag = false;
      } else{ 
        $fteErr = "FTE is required";
        $flag = false;
      }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($_POST["smi"] >= 0) {
        $smi = $_POST["smi"];
      } else if (preg_match("/([0-9]+)/", $_POST["smi"])==false) {
        $smiErr = "Six month internship can only be number";
        $flag = false;
      }  else {
        $smiErr = "SMI is required";
        $flag = false;
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($_POST["tmi"] >= 0) {
        $tmi = $_POST["tmi"];
      } else if (preg_match("/([0-9]+)/", $_POST["tmi"])==false) {
        $tmiErr = "Two month internship can only be number";
        $flag = false;
      }  else {
        $tmiErr = "TMI is required";
        $flag = false;
      }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($_POST["ctc_ug"] >= 0) {
        $ctc_ug= $_POST["ctc_ug"];
      } else if (preg_match("/([0-9]+)/", $_POST["ctc_ug"])==false) {
        $ctc_ugErr = "Company ctc can only be number";
        $flag = false;
      }  else {
        $ctc_ugErr = " CTC is required";
        $flag = false;
      }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($_POST["stipend"] >= 0) {
        $stipend= $_POST["stipend"];
      } else if (preg_match("/([0-9]+)/", $_POST["stipend"])==false) {
        $stipendErr = "Company stipend can only be number";
        $flag = false;
      }  else {
        $stipendErr = " Stipend is required";
        $flag = false; 
      }
    }
  
  
    if($flag){
      $sql1="update company_details set cname='$cname',cname_abb='$cname_abb',
      address='$address', city='$city', state='$state', pincode='$pincode', fte='$fte', smi='$smi',
      tmi='$tmi', ctc_ug='$ctc_ug', stipend='$stipend' where cid=(
        select cid from company_details where cname= '".$ucname."' AND city = '".$ucity."')";
      $result1=mysqli_query($con,$sql1);

      if($result1){
          // echo "Data updated successfully";
          header('location:welcome.php');
      }
      else{
          die(mysqli_error($con));
      }
    }
    $test=$_POST['test'];
    $paid=$_POST['paid'];
    //echo $test;
    //echo $paid;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($_POST["tentative_students_taken"] >= 0) {
        $tentative_students_taken= $_POST["tentative_students_taken"];
      } else if (preg_match("/([0-9]+)/", $_POST["tentative_students_taken"])==false) {
        $tentative_students_takenErr = "Tentative students taken can only be number";
        $flag = false;
      }  else {
        $tentative_students_takenErr = " Tentative Students taken is required";
        $flag = false;
      }
    }
    
      
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($_POST["tentative_resume_sent"] >= 0) {
        $tentative_resume_sent= $_POST["tentative_resume_sent"];
      } else if (preg_match("/([0-9]+)/", $_POST["tentative_resume_sent"])==false) {
        $tentative_resume_sentErr = "Tentative resume sent can only be number";
        $flag = false;
      }  else {
        $tentative_resume_sentErr = " Tentative resume sent is required";
        $flag = false;
      }
    }
    
    if( $flag==true){
      $sql2="update internship_details set test='$test', paid='$paid',
      tentative_students_taken='$tentative_students_taken',
      tentative_resume_sent='$tentative_resume_sent' where cid=(select cid from company_details where cname= '".$ucname."' AND city = '".$ucity."')";
      
        $result2=mysqli_query($con,$sql2);
      if($result2){
          echo "Data updated successfully";
          header('location:welcome.php');
      }
      else{
          die(mysqli_error($con));
      }
    }

    }//close if for server post request

  }//close if for isset submit button
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
    <span  class="error"> <?= $cnameErr; ?></span>
    </div>

   
  <div class="mb-3">
    <label >Company Abbreviation</label>
    <input type="text" class="form-control"
    placeholder="Enter company abbreviation" name="cname_abb" autocomplete="off" value=<?php echo $cname_abb; ?>>
    <span  class="error"> <?= $cname_abbErr; ?></span>  
  </div>

   
  <div class="mb-3">
    <label >Adress of the Company</label>
    <input type="text" class="form-control"
    placeholder="Enter company address" name="address" autocomplete="off" value=<?php echo $address; ?> >
    <span  class="error"> <?= $addressErr; ?></span>  
  </div>

    <div class="mb-3">
    <label >City of Company</label>
    <input type="text" class="form-control"
    placeholder="Enter company city" name="city" autocomplete="off" value=<?php echo $city; ?>>
    <span  class="error"> <?= $cityErr; ?></span>  
  </div>

    
    
  <div class="mb-3">
    <label >State of the Company</label>
    <input type="text" class="form-control"
    placeholder="Enter Company state" name="state"autocomplete="off" value=<?php echo $state; ?>>
    <span  class="error"> <?= $stateErr; ?></span>  
  </div>

   
  <div class="mb-3">
    <label >Pincode</label>
    <input type="number" class="form-control"
    placeholder="Enter pincode" name="pincode" autocomplete="off" value=<?php echo $pincode; ?>>
    <span  class="error"> <?= $pincodeErr; ?></span>  
  </div>

   
  <div class="mb-3">
    <label >Total Students selected for full time employment-FTE*</label>
    <input type="number" class="form-control" min=0
    placeholder="Enter total no. of fte" name="fte" autocomplete="off" value=<?php echo $fte; ?>>
    <span  class="error"> <?= $fteErr; ?></span>  
  </div>

    <div class="mb-3">
    <label >Total Students selected for two month Internship-TMI*</label>
    <input type="number" class="form-control" min=0
    placeholder="Enter total no. of tmi" name="tmi" autocomplete="off" value=<?php echo $tmi; ?>>
    <span  class="error"> <?= $tmiErr; ?></span>
  </div>

    <div class="mb-3">
    <label >Total Students selected for six month Internship-SMI</label>
    <input type="number" class="form-control" min=0
    placeholder="Enter total no. of smi" name="smi" autocomplete="off" value=<?php echo $smi; ?>>
    <span  class="error"> <?= $smiErr; ?></span>
  </div>

    <div class="mb-3">
    <label >CTC of the Company</label>
    <input type="number" class="form-control" min=0
    placeholder="Enter ctc_ug" name="ctc_ug" autocomplete="off" value=<?php echo $ctc_ug; ?>>
    <span  class="error"> <?= $ctc_ugErr; ?></span>
  </div>

    <div class="mb-3">
    <label >Stipend of the company</label>
    <input type="number" class="form-control" min=0
    placeholder="Enter stipend" name="stipend" autocomplete="off" value=<?php echo $stipend; ?>>
    <span  class="error"> <?= $stipendErr; ?></span>
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
    <input type="number" class="form-control" min=0
    placeholder="Enter tentative numer of students taken" name="tentative_students_taken" autocomplete="off" value=<?php echo $tentative_students_taken; ?>>
    <span  class="error"> <?= $tentative_students_takenErr; ?></span>
  </div>

  <div class="mb-3">
    <label >Tentative number of Student's Resume sent for six month Internship</label>
    <input type="number" class="form-control" min=0
    placeholder="Enter tentative number of resume sent" name="tentative_resume_sent" autocomplete="off" value=<?php echo $tentative_resume_sent; ?>>
    <span  class="error"> <?= $tentative_resume_sentErr; ?></span>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
    </div>
  </body>
</html>
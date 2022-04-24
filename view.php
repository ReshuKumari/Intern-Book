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
    <link rel="stylesheet" href="stylecss.css">
    <script src="myScripts.js"></script>
    <title>Internship Management system</title>
    <style type="text/css">
		.error {
			font-size: 15px;
			color: red;
		}
    
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap');

.container_form {
  text-align: center;
    border-radius: 20px;
    padding: 40px;
    box-sizing: border-box;
    background: #ecf0f3;
    box-shadow: 1px 1px 20px #619cbd, -11px -0.5px 15px #7f7f7f;
    margin: auto;
    width: 75%;
}

.form-control {
    display: block;
    width: 70%;
    margin:auto;
    border-radius: 30px;
    font-size: 20px;

}

.title {
  margin-top: 10px;
  font-weight: 900;
  font-size: 1.8rem;
  color: #1DA1F2;
  letter-spacing: 1px;
}

.inputs {
  text-align: left;
  margin-top: 30px;
}

label, input, button {
  display: block;
  width: 100%;
  padding: 0;
  border: none;
  outline: none;
  box-sizing: border-box;
  font-size: 25px;
}

label {
  margin-bottom: 4px;
}

label:nth-of-type(2) {
  margin-top: 12px;
}

input::placeholder {
  color: gray;
}

input {
  background: #ecf0f3;
  padding: 10px;
  padding-left: 20px;
  height: 50px;
  font-size: 14px;
  border-radius: 50px;
  box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
}

select{
  background: #ecf0f3;
  padding: 10px;
  padding-left: 20px;
  height: 50px;
  font-size: 14px;
  border-radius: 50px;
  box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;

}

button {
  color: white;
  width: 25%;
    margin: auto;
  margin-top: 20px;
  background: #1DA1F2;
  height: 40px;
  border-radius: 30px;
  cursor: pointer;
  font-weight: 900;
  box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
  transition: 0.5s;
}

button:hover {
  box-shadow: none;
}


h1 {
  position: absolute;
  top: 0;
  left: 0;
}
	</style>
  </head>
  <body>
  <?php include 'navbar1.php';?>
  <!--<div class="container_nav">
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
                <li><a href="insert.php" class="three-d">
                    INSERT
                    <span aria-hidden="true" class="three-d-box">
                        <span class="front">INSERT</span>
                        <span class="back">INSERT</span>
                    </span>
                </a></li>
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
    </div>-->
    <div class="wrapper">
      <div class="container_form">
    <form  method="POST">
    <div class = "title"><h2>COMPANY DETAILS</h2></div>
  
    <div class="mb-3">
    <label >Company Name</label>
    <input type="text" class="form-control"
    placeholder="Enter Company name" name="cname" autocomplete="off" value="<?php echo $cname; ?>">
    </div>

   
  <div class="mb-3">
    <label >Company Abbreviation</label>
    <input type="text" class="form-control"
    placeholder="Enter company abbreviation" name="cname_abb" autocomplete="off" value="<?php echo $cname_abb; ?>">
    </div>

   
  <div class="mb-3">
    <label >Address of the Company</label>
    <input type="text" class="form-control"
    placeholder="Enter company address" name="address" autocomplete="off" value="<?php echo $address; ?>" >
    </div>

    <div class="mb-3">
    <label >City of Company</label>
    <input type="text" class="form-control"
    placeholder="Enter company city" name="city" autocomplete="off" value="<?php echo $city; ?>">
    </div>

    
    
  <div class="mb-3">
    <label >State of the Company</label>
    <input type="text" class="form-control"
    placeholder="Enter Company state" name="state"autocomplete="off" value="<?php echo $state; ?>">
    </div>

   
  <div class="mb-3">
    <label >Pincode</label>
    <input type="number" class="form-control"
    placeholder="Enter pincode" name="pincode" autocomplete="off" value="<?php echo $pincode; ?>">
    </div>

   
  <div class="mb-3">
    <label >Total Students selected for full time employment-FTE*</label>
    <input type="number" class="form-control"
    placeholder="Enter total no. of fte" name="fte" autocomplete="off" value="<?php echo $fte; ?>">
    </div>

    <div class="mb-3">
    <label >Total Students selected for two month Internship-TMI*</label>
    <input type="number" class="form-control"
    placeholder="Enter total no. of tmi" name="tmi" autocomplete="off" value="<?php echo $tmi; ?>">
    </div>

    <div class="mb-3">
    <label >Total Students selected for six month Internship-SMI</label>
    <input type="number" class="form-control"
    placeholder="Enter total no. of smi" name="smi" autocomplete="off" value="<?php echo $smi; ?>">
    </div>

    <div class="mb-3">
    <label >CTC of the Company(in lakhs)</label>
    <input type="number" class="form-control"
    placeholder="Enter ctc_ug" name="ctc_ug" autocomplete="off" value="<?php echo $ctc_ug; ?>">
    </div>

    <div class="mb-3">
    <label >Stipend of the company (in thousands)</label>
    <input type="number" class="form-control"
    placeholder="Enter stipend" name="stipend" autocomplete="off" value="<?php echo $stipend; ?>">
    </div>

    <div class="mb-3">
    <label for="test">Does Company Take Test?</label>
    <select class="form-control" id="test" name="test" value="<?php echo $test;?>">
      <option value="<?php echo $test; ?>" ><?php echo $test; ?></option>
    </select>
  </div>

  <div class="mb-3">
    <label for="paid">Is Company Paid?</label>
    <select class="form-control" id="paid"  name="paid" value="<?php echo $paid;?>">
      <option value="<?php echo $paid; ?>" ><?php echo $paid; ?></option>
    </select>
  </div>

  <div class="mb-3">
    <label >Tentative number of Students selected for six month Internship</label>
    <input type="number" class="form-control"
    placeholder="Enter tentative numer of students taken" name="tentative_students_taken" 
    autocomplete="off" value="<?php echo $tentative_students_taken; ?>">
    </div>

  <div class="mb-3">
    <label >Tentative number of Student's Resume sent for six month Internship</label>
    <input type="number" class="form-control"
    placeholder="Enter tentative number of resume sent" name="tentative_resume_sent"
     autocomplete="off" value="<?php echo $tentative_resume_sent; ?>">
    </div>

</form>
    </div>
</div>
  </body>
</html>
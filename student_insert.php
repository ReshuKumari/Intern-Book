<?php

include 'connect.php';
$sid = $company1 = $company2 = $company3=$self=$resume=NULL;
$cname1Err = $cname2Err = $cname3Err = $selfErr = $sidErr =NULL;
$flag=true;

if(isset($_POST['submit'])){
    //$sid = $_POST["sid"];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["sid"])) {
        $sidErr = "Student roll no is required";
        $flag = false;
      }
      else if(preg_match('/^[0-9]{7}$/', $_POST["sid"])==false &&
       empty($_POST["sid"])==false){  
        $sidErr = " can be of maximum length 7";
        $flag = false;
      }
      else{
        $sid = $_POST['sid'];
      } 
    }
    if (preg_match('/^[-a-zA-Z0-9 ]+$/', $_POST["company1"])==false &&
    empty($_POST["company1"])==false) {
      $cname1Err = "Company name can be alphabet or number";
      $flag = false;
     }
     else if(strlen($_POST["company1"])>200){
      $cname1Err  = "Company name can be of maximum length 200";
      $flag = false;
     } else {
        $company1 = $_POST["company1"];
     }

     //comp 2
     if (preg_match('/^[-a-zA-Z0-9 ]+$/', $_POST["company2"])==false &&
      empty($_POST["company2"])==false) {
        $cname2Err = "Company name can be alphabet or number";
        $flag = false;
      }
      else if(strlen($_POST["company2"])>200){
        $cname2Err  = "Company name can be of maximum length 200";
        $flag = false;
      } else {
          $company2 = $_POST["company2"];
      }

      //comp 3
      if (preg_match('/^[-a-zA-Z0-9 ]+$/', $_POST["company3"])==false &&
      empty($_POST["company3"])==false) {
        $cname3Err = "Company name can be alphabet or number";
        $flag = false;
      }
      else if(strlen($_POST["company3"])>200){
        $cname3Err  = "Company name can be of maximum length 200";
        $flag = false;
      } else {
          $company3 = $_POST["company3"];
      }


      //self
      if (preg_match('/^[-a-zA-Z0-9 ]+$/', $_POST["self"])==false &&
      empty($_POST["self"])==false) {
        $selfErr = "Company name can be alphabet or number";
        $flag = false;
      }
      else if(strlen($_POST["self"])>200){
        $selfErr  = "Company name can be of maximum length 200";
        $flag = false;
      } else {
          $self = $_POST["self"];
      }
    //$company1 = $_POST["company1"];
    //$company2 = $_POST["company2"];
    //$company3 = $_POST["company3"];
    //$self = $_POST["self"];
    //$resume = $_FILES['file']['name'];
    $resume = rand(1000,10000)."-".$_FILES["file"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
   
     #upload directory path
    $uploads_dir = 'uploaded';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$resume);
    if($flag){
      $sql="insert into student(sid,company1,company2,company3,self,resume) 
      values('$sid','$company1','$company2','$company3','$self','$resume')";
      $result=mysqli_query($con,$sql);
      
      //$result2=mysqli_query($con,$result3);
      if($result){
         // echo "Data inserted successfully";
         echo '<div class="alert alert-success">Thank You! Data is inserted </div>';
          header("Refresh: 3; URL=student_insert.php");
      }
      else{
          die(mysqli_error($con));
      }
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylecss.css">
    <!--<script src="myScripts.js"></script> -->
    <script type="text/javascript" src="myScripts.js"></script>

    
    <title>Internship Management system</title>
    <style type="text/css">
		.error {
			font-size: 15px;
			color: red;
    }
    
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap');

.container_form {
  border-radius: 20px;
    padding: 40px;
    box-sizing: border-box;
    background: #ecf0f3;
    box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
    margin: auto;
    width: 75%;
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
}

label {
  margin-bottom: 4px;
  font-size: 25px;
}

label:nth-of-type(2) {
  margin-top: 12px;
}

input::placeholder {
  color: gray;
}

.form-control{
  font-size: 25px;
}
input {
  background: #ecf0f3;
  padding: 10px;
  padding-left: 20px;
  height: 50px;
  border-radius: 50px;
  box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
}

select{
  background: #ecf0f3;
  padding: 10px;
  padding-left: 20px;
  height: 50px;
  font-size: 19px;
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


input#pdf {
    background: #fff;
    margin-top:-15px;
    padding: 10px;
    padding-left: 20px;
    height: 50px;
     border-radius: 0px; 
    box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
    font-size:20px;
}


h1 {
  position: absolute;
  top: 0;
  left: 0;
}
.error {
			font-size: 15px;
			color: red;
    }
	</style>
  </head>
  <body>
  <?php include 'navbar1.php';?>
  <<!--div class="container_nav">
        <ul class="nav">
            <li><a href="" class="three-d">
                Home
                <span aria-hidden="true" class="three-d-box">
                    <span class="front">HOME</span>
                    <span class="back">HOME</span>
                </span>
            </a></li>
            <li><a href="javascript:void(0);" class="three-d">
                Home
                <span aria-hidden="true" class="three-d-box">
                    <span class="front">CONTACT</span>
                    <span class="back">CONTACT</span>
                </span>
            </a></li>
            <li><a href="javascript:void(0);" class="three-d">
                Home
                <span aria-hidden="true" class="three-d-box">
                    <span class="front">HELP</span>
                    <span class="back">HELP</span>
                </span>
            </a></li>
            <li><a href="logout.php" class="three-d">
                Home
                <span aria-hidden="true" class="three-d-box">
                    <span class="front">LOGOUT</span>
                    <span class="back">LOGOUT</span>
                </span>
            </a></li>
        </ul>
    </div>-->

    <div class="wrapper">
      <div class="container_form">
        <form action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
        <div class = "title"><h2>STUDENT PREFERENCES</h2></div>
        <div class="mb-3">
            <label >Enter Roll Number*</label>
            <input type="number" class="form-control"
            placeholder="Roll no" name="sid" autocomplete="off" value="<?= $sid; ?>">
            <span  class="error"> <?= $sidErr; ?></span>
        </div>

        <div class="mb-3">
            <label >First Company</label>
            <input type="text" class="form-control"
            placeholder="Company1" name="company1" autocomplete="off" value="<?= $company1; ?>">
            <span  class="error"> <?= $cname1Err; ?></span>
        </div>

        <div class="mb-3">
            <label >Second Company</label>
            <input type="text" class="form-control"
            placeholder="Company2" name="company2" autocomplete="off" value="<?= $company2; ?>">
            <span  class="error"> <?= $cname2Err; ?></span>
        </div>

        <div class="mb-3">
            <label >Third Company</label>
            <input type="text" class="form-control"
            placeholder="Company3" name="company3" autocomplete="off" value="<?= $company3; ?>">
            <span  class="error"> <?= $cname3Err; ?></span>
        </div>

        <div class="mb-3">
            <label >Self</label>
            <input type="text" class="form-control"
            placeholder="Self" name="self" autocomplete="off" value="<?= $self; ?>">
            <span  class="error"> <?= $selfErr; ?></span>
        </div>

        <div class="mb-3">
            <label for="">Upload Resume</label><br>
           <!-- <input id="pdf" type="file" name="file" value="<?= $resume; ?>" required><br><br>-->
            <input id="pdf" type="file" name="file" required><br><br>
           <!--<input id="upload" type="submit" name="submit" value="Upload">-->
        </div>

        <button type="submit"  name="submit">SUBMIT</button>
        </form>

    </div>

  </body>
</html>
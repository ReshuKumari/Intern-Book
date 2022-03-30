<?php
require_once "connect.php";

$username = $password = $confirm_password = $user_role = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($con, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                //echo "Something went wrong";
                echo  '<div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">Close X</a>
                        <p><strong>Alert!</strong></p>
                        user role is wrong! Please try again!.
                      </div>';
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}

if(empty(trim($_POST['user_role']))==FALSE)
{
  $user_role=trim($_POST['user_role']);
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password, user_role) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_user_role);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        $param_user_role = $user_role;

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($con);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
  </head>
  <body>
    <!-- Start your project here-->
      <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
      
                      <!--<div class="text-center">
                        <img src="img/Banasthali_Vidyapeeth_Logo.png" style="width: 100px;" alt="logo">
                        <h4 class="mt-1 mb-3 pb-1">We are The Lotus Team</h4>
                      </div>-->
                      <form action="" method="post">
                        <h4>Please register your account</h4>
                        <label for="inputEmail4">Username</label>
                        <div class="form-outline mb-4">
                            <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Email">
                        </div>
                        <label for="inputPassword4">Password</label>
                        <div class="form-outline mb-4">
                            <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password">
                        </div>
                        <label for="inputPassword4">Confirm Password</label>
                        <div class="form-outline mb-4">
                            <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password">
                        </div>
                        <label for="inputPassword4">Select Role</label>
                        <select  name ="user_role" class="form-select mb-4" aria-label="Default select example">
                            <option selected value="TPO">TPO</option>
                            <option value="TPC">TPC</option>
                            <option value="STUDENT">STUDENT</option>
                        </select>
      
                        <div class="text-center pt-1 mb-5 pb-1">
                          <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Register</button>
                        </div>
      
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                    <h4 class="mb-4">Banasthali Vidyapith</h4>
                      <p1 class="large mb-0">Banasthali Vidyapith aims at the synthesis of spiritual 
                        values and scientific achievements of both the East and the West. Its educational
                         programme is based on the concept of "Panchmukhi Shiksha" and aims at all round
                          harmonious development of personality.</p1>

                      <p2 class="large mb-0">Emphasis on Indian culture and thought 
                        characterized by simple living and khadi wearing are hallmarks 
                        of life at Banasthali.</p2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>

    <style>
      .gradient-custom-2 {
      /* fallback for old browsers */
      background: #fccb90;

      /* Chrome 10-25, Safari 5.1-6 */
      background: rgb(41,22,138);
      background: linear-gradient(90deg, rgba(41,22,138,1) 0%, rgba(56,88,186,1) 46%, rgba(0,173,255,1) 100%);
      /*background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);*/

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      /*background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);*/
    }

    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
      }
    }
    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
      }
    }
    </style>
  </body>
</html>


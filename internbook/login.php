<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: welcome.php");
    exit;
}
require_once "connect.php";

$username = $password = $user_role = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $user_role = trim($_POST['user_role']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password, user_role FROM users WHERE username = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    $param_user_role = $user_role;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $user_role);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            if($_POST['user_role'] === $user_role)
                            {
                              session_start();
                              $_SESSION["username"] = $username;
                              $_SESSION["id"] = $id;
                              $_SESSION["loggedin"] = true;
                              $_SESSION["user_role"] = $user_role;
  
                              //Redirect user to welcome page
                              header("location: welcome.php");
                            }
                            else {
                              //echo 'invalid username or password';
                              
                              //header("location:login.php?msg=$msg");
                              echo  '<div class="alert alert-danger">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">Close X</a>
                                      <p><strong>Alert!</strong></p>
                                      user role is wrong! Please try again!.
                                    </div>';

                            }
                            
                        }
                    }
                }

    }
}    

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
      
                      <div class="text-center">
                        <img src="img/Banasthali_Vidyapeeth_Logo.png" style="width: 100px;" alt="logo">
                        <h4 class="mt-1 mb-3 pb-1">Campus Placement Banasthali Vidyapith</h4>
                      </div>
      
                      
                      <form action="" method="post">
                        <p>Please login to your account</p>
                        <div class="form-outline mb-4">
                          <!--<label for="exampleInputEmail1">Username</label>-->
                          <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
                        </div>
                        <div class="form-outline mb-4">
                          <!--<label for="exampleInputPassword1">Password</label>-->
                          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                        </div>
                        <div class="form-outline mb-4">
                          <select name="user_role" class="form-select" aria-label="Default select example">
                            <option value="TPO" selected>TPO</option>
                            <option value="TPC">TPC</option>
                            <option value="STUDENT">STUDENT</option>
                            <!--<option value="3">STUDENT</option>-->
                          </select>
                        </div>
                        <div class="text-center pt-1 mb-5 pb-1">
                          <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log in</button>
                          <!--<a class="text-muted" href="#!">Forgot password?</a>-->
                        </div>
                        <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                        <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">Don't have an account?</p>
                          <button type="submit" class="btn btn-outline-blue">
                            <a href="new_register.php">Create new</a>
                          </button>
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



<?php
include 'connect.php';
if(isset($_GET['deletecname'] , $_GET['deletecity'])){
    $cname=$_GET['deletecname'];
    $city=$_GET['deletecity'];
    $sql = "DELETE FROM company_details WHERE cid=(SELECT cid from company_details where cname = '".$cname."' AND city = '".$city."')";
    $result=mysqli_query($con,$sql);
    if($result){
       // echo"deleted successfully";
       header('location:welcome.php');
     }
    else{
        die(mysqli_error($con));
    }
}
?>
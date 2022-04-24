<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}
?>

<?php
include 'connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Management system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylecss.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="myScripts.js"></script>      
    <script type='text/javascript'>
        $(document).ready(function(){

            // Initializing slider
            $( "#slider" ).slider({
                range: true,
                min: 0,
                max: 50,
                values: [ 0, 50 ],
                slide: function( event, ui ) {

                    // Get values
                    var min = ui.values[0];
                    var max = ui.values[1];
                    $('#range').text(min+' - ' + max);
                    
                    // AJAX request
                    $.ajax({
                        url: 'getData.php',
                        type: 'post',
                        data: {min:min,max:max},
                        success: function(response){

                            // Updating table data
                            $('#tableid tr:not(:first)').remove();
                            $('#tableid').append(response);    
                        }      
                    });
                }
            });
        });
    </script>

    <script>
        
    /*$('table tr').on('click', 'td', function () {
    window.location.href = "view.php";
    })*/
    </script>
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
            ?php if($_SESSION["user_role"]=="TPO")
            {
                echo '<li><a href="insert.php" class="three-d">
                    INSERT
                    <span aria-hidden="true" class="three-d-box">
                        <span class="front">INSERT</span>
                        <span class="back">INSERT</span>
                    </span>
                </a></li>';
            } ?>
                
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
    <div class = "wrapper"> 
    <!--<div class="dropdownP">
      <button onclick="myFunction()" class="dropbtnP">PAID</button>
      <div id="mydropdownP" class="dropdownP-content">
        <a href="#">YES</a>
        <a href="#">NO</a>
      </div>
    </div>
    <div class="dropdownT">
      <button onclick="myFunction()" class="dropbtnT">TEST</button>
      <div id="mydropdownT" class="dropdownT-content">
        <a href="#">YES</a>
        <a href="#">NO</a>
      </div>
    </div>-->
<!--<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">-->
    <div class="container">

    <div class="slider-container">
      <!-- slider --> 
      <label>CTC RANGE (in Lakhs)</label>
      <div id="slider" class="slider-child"></div><br/>
      Range: <span id='range'></span>
    </div>  
  <table id="tableid" class="table">
  <thead>

    <tr>
    
      <th scope="col">NAME</th>
      <th scope="col">ABBRE.</th>
      <th scope="col">CITY</th>
      <th scope="col">STATE</th>
      <th scope="col">CTC</th>
      <th scope="col"></th> 
    </tr>
  </thead>
  <tbody>

  <?php
   $sql="select * from company_details order by cname asc";
   $result=mysqli_query($con,$sql);
   if($result){
      while($row=mysqli_fetch_assoc($result)){
          $cname=$row['cname'];
          $cname_abb=$row['cname_abb'];
          $city=$row['city'];
          $state=$row['state'];
          $ctc=$row['ctc_ug'];
          if($_SESSION["user_role"]=="TPO"){
          echo '<a href="view.php?updatecname='.$cname.' & updatecity='.$city.'">
          <tr onclick="window.location.href=\'view.php?updatecname='.$cname.' & updatecity='.$city.'\'" style = "cursor:pointer">
          <th scope="row">'.$cname.'</th>
          <td>'. $cname_abb.'</td>
          <td>'. $city.'</td>
          <td>'.$state.'</td>
          <td>'.$ctc.'</td>
            <td>
            <button class="btnd" title="DELETE DETAILS"><a  onclick="return confirm(\'Are you sure you want to delete this record?\')" href="delete.php?deletecname='.$cname.' & deletecity='.$city.'" ><i class="fa fa-trash" style="color:red"></i></a></button>
            <button class="btnu" title="UPDATE DETAILS"><a href="update.php?updatecname='.$cname.' & updatecity='.$city.'" ><i class="fa fa-edit" style="color:green"></i></a></button>
            </td>
        </tr> 
        </a>';
          }
          else
          {
            echo '<a href="view.php?updatecname='.$cname.' & updatecity='.$city.'">
            <tr onclick="window.location.href=\'view.php?updatecname='.$cname.' & updatecity='.$city.'\'" style = "cursor:pointer">
            <th scope="row">'.$cname.'</th>
            <td>'. $cname_abb.'</td>
            <td>'. $city.'</td>
            <td>'.$state.'</td>
            <td>'.$ctc.'</td>
            <td>
            </td>
          </tr> 
          </a>';
          }
      }
   }
  ?>
  </tbody>
</table>
    </div>
</div>
<?php include 'footer.php';?>

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Script -->
   
    <script>
    $(document).ready(function() {
        $('#tableid').DataTable();
    } );
    </script>
</body>
</html>



<!--navbar - code - https://codepen.io/piyushpd/pen/gOYvZPG-->
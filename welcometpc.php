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
                        url: 'getDatatpc.php',
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
    <style>

/*.wrapper {
  width: 100%;
  background-image: radial-gradient(circle, #f2fbff, #d3e6f3, #8888884f); font-family: poppins;
    padding: 75px;
}
        
        .nav, .nav ul {
            margin: 0;
            padding: 0;
            list-style: none;
            line-height: 1;
        }
        .nav {
            justify-content: center;
            position: relative;
            margin: auto; 
            height: 60px;
            width: 1450px;
            text-align: center;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .3);
            background-image: url(data:image/png;base64,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);

            background: #3833d6;
        }
        .nav ul {
            display: none;
        }
        .nav li {
            margin: 0;
            line-height: 1;
            padding: 5px;
            display: inline;
            position: relative;
            margin: 0 12px;
        }
        .nav::after, .nav::before {
            content: "";
            display: block;
            position: absolute;
            top: 6px;
            height: 0px;
            width: 0px;
            border: 23px solid #3833d6;
            z-index: -1;
        }

        .nav::before {
            border-left-color: transparent;
            left: -30px;
        }
 

        .nav::after {
            border-right-color: transparent;
            right: -30px;
        }
        .nav li a {
            display: inline-block;
            padding: 15px 20px;
            position: relative;
        
            font-family: 'Oswald', sans-serif;
            font-size: 16px;
            text-transform: uppercase;
            text-decoration: none;
            color: #fff;
            text-shadow: 1px 2px rgba(0, 0, 0, .2);
        
            -webkit-transition: color .3s linear;
            -moz-transition: color .3s linear;
            -o-transition: color .3s linear;
            -ms-transition: color .3s linear;
            transition: color .3s linear;
        }
        
        .nav li a:hover, .nav li:hover a {
            color: #2057ac;
        }
        .three-d {
            perspective: 200px;
            transition: all .07s linear;
            position: relative;
            cursor: pointer;
        }
  
            .three-d:hover .three-d-box, 
            .three-d:focus .three-d-box {
                transform: translateZ(-25px) rotateX(90deg);
            }

        .three-d-box {
            transition: all .3s ease-out;
            transform: translatez(-25px);
            transform-style: preserve-3d;
            pointer-events: none;
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            width: 100%;
            height: 100%;
        }

   
        .front {
            transform: rotatex(0deg) translatez(25px);
        }

        .back {
            transform: rotatex(-90deg) translatez(25px);
            color: #ffe7c4;
        }

        .front, .back {
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background: white;
            padding: 15px 5px;
            color: blue;
            pointer-events: none;
            box-sizing: border-box;
            border-radius: 50px;
        }

        .slider-container {
  background: white;
    margin: auto;
    margin-bottom: 30px;
    margin-top: -80px;
}


div#tableid_filter {
    margin-left: 350px;
    width: 100%;
}
input.form-control.form-control-sm {
    border-radius: 50px;
}
.col-sm-12.col-md-6 {
    margin-top: -20px;
    margin-bottom: 30px;
}


.table {
    box-sizing: border-box;
    background: white;
    box-shadow: 1px 1px 20px #619cbd, -11px -0.5px 15px #7f7f7f;
}

.table>thead {
    background: #d0d0d0b3;
}

.page-item:first-child .page-link {
    border-top-left-radius: 0.75rem;
    border-bottom-left-radius: 0.75rem;
}
.page-item.disabled .page-link {
    color: white;
    pointer-events: none;
    background-color: #000;
    border-color: #dee2e6;
}
.page-item.active .page-link {
    z-index: 3;
    color: blue;
    background-color: #e3faff;
    border-color: #e3faff;
}
.page-item:last-child .page-link {
    border-top-right-radius: 0.75rem;
    border-bottom-right-radius: 0.75rem;
}
div#tableid_info {
    color: blue;
    text-shadow: 1px 2px rgb(0 0 0 / 15%);
    margin-top: 4.5px;
    font-size: 18px;
}*/
    </style>
</head>

<body>
    <div class="container_nav">
        <ul class="nav">
        <li><a href="homepagetpc.php" class="three-d">
                    HOME
                    <span aria-hidden="true" class="three-d-box">
                        <span class="front">HOME</span>
                        <span class="back">HOME</span>
                    </span>
                </a></li>
                <li><a href="welcometpc.php" class="three-d">
                    VIEW
                    <span aria-hidden="true" class="three-d-box">
                        <span class="front">VIEW</span>
                        <span class="back">VIEW</span>
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
    </div>
    <div class = "wrapper"> 
    
    <div class="container">

    <div class="slider-container">
      <!-- slider --> 
      <label>CTC RANGE (Lakhs)</label>
      <div id="slider" class="slider-child"></div><br/>
      Range: <span id='range'></span>
    </div>  
  <table id="tableid" class="table">
  <thead>

    <tr>
    
      <th scope="col">NAME</th>
      <th scope="col">ABB</th>
      <th scope="col">CITY</th>
      <th scope="col">STATE</th>
      <th scope="col">CTC</th>
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
          echo '<a href="viewtpc.php?updatecname='.$cname.' & updatecity='.$city.'">
          <tr onclick="window.location.href=\'viewtpc.php?updatecname='.$cname.' & updatecity='.$city.'\'" style = "cursor:pointer">
          <th scope="row">'.$cname.'</th>
          <td>'. $cname_abb.'</td>
          <td>'. $city.'</td>
          <td>'.$state.'</td>
          <td>'.$ctc.'</td>
        </tr> 
        </a>';
      }
   }
  ?>
  </tbody>
</table>
    </div>
</div>
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
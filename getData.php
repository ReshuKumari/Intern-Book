<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}
?>
<?php

include 'connect.php';

$min = $_POST['min'];
$max = $_POST['max'];

$query = 'select * from company_details where ctc_ug>='.$min.' and ctc_ug<='.$max;
$result = mysqli_query($con,$query);

$html = '';
while( $row=mysqli_fetch_array($result) ){
    $cname=$row['cname'];
    $cname_abb=$row['cname_abb'];
    $city=$row['city'];
    $state=$row['state'];
    $ctc_ug=$row['ctc_ug'];

    if($_SESSION["user_role"]=="TPO")
    {
        $html .='<tr onclick="window.location.href=\'view.php?updatecname='.$cname.' & updatecity='.$city.'\'" style = "cursor:pointer">';
        $html .='<td>'.$cname.'</td>';
        $html .='<td>'.$cname_abb.'</td>';
        $html .='<td>'.$city.'</td>';
        $html .='<td>'.$state.'</td>';
        $html .='<td>'.$ctc_ug.'</td>';
        $html .='<td>
        <button class="btnd"><a href="delete.php?deletecname='.$cname.' & deletecity='.$city.'" ><i class="fa fa-trash" style="color:red"></i></a></button>
        <button class="btnu"><a href="update.php?updatecname='.$cname.' & updatecity='.$city.'" ><i class="fa fa-edit" style="color:green"></i></a></button>
        </td>';
        $html .='</tr>';
    }
    else
    {
        $html .='<tr onclick="window.location.href=\'view.php?updatecname='.$cname.' & updatecity='.$city.'\'" style = "cursor:pointer">';
        $html .='<td>'.$cname.'</td>';
        $html .='<td>'.$cname_abb.'</td>';
        $html .='<td>'.$city.'</td>';
        $html .='<td>'.$state.'</td>';
        $html .='<td>'.$ctc_ug.'</td>';
        $html .='<td>
        </td>';
        $html .='</tr>';
    }
}

echo $html;
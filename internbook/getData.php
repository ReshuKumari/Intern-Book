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

    $html .='<tr>';
    $html .='<td>'.$cname.'</td>';
    $html .='<td>'.$cname_abb.'</td>';
    $html .='<td>'.$city.'</td>';
    $html .='<td>'.$state.'</td>';
    $html .='<td>'.$ctc_ug.'</td>';
    $html .='<td>
    <button class="btnd"><a href="delete.php?deletecname='.$cname.' & deletecity='.$city.'" ><i class="fa fa-trash"></i></a></button>
    <button class="btnu"><a href="update.php?updatecname='.$cname.' & updatecity='.$city.'" ><i class="fa fa-edit"></i></a></button>
    </td>';
    $html .='</tr>';
}

echo $html;
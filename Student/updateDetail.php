<?php
include '../Connect/Connect.php';
if(isset($_GET['updateStudent'])){
    $s_id=$_GET['s_id'];
    $f_Name=$_GET['first_name'];
    $l_Name=$_GET['last_name'];
    $Address_number=$_GET['address_number'];
    $Address_street=$_GET['address_street'];
    $Address_city=$_GET['address_city'];
    $Address_country=$_GET['address_country'];
    $Gender = $_GET['gender'];
    $Department = $_GET['department'];

    $q2="UPDATE person SET hall.person.first_name='$f_Name', hall.person.last_name='$l_Name', hall.person.address_number='$Address_number', hall.person.address_street='$Address_street', hall.person.address_city='$Address_city', hall.person.address_country='$Address_country', hall.person.gender='$Gender' WHERE hall.person.id='$s_id'";
    mysqli_query($link,$q2);

    $q3="UPDATE student SET hall.student.department='$Department' WHERE hall.student.id='$s_id'";
    mysqli_query($link,$q3);

    header('location:viewDetail.php');
}
?>
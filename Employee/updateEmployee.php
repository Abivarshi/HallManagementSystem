<?php
include '../Connect/Connect.php';
if(isset($_GET['updateEmployee'])){
    $e_id=$_GET['e_id'];
    $f_Name=$_GET['first_name'];
    $l_Name=$_GET['last_name'];
    $Address_number=$_GET['address_number'];
    $Address_street=$_GET['address_street'];
    $Address_city=$_GET['address_city'];
    $Address_country=$_GET['address_country'];
    $Gender = $_GET['gender'];
    $Date_of_Birth=$_GET['date_of_birth'];
    $salary=$_GET['salary'];
    $position=$_GET['position'];
    $Working_hours=$_GET['working_hours'];

    $q2="UPDATE person SET hall.person.first_name='$f_Name', hall.person.last_name='$l_Name', hall.person.address_number='$Address_number', hall.person.address_street='$Address_street', hall.person.address_city='$Address_city', hall.person.address_country='$Address_country', hall.person.gender='$Gender', hall.person.date_of_birth=$Date_of_Birth WHERE hall.person.id='$e_id'";
    mysqli_query($link,$q2);

    $q3="UPDATE hall.employee SET hall.employee.salary='$salary', hall.employee.position='$position',hall.employee.working_hours='$Working_hours'  WHERE hall.employee.id='$e_id'";
    mysqli_query($link,$q3);

    header('location:viewEmployee.php');
}
?>
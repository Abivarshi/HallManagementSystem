<?php
include '../Connect/Connect.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $result = mysqli_query($link,"select * from requestroom where id='$id'");
    while ($line = mysqli_fetch_array($result)){
        $f_name=$line['first_name'];
        $l_name=$line['last_name'];
        $add_num=$line['address_number'];
        $add_street=$line['address_street'];
        $add_city=$line['address_city'];
        $add_country=$line['address_country'];
        $gender = $line['gender'];
        $dob=date($line['date_of_birth']);
        $department=$line['department'];
    }
    $result_1 = mysqli_query($link,"INSERT INTO person(id,first_name,last_name,address_number,address_street,address_city,address_country,gender,date_of_birth) VALUES('$id','$f_name','$l_name','$add_num','$add_street','$add_city','$add_country','$gender',$dob)");
    $result_2 = mysqli_query($link,"INSERT INTO student(id,department) VALUES('$id','$department')");
    $r = mysqli_query($link, "DELETE FROM requestroom WHERE id=$id");
    if($result_2 and $result_1 and $r){
        header('location:acceptRoom.php');
    }
}

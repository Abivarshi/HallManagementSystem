<?php
include '../Connect/Connect.php';
if(isset($_GET['id'])) {
    $id=$_GET['id'];
    $q = "DELETE FROM requestroom WHERE id='$id'";
    $r = mysqli_query($link, $q);
    if($r){
        header('location:acceptRoom.php');
    }
}
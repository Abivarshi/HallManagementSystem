<?php
include '../Connect/Connect.php';
if(isset($_GET['id'])) {
    $id=$_GET['id'];
    $q = "DELETE FROM vacate WHERE id='$id'";
    $r = mysqli_query($link, $q);
    if($r){
        header('location:../index/index_admin.php');
    }
}
<?php
include '../Connect/Connect.php';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE person SET status='0' WHERE id=$id";
    $sql_1 = "DELETE FROM user WHERE id=$id";
    $sql_2 = "DELETE FROM student WHERE id=$id";
    $sql_3 = "DELETE FROM vacate WHERE id=$id";
    $result = mysqli_query($link, $sql);
    $result_2 = mysqli_query($link, $sql_1);
    $result_3 = mysqli_query($link, $sql_2);
    $result_3 = mysqli_query($link, $sql_3);
    header('location:../index/index_admin.php');
}
?>
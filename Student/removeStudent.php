<?php include '../Connect/Connect.php';
if (isset($_GET['YES'])) {
    $result = $_GET['YES'];
}else if (isset($_GET['NO'])){
    $result = $_GET['NO'];
}
if ($result=='yes'){
    $id=$_GET['id'];
    $sql="UPDATE person SET status='0' WHERE id=$id";
    $sql_1="DELETE FROM user WHERE id=$id";
    $sql_2="DELETE FROM student WHERE id=$id";
    $result=mysqli_query($link,$sql);
    $result_2=mysqli_query($link,$sql_1);
    $result_3=mysqli_query($link,$sql_2);
    header('location:../index/index_admin.php');
}elseif ($result=='no'){
    header('location:viewDetail.php');
}
?>
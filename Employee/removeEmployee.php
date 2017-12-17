<?php include '../Connect/Connect.php';
if (isset($_GET['YES'])) {
    $result = $_GET['YES'];

}else if (isset($_GET['NO'])){
    $result = $_GET['NO'];
}
if ($result=='yes'){
    $id=$_GET['id'];
    $sql="UPDATE person SET status='0' WHERE id=$id";
    $result=mysqli_query($link,$sql);
    header('location:viewEmployee.php');
}elseif ($result=='no'){
    header('location:viewEmployee.php');
}
?>
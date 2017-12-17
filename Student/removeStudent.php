<?php include '../Connect/Connect.php';
session_start();
if (isset($_GET['YES'])) {
    $result = $_GET['YES'];

}else if (isset($_GET['NO'])){
    $result = $_GET['NO'];
}
$id=$_SESSION['sid'];
if ($result=='yes'){
    $sql="DELETE FROM person WHERE id=$id";
    $sql_1="DELETE FROM user WHERE id=$id";
    $sql_2="DELETE FROM student WHERE id=$id";
    $result=mysqli_query($link,$sql);
    $result_2=mysqli_query($link,$sql_1);
    $result_3=mysqli_query($link,$sql_2);
}elseif ($result=='no'){
    ?>

<?php
    echo '<script>window.location="viewDetail.php"</script>';
}
?>
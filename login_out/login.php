<?php session_start();
include '../Connect/Connect.php';
$message='';
if (isset($_GET['username']) && isset($_GET['password'])){
    $username1 = $_GET['username'];
    $password = $_GET['password'];
    $password_md5 = md5($_GET['password']);

    if (!empty($username1) && !empty($password)){
        $query = "SELECT id,role FROM user WHERE id ='$username1' AND password = '$password'";
        if($query_run = mysqli_query($link,$query)){
            if (mysqli_num_rows($query_run)==0){
                $message = 'username and password are unmatched';
            } else {
                $query_row=mysqli_fetch_assoc($query_run);
                $_SESSION['id'] = $query_row['id'];
                if ($query_row['role']=='student'){
                    header('Location:../index/index_student.php');
                }else if($query_row['role']=='admin'){
                    header('Location:../index/index_admin.php');
                }

            }
        }
    } else{
        $message='You should enter username and password';
    }
}
if ($message!=''){
    header('Location:../index/home_page.php');
}
?>
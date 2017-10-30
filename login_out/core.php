<?php session_start();
ob_start();
$current_file = $_SERVER['SCRIPT_NAME'];

function logged_in(){
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
        return true;
    } else {
        return false;
    }
}
?>
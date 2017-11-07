<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 7/4/2017
 * Time: 3:11 AM
 */
session_start();
session_destroy();
header('Location: ../home_page.php');
?>
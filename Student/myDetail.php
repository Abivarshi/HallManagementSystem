<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="../assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        div[id = message_2]{
            color: #7a0a0c;
            margin-top: 10px;
            padding: 0px 20px 20px;
            width: auto ;
            border-radius: 2px;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <?php include '../index/student_nav_bar.php'?>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Student Details
                    </div>

                    <?php session_start();
                    include '../Connect/Connect.php';
                    $ID = $_SESSION['id'];
                    $q1="select first_name,last_name,concat(address_number,',  ',address_street,',  ',address_city,',  ',address_country,'.') as address,gender,date_of_birth,department,balance,hall.name as hall_name,room_number from (person natural join student natural join stays) join hall using(hall_id) where person.id=$ID and year=Year(now())";
                    $result = mysqli_query($link,$q1);
                    while ($line = mysqli_fetch_array($result)){
                        $f_Name=$line['first_name'];
                        $l_Name=$line['last_name'];
                        $Address=$line['address'];
                        $Gender = $line['gender'];
                        $Date_of_Birth=$line['date_of_birth'];
                        $Department=$line['department'];
                        $Balance=$line['balance'];
                        $Hall_name=$line['hall_name'];
                        $Room=$line['room_number'];
                    }?>

                    <div class="panel-body">
                        <b>Name: </b>
                        <div id="message_2"><?php echo $f_Name," ",$l_Name; ?></div>
                        <b>Address: </b>
                        <div id="message_2"><?php echo $Address; ?></div>
                        <b>Gender: </b>
                        <div id="message_2"><?php echo $Gender; ?></div>
                        <b>Date_of_Birth: </b>
                        <div id="message_2"><?php echo $Date_of_Birth; ?></div>
                        <b>Department: </b>
                        <div id="message_2"><?php echo $Department; ?></div>
                        <b>Hall: </b>
                        <div id="message_2"><?php echo $Hall_name; ?></div>
                        <b>Room: </b>
                        <div id="message_2"><?php echo $Room; ?></div>
                        <b>Balance: </b>
                        <div id="message_2"><?php echo $Balance; ?></div>
                        <button type='button' class='btn btn-info ' data-toggle='modal' data-target='#myModal'>Edit</button>
                        <!-- Modal -->
                        <div class='modal fade' id='myModal' role='dialog'>
                            <div class='modal-dialog'>
                                <!-- Modal content-->
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                        <h4 class='modal-title'>UPDATE DETAIL</h4>
                                    </div>
                                    <div class='panel-body'>
                                        <form action='myDetail.php' method='get'>
                                            <div class='form-group'>
                                                <label>Student Id</label>
                                                <input class='form-control' name='id'size='100' type='text' value="<?php echo $ID?>">
                                            </div>
                                            <div class='form-group'>
                                                <label>First Name</label>
                                                <input class='form-control' name='first_name' type='text' value="<?php echo $f_Name?>">
                                            </div>
                                            <div class='form-group'>
                                                <label>Last Name</label>
                                                <input class='form-control'name='last_name' type='text' value="<?php echo $l_Name?>">
                                            </div>
                                            <div class='form-group'>
                                                <label>Department</label>
                                                <input class='form-control'name='department' type='text' value="<?php echo $Department?>">
                                            </div>
                                            <div class='form-group'>
                                                <label>Date of Birth</label>
                                                <input class='form-control'name='date_of_birth' type='text' value="<?php echo $Date_of_Birth?>">
                                            </div>
                                            <div class='form-group'>
                                                <label>Gender</label>
                                                <input class='form-control'name='gender' type='text' value="<?php echo $Gender?>">
                                            </div>
                                            <button type='submit' class='btn btn-info' name='requestRoom'>Submit </button>
                                        </form>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. PAGE INNER  -->

    </div>
    <footer>
        <div class = 'footer1'>
            <b>Address</b><br/>
            University of Sumanadasa,<br/>
            Moratuwa.
        </div>
        <div class = 'footer2'>
            <b>Contact Us</b><br/>
            Email : uos@gmail.com<br />
            Tel: Principal office: +940112220000
        </div>
        <div class = 'footer3'><i>copyright : Codmax</i></div>
    </footer>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

<!-- /. FOOTER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="../assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="../assets/js/bootstrap.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="../assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="../assets/js/custom.js"></script>


</body>
</html>
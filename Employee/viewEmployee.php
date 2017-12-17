<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Detail</title>

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
    <?php include '../index/admin_nav_bar.php'?>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="panel panel-default">
                <div class="col-md-12">
                    <h1 class="page-head-line">View Employee detail</h1>
                </div>
                <div class="panel-body">
                    <form role="form" action="viewEmployee.php">
                        <div class="form-group">
                            <label>ID</label>
                            <input class="form-control" type="text" name="ID" pattern="[0-9]{4}" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Submit </button>
                    </form>
                </div>

                <?php include '../Connect/Connect.php';
                if(isset($_GET['ID'])){
                    $ID = $_GET['ID'];
                    $q1="select first_name,last_name,address_number,address_street,address_city,address_country,gender,date_of_birth,salary,position,working_hours,hall.name as hall_name from (person natural join employee natural join works) join hall using(hall_id) where person.id=$ID";
                    $result = mysqli_query($link,$q1);
                    $queryCount = mysqli_num_rows($result);
                    if($queryCount > 0) {
                        while ($line = mysqli_fetch_array($result)){
                            $f_Name=$line['first_name'];
                            $l_Name=$line['last_name'];
                            $Address_number=$line['address_number'];
                            $Address_street=$line['address_street'];
                            $Address_city=$line['address_city'];
                            $Address_country=$line['address_country'];
                            $Gender=$line['gender'];
                            $Date_of_Birth=$line['date_of_birth'];
                            $Salary=$line['salary'];
                            $Position=$line['position'];
                            $Working_hours=$line['working_hours'];
                            $Hall=$line['hall_name'];
                        } ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Employee Detail of <?php echo $f_Name," ",$l_Name; ?>
                                    </div>
                                    <div class="panel-body">
                                        <b>Name: </b>
                                        <div id="message_2"><?php echo $f_Name," ",$l_Name; ?></div>
                                        <b>Address: </b>
                                        <div id="message_2"><?php echo $Address_number,", ",$Address_street,", ",$Address_city,", ",$Address_country;?></div>
                                        <b>Gender: </b>
                                        <div id="message_2"><?php echo $Gender; ?></div>
                                        <b>Date_of_Birth: </b>
                                        <div id="message_2"><?php echo $Date_of_Birth; ?></div>
                                        <b>Salary: </b>
                                        <div id="message_2"><?php echo $Salary;?></div>
                                        <b>Position: </b>
                                        <div id="message_2"><?php echo $Position; ?></div>
                                        <b>Working Hours: </b>
                                        <div id="message_2"><?php echo $Working_hours;?></div>
                                        <b>Hall: </b>
                                        <div id="message_2"><?php echo $Hall; ?></div>
                                        <button type='button' class='btn btn-info ' data-toggle='modal' data-target='#myModal'>Edit</button>
                                        <button type='button' class='btn btn-danger ' data-toggle='modal' data-target='#myModal_1'>Remove</button>
                                        <div class='modal fade' id='myModal' role='dialog'>
                                            <div class='modal-dialog'>
                                                <!-- Modal content-->
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                        <h4 class='modal-title'>UPDATE DETAIL</h4>
                                                    </div>
                                                    <div class='panel-body'>
                                                        <form action='updateEmployee.php' method='get'>
                                                            <div class='form-group'>
                                                                <label>Employee ID</label>
                                                                <input class='form-control' name='e_id' size='100' pattern="[0-9]{4}" type='text' required value="<?php echo $ID?>">
                                                            </div>
                                                            <div class='form-group'>
                                                                <label>First Name</label>
                                                                <input class='form-control' name='first_name'  pattern='[A-Za-z ]+' type='text' required value="<?php echo $f_Name?>">
                                                            </div>
                                                            <div class='form-group'>
                                                                <label>Last Name</label>
                                                                <input class='form-control' name='last_name' pattern='[A-Za-z ]+' type='text' required value="<?php echo $l_Name?>">
                                                            </div>
                                                            <div class='form-group'>
                                                                <label>Address Number</label>
                                                                <input class='form-control' name='address_number' type='text' value="<?php echo $Address_number?>" required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label>Addrss Street</label>
                                                                <input class='form-control' name='address_street' type='text' value="<?php echo $Address_street?>" required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label>Address City</label>
                                                                <input class='form-control' name='address_city' type='text' value="<?php echo $Address_city?>" required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label>Address Country</label>
                                                                <input class='form-control' name='address_country' type='text' value="<?php echo $Address_country?>" required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <label>Gender</label>
                                                                <input class='form-control' name='gender' pattern='male|female|Male|Female' required value="<?php echo $Gender?>">
                                                            </div>
                                                            <div class='form-group'>
                                                                <label>Salary</label>
                                                                <input class='form-control' name='salary'  type='number' min=1 step="0.01" required value="<?php echo $Salary?>">
                                                            </div>
                                                            <div class='form-group'>
                                                                <label>Position</label>
                                                                <input class='form-control' name='position' pattern='[A-Za-z ]+' required value="<?php echo $Position?>">
                                                            </div>
                                                            <div class='form-group'>
                                                                <label>Working_Hours</label>
                                                                <input class='form-control' name='working_hours'  type='number' min=0 max="24" step="0.01" required value="<?php echo $Working_hours?>">
                                                            </div>
                                                            <button type='submit' class='btn btn-info' name='updateEmployee'>Submit </button>
                                                        </form>

                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='modal fade' id='myModal_1' role='dialog'>
                                            <div class='modal-dialog'>
                                                <!-- Modal content-->
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                        <h4 class='modal-title'>REMOVE STUDENT</h4>
                                                    </div>
                                                    <div class='panel-body'>
                                                        <form action='removeEmployee.php' method='get'>
                                                            <p> Are you sure want to remove student <?php echo $f_Name." ".$l_Name; ?><br>
                                                                Student ID : <input style="border-color: white" name='id' type='text' size=5 value="<?php echo $ID; ?>"> </p>
                                                            <button type="submit" class="btn btn-info" name="YES" value="yes">YES</button>
                                                            <button type="submit" class="btn btn-danger" name="NO" value="no">NO</button>
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
                <?php }else{ echo '<p> No result found.. please check Student ID </p>'; }}?>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
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
    </div>

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
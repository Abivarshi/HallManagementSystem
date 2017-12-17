<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Employee</title>

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
</head>
<body>
<div id="wrapper">
    <?php include "../index/admin_nav_bar.php";?>
    <div id="page-wrapper">
        <div id="page-inner">

            <!-- /. ROW  -->
            <div class="panel panel-info">
                <div class="panel-heading">
                    EMPLOYEE DETAIL FORM
                </div>
                <div class="panel-body">
                    <form role="form"  action='addEmployee.php' method="get">
                        <div class="form-group">
                            <label>Employee ID</label>
                            <input class="form-control" type="text" name="em_id" pattern="[0-9]{4}" required>
                            <label>Name</label>
                            <input class="form-control" type="text" placeholder="first name" name="fName" pattern="[A-Za-z]{1,55}" required>
                            <input class="form-control" type="text" placeholder="last name" name="lName" pattern="[A-Za-z]{1,55}" required>
                        </div>
                        <div class="form-group">
                            <label>Sex</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sex" id="sexM" value="Male" required="required">Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="sex" id="sexF" value="Female" required="required">Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Date of birth</label>
                            <input class="form-control" placeholder="yyyy/mm/dd" type="date"  name="dob" min=<?php echo date("Y")-50 ?> required>
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input class="form-control" type="number" name="salary" min=1 step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <input class="form-control" type="text" name="position" pattern="[A-Za-z]{2,55}" required>
                        </div>
                        <div class="form-group">
                            <label>Working Hours</label>
                            <input class="form-control" type="number" name="work_h" min=0 max=24 step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" placeholder="House number" name="add_no" pattern="[A-Za-z0-9]{1,25}" required>
                            <input class="form-control" type="text" placeholder="Street name" name="add_street" pattern="[A-Za-z]{2,155}" required>
                            <input class="form-control" type="text" placeholder="city" name="add_city" pattern="[A-Za-z]{2,155}" required>
                            <input class="form-control" type="text" placeholder="country" name="add_country" pattern="[A-Za-z]{2,155}" required>
                        </div>
                        <div class="form-group">
                            <label>Contact number</label>
                            <input class="form-control" type="text" name="tp_num1" pattern="[0-9]{10}" required>
                            <label>Other contact number</label>
                            <input class="form-control" type="text" name="tp_num2" pattern="[0-9]{10}" required>
                        </div>
                        <button type="submit" class="btn btn-info" name="submit">Submit </button>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <!-- /. PAGE INNER  -->
    <?php
    if (isset($_GET['submit']) ) {
        include '../Connect/Connect.php';
        $em_id = $_GET['em_id'];
        $firstName = $_GET['fName'];
        $lastName = $_GET['lName'];
        $sex = $_GET['sex'];
        $dateOfBirth = date($_GET['dob']);
        $add_no = $_GET['add_no'];
        $add_street = $_GET['add_street'];
        $add_city = $_GET['add_city'];
        $add_country = $_GET['add_country'];
        $tp_num1 = $_GET['tp_num1'];
        $tp_num2 = $_GET['tp_num2'];
        $salary = $_GET['salary'];
        $position = $_GET['position'];
        $w_h = $_GET['work_h'];

        $query = "INSERT INTO person (id,first_name,last_name,address_number,address_street,address_city,address_country,gender,date_of_birth) VALUES ('$em_id','$firstName','$lastName','$add_no','$add_street','$add_city','$add_country','$sex','$dateOfBirth')";
        if ($query_exc = mysqli_query($link, $query)) {
            echo 'success.......';
        } else {
            echo 'failed.......';
        }

        $query1="insert into employee values('$em_id','$salary','$position','$w_h')";
        $query_exc1 = mysqli_query($link, $query1);
        $query2="insert into telephone_number values('$em_id','$tp_num1')";
        $query_exc2 = mysqli_query($link, $query2);

        if(isset($_GET['tp_num2'])){
            $query3="insert into telephone_number values('$em_id','$tp_num2')";
            $query_exc3 = mysqli_query($link, $query2);
        }
    }
    else{
        echo 'fill all details';
    }

    ?>
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

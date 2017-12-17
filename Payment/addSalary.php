<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Record Salary</title>

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
        <div class="panel panel-danger">
            <div class="panel-heading">
                Employee salary settlement record
            </div>
            <div class="panel-body">
                <form role="form" action="addSalary.php" method="get">
                    <div class="form-group">
                        <label>Employee ID</label>
                        <input class="form-control" type="text" name="ID" pattern="[0-9]{4}">
                        <p class="help-block">Required</p>
                    </div>
                    <div class="form-group">
                        <label>Month</label><br>
                        <select class="form-control" name="month" required>
                            <option value="">Select Here:</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                        <p class="help-block">Required</p>
                    </div>

                    <div class="form-group">
                        <label>Year </label>
                        <input class="form-control" type="number" name="year" min=<?php echo date("Y")-2 ?> max=<?php echo date("Y")+2; ?> required >
                        <p class="help-block">Required</p>
                    </div>
                    <div class="form-group">
                        <label> Salary </label>
                        <input class="form-control" type="text" name="amount" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" required>
                        <p class="help-block">Required</p>
                    </div>
                    <button type="submit" class="btn btn-danger">Settled </button>
                    <?php include '../Connect/Connect.php';
                    $message='';
                    if(isset($_GET['ID'])) {
                        $ID = $_GET['ID'];
                        $year = (int)$_GET['year'];
                        $month = $_GET['month'];
                        $amount = $_GET['amount'];
                        $state="paid";
                        $query11 = "SELECT * FROM employee WHERE id='$ID'";
                        $query11 = $link->query($query11);
                        $queryCount = mysqli_num_rows($query11);
                        if($queryCount > 0) {
                            mysqli_query($link, "INSERT INTO employee_salary VALUES ('$ID','$year','$month',date(\"Y-m-d\"),'$amount','$state')");
                            echo "<br>".'Data stored successfully'." @ ".date("Y-m-d");
                        }
                        else{
                            $message="Employee does not exit";
                        }
                    }
                    if($message!=''){
                    ?><div class="row">
                        <div class="alert alert-info">
                            <?php echo $message; } ?>
                        </div>


                </form>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>

    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

<div id="footer-sec">
    &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
</div>
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

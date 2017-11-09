<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

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
                    Student Fee
                </div>
                <div class="panel-body">
                    <form role="form" action="addPayment.php" method="get">
                        <div class="form-group">
                            <label>ID</label>
                            <input class="form-control" type="text" name="ID">
                            <p class="help-block">Required</p>
                        </div>
                        <div class="form-group">
                            <label>Month</label>
                            <input class="form-control" type="text" name="month">
                            <p class="help-block">Required</p>
                        </div>
                        <div class="form-group">
                            <label>Year </label>
                            <input class="form-control" type="text" name="year">
                            <p class="help-block">Required</p>
                        </div>
                        <div class="form-group">
                            <label>Amount </label>
                            <input class="form-control" type="text" name="amount">
                            <p class="help-block">Required</p>
                        </div>
                        <button type="submit" class="btn btn-danger">Submit </button>
                        <?php include '../Connect/Connect.php';
                            if(isset($_GET['ID'])) {
                                $ID = $_GET['ID'];
                                $year = (int)$_GET['year'];
                                $month = $_GET['month'];
                                $amount = $_GET['amount'];
                                mysqli_query($link, "INSERT INTO payment VALUES ('$ID','$year','$month',date(\"Y-m-d\"),'$amount')");
                                echo "<br>".'Data stored successfully'.date("Y-m-d");
                            }
                            ?>
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

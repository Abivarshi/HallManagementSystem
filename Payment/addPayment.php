<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Payment</title>

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
                    <form role="form" action="">
                        <div class="form-group">
                            <label>ID</label>
                            <input class="form-control" type="text" name="ID" pattern="[0-9]{4}" required>
                            <p class="help-block">Required</p>
                        </div>

                        <div class="form-group">
                            <label>Month</label><br>
                            <select name="month">
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
                            <input class="form-control" type="number" name="year" min=<?php echo date("Y")-4 ?> max=<?php echo date("Y"); ?> required >
                            <p class="help-block">Required</p>
                        </div>

                        <div class="form-group">
                            <label>Amount </label>
                            <input class="form-control" type="number" name="amount" min=1 step="0.01"required>
                            <p class="help-block">Required</p>
                        </div>

                        <button type="submit" class="btn btn-info" name="submit">Submit </button>

                        <?php include '../Connect/Connect.php';
                        //check connection

                        //create a variable
                        if(isset($_GET['submit'])){
                            $ID = $_GET['ID'];
                            $year = (int)$_GET['year'];
                            $month = $_GET['month'];
                            $amount = (float)$_GET['amount'];
                            $query11 = "SELECT * FROM student WHERE id='$ID'";
                            $query11 = $link->query($query11);
                            $queryCount = mysqli_num_rows($query11);
                            if($queryCount > 0) {
                                $q="INSERT INTO payment(id,year,month,date,amount) VALUES ('$ID','$year','$month',now(),'$amount')";
                                $q1="UPDATE student set balance=balance+'$amount' where id='$ID'";
                                mysqli_query($link,$q);
                                mysqli_query($link,$q1);
                            }
                            else{
                                echo "<p style='color: darkred'>"."Student does not exit"."</p>";
                            }
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

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee History</title>

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
    <?php include '../index/admin_nav_bar.php'?>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="panel panel-default">
                <div class="col-md-12">
                    <h1 class="page-head-line">Employee History</h1>
                </div>
                <div class="panel-body">
                    <form action="employeeHistoryForm.php" method="get">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Employee ID </label>
                                    <input class="form-control" type="text" name="e_id" pattern="[0-9]{4}" required>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" name="submit" class="btn btn-info">Submit </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead><tr><th>Employee ID</th><th>Hall ID</th><th>Date</th></tr></thead>
                            <?php
                                include '../Connect/Connect.php';
                                $message='';
                                if(isset($_GET['submit'])){
                                    $e_ID=$_GET['e_id'];
                                    $query11 = "SELECT * FROM employee WHERE id='$e_ID'";
                                    $query11 = $link->query($query11);
                                    $queryCount = mysqli_num_rows($query11);
                                    if($queryCount > 0) {
                                        $sql="select id, first_name, last_name, hall_id, date from works NATURAL JOIN person where id=$e_ID ORDER by date desc";
                                        $result = $link->query($sql);
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr><td>" . $row["id"]."</td><td>" . $row["hall_id"]. "</td><td>" . $row["date"]. "</td></tr>";
                                        }
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
                            </div>
                        </table>
                    </div>
                </div>
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
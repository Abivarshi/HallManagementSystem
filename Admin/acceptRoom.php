<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Request</title>

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
                    <h1 class="page-head-line">Student Requests</h1>
                </div>
                <?php
                include '../Connect/Connect.php';
                $sql = "select * from requestroom ORDER BY hall_name";
                $result = $link->query($sql); ?>
                <div class="row">
                    <div class="panel-body">
                        <form role="form" action="acceptRoom.php" method="get">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Hall ID</th>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Address</th>
                                        <th>Department</th>
                                        <th>Level</th>
                                        <th>Decision</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr><td>" . $row["hall_name"] . "</td><td>" . $id=$row["id"] . "</td><td>"  . $row["first_name"] . "</td><td>"  . $row["address_number"] . "</td><td>" . $row["department"]  . "</td><td>" . $row["level"] . "</td><td>" ."<a href='accept.php?id=".$row['id']."'>Accept</a>"."    "."<a href='deny.php?id=".$row['id']."'>     Reject</a>"."</td></tr>";
                                    } ?>
                                </table>
                            </div>
                        </form>
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
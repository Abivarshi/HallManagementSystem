<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student History</title>

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
                    <h1 class="page-head-line">Student History</h1>
                </div>
                <div class="panel-body">
                    <form role="form" action="studentHistory.php" method="get">
                        <div class="form-group">
                            <label>Student ID</label>
                            <input class="form-control" type="text" name="id" pattern="[0-9]{4}" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Submit </button>
                    </form>
                </div>
                <?php
                include '../Connect/Connect.php';
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "select * from student_stay where id='$id' ORDER by year desc";
                    $result = $link->query($sql);
                    if(mysqli_num_rows($result)>0){
                    ?>
                    <div class="row">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Hall Name</th>
                                        <th>Room Number</th>
                                        <th>Year</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["room_number"] . "</td><td>" . $row["year"] . "</td></tr>";
                                    }
                }else{ echo "No result found..please check the student ID";}} ?>
                            </table>
                        </div>
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
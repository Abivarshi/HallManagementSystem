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
                $sql = "select * from requestroom ORDER BY hall_id";
                $result = $link->query($sql); ?>
                <div class="row">
                    <div class="panel-body">
                        <form role="form" action="assignRoom.php" method="get">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Hall ID</th>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Department</th>
                                        <th>Year</th>
                                        <th>Decision</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    function accept($id){
                                        include '../Connect/Connect.php';
                                        $query="select * from requestroom where id=$id";
                                        $result = mysqli_query($connect,$query);
                                        while ($line = mysqli_fetch_array($result)){
                                            $Name=$line['name'];
                                            $Address=$line['address'];
                                            $Gender = $line['gender'];
                                            $Date_of_Birth=$line['date_of_birth'];
                                            $Department=$line['department'];
                                            $Balance=$line['balance'];
                                            $Hall_name=$line['hall_name'];
                                            $Room=$line['room_number'];
                                        }
                                        $query_1 = "INSERT INTO requestroom(student_name,id,department,address,email,other_info)VALUES()";
                                        $result = mysqli_query($connect,$query_1);
                                    }
                                    function deny($id){
                                        include '../Connect/Connect.php';
                                        $q="DELETE FROM requestroom WHERE id=$id";
                                        $r = mysqli_query($connect,$q);
                                    }
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr><td>" . $row["hall_id"] . "</td><td>" . $id=$row["id"] . "</td><td>"  . $row["student_name"] . "</td><td>" . $row["department"]  . "</td><td>" . $row["year"] . "</td><td>" ."<button onclick='accept($id)' class=\"btn btn-danger\">Accept</button>"."<button onclick='deny($id)' class=\"btn btn-danger\">Deny</button>"."</td></tr>";
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
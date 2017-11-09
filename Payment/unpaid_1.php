<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hall Management</title>

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
            <div class="panel panel-default">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Non-paid student list
                    </div>
                    <form role="form" method="get" action="unpaid.php">
                        <div class="input-group">
                            <input type="text" name="s_id" class="form-control" placeholder="Enter student ID"/>
                            <span class="form-group input-group-btn">
                                    <button class="btn btn-default" type="button" name="btn">Search</button>
                                    </span>
                        </div>
                    </form>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No:</th>
                                    <th>Student ID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Balance</th>
                                </tr>
                                </thead>

                                <?php
                                include '../Connect/Connect.php';

                                if (mysqli_connect_errno()){
                                    echo "failed in connection".mysqli_connect_error();
                                }
                                $i=0;
                                $year=DATE('Y');
                                $month=DATE('M');
                                $query= "SELECT id, first_name, last_name,cost FROM stdent_stay, room WHERE id NOT IN (SELECT id FROM payment WHERE year=$year AND month='$month') AND stdent_stay.hall_id=room.hall_id AND student_stay.room_number=room.room_number";
                                $result=mysqli_query($link,$query);
                                echo $query;
                                if($query === FALSE) { die(mysqli_error()); }
                                while ($row=mysqli_fetch_assoc($result)){
                                $i+=1;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['first_name']; ?></td>
                                    <td><?php echo $row['last_name']; ?></td>
                                    <td><?php echo $row['cost']; ?></td>

                                    <?php
                                    } ?>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /. PAGE INNER  -->

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


include '../Connect/Connect.php';
if(date("d")=='08'){
$q=mysqli_query($link, "SELECT id,balance,cost FROM student,stays JOIN room USING room_number, hall_id WHERE student.id=stays.id");
while ($row=mysqli_fetch_assoc($q)){
$id=$row['id'];
$balance=$row['balance'];
$cost=$row['cost'];
$balance=$balance+$cost;
mysqli_query($link, "UPDATE student SET balance=$balance WHERE id='$id'");
}


}

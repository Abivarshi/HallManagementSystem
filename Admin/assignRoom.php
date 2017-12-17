<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assign Room</title>

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
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Assign Rooms</h1>
                </div>
                <div class="panel-body">
                    <form action="assignRoom.php" method="get">
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label>Hall Name</label>
                            </div>
                            <div class="col-sm-8">
                                <select class="form-control"name="hallName"/>
                                <option value="">Select Here:</option>
                                <?php
                                include('../Connect/Connect.php');
                                $sql="SELECT name FROM hall";
                                $result = $link->query($sql);

                                while($row = $result->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                    <?php
                                    // close while loop
                                }
                                ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" name="submit" class="btn btn-info">Submit </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    include('../Connect/Connect.php');
                    if(isset($_GET['submit']) && !empty($_GET["hallName"]))
                    {
                        $sql = "select room_number,(room_capacity-(select count(*) from stays where stays.hall_id=room.hall_id and stays.room_number=room.room_number)) as vacancy from room natural join hall where name='$_GET[hallName]' and room_capacity>(select count(*) from stays where stays.hall_id=room.hall_id and stays.room_number=room.room_number)";
                        $result = $link->query($sql);
                        if ($result->num_rows > 0) {
                            echo "<table class='table table-striped table-bordered table-hover'><tr><th>Room Number</th><th>Vacancy</th><th></th></tr>";
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["room_number"]. "</td><td>" . $row["vacancy"]. "</td><td><a href='assignRoomStudent.php?roomNumber=".$row["room_number"]."&hallName=".$_GET["hallName"]."'>Assign Room</a></td></tr>";
                            }
                        } else {
                            echo "No Rooms Available";
                        }
                    }
                    /*if(isset($_GET['assignSubmit']))
                    {


                        $hall_name=$_GET['hallName'];
                        $id=$_GET['id'];
                        $room=$_GET['roomNumber'];
                        $year=(int)$_GET['year'];
                        if (empty($year)) {
                            $Err = "date is required";
                        } else {
                            $date_regex = '%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%';


                            if (preg_match($date_regex, $test_date,$_POST['birthday']) ==true) {
                                $Err = 'bg';
                            }
                        }
                        $hallQuery="select hall_id from hall where name='$hall_name'";
                        $hallQuery=mysqli_query($link,$hallQuery);
                        $hallQuery=mysqli_fetch_array($hallQuery);
                        $hallId=$hallQuery['hall_id'];
                        $query="insert into stays(id,hall_id,room_number,year)values('$id','$hallId','$room',$year)";
                        $query1=mysqli_query($link,$query);
                    }*/
                    ?>

                </div>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

<div id="footer-sec">

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

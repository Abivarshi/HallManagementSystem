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
                    <h1 class="page-head-line"></h1>
                    <div class="panel-body">
                        <?php
                        $Err='';
                        ?>
                        <form role="form" action="assignRoomStudent.php" method="get">
                            <div class="form-group">
                                <label>Hall Name</label>
                                <input class="form-control" type="text" name="hallName" value="<?php echo $_GET['hallName']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Room Number</label>
                                <input class="form-control" type="text" name="roomNumber" value="<?php echo $_GET['roomNumber']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Student Id</label>
                                <input class="form-control" type="text" name="id" pattern="[0-9]{4}" required>
                                <p class="help-block">Enter Student Id here.<?php echo $Err;?></p>
                            </div>
                            <div class="form-group">
                                <label>Year</label>
                                <input class="form-control" type="number" min=<?php echo date("Y") ?> max=<?php echo date("Y")+2; ?> name="year" required>
                                <p class="help-block">Enter The year assigned here.</p>
                            </div>
                            <button type="submit" name="assignSubmit" class="btn btn-info">Submit </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            include('../Connect/Connect.php');
            if(isset($_GET['assignSubmit']))
            {


                $hall_name=$_GET['hallName'];
                $id=$_GET['id'];
                $room=$_GET['roomNumber'];
                $year=$_GET['year'];
                $hallQuery="select hall_id from hall where name='$hall_name'";
                $hallQuery=mysqli_query($link,$hallQuery);
                $hallQuery=mysqli_fetch_array($hallQuery);
                $hallId=$hallQuery['hall_id'];
                $query11 = "SELECT * FROM student WHERE id='$id'";
                $query11 = $link->query($query11);
                $queryCount = mysqli_num_rows($query11);
                if($queryCount > 0) {
                    $query = "insert into stays(id,hall_id,room_number,year)values('$id','$hallId','$room',$year)";
                    $query1 = mysqli_query($link, $query);
                }
                else{
                    echo "Student does not exit";
                }
            }?>
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
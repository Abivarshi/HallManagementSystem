<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vacate Room</title>

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
    <?php include '../index/student_nav_bar.php'?>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Vacate Room
                    </div>
                    <div class="panel-body">
                        <form action='vacateRoom.php' method='get'>
                            <p> Are you sure want to vacate your room?</p>
                            <button type="submit" class="btn btn-info" name="YES" value="yes">YES</button>
                            <button type="submit" class="btn btn-danger" name="NO" value="no">NO</button>
                        </form>
                    </div>
                    <?php session_start();
                    include '../Connect/Connect.php';
                    if (isset($_GET['YES'])) {
                        $id=$_SESSION['id'];
                        $sql="INSERT INTO vacate(id) VALUE ('$id')";
                        $result=mysqli_query($link,$sql);
                        header('location:../index/index_student.php');
                    }else if (isset($_GET['NO'])){
                        header('location:../index/index_student.php');
                    }
                    ?>
            </div>
        </div>
        <!-- /. PAGE INNER  -->

    </div>
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
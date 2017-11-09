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
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index_student.php">Hall Management</a>
        </div>

        <div class="header-right">


            <a href="../login_out/logout.php" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>


        </div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li>
                    <a href="#"><i class="fa fa-desktop "></i>View Detail<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="viewRoom.php"><i class="fa fa-square-o "></i>Hall</a>
                        </li>
                        <li>
                            <a href="ViewAvailableRooms.php"><i class="fa fa-square-o "></i>Room</a>
                        </li>
                        <li>
                            <a href="viewStudent.php"><i class="fa fa-square-o "></i>Student</a>
                        </li>
                        <li>
                            <a href="viewEmployee.php"><i class="fa fa-square-o "></i>Employee</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-plus "></i>Add Detail<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="addRoom.php"><i class="fa fa-square-o "></i>Hall</a>
                        </li>
                        <li>
                            <a href="addHall.php"><i class="fa fa-square-o "></i>Room</a>
                        </li>
                        <li>
                            <a href="addStudent.php"><i class="fa fa-square-o "></i>Student</a>
                        </li>
                        <li>
                            <a href="addEmployee.php"><i class="fa fa-square-o "></i>Employee</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit "></i>Update Detail<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="updateRoom.php"><i class="fa fa-square-o "></i>Hall</a>
                        </li>
                        <li>
                            <a href="updateHall.php"><i class="fa fa-square-o "></i>Room</a>
                        </li>
                        <li>
                            <a href="updateStudent.php"><i class="fa fa-square-o "></i>Student</a>
                        </li>
                        <li>
                            <a href="updateEmployee.php"><i class="fa fa-square-o "></i>Employee</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line"></h1>
                    <div class="panel-body">
                        <form role="form" action="assignRoom.php" method="get">
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
                                <input class="form-control" type="text" name="id">
                                <p class="help-block">Enter Student Id here.</p>
                            </div>
                            <div class="form-group">
                                <label>Year</label>
                                <input class="form-control" type="text"  name="year">
                                <p class="help-block">Enter The year assigned here.</p>
                            </div>
                            <button type="submit" name="assignSubmit" class="btn btn-info">Submit </button>
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
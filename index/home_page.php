<?php session_start();
include_once('../Connect/Connect.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hall Management System</title>

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
            </div>
            <img src="../assets/img/logo_bar_2.png" style="width:1110px"/>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a class="active-menu" href="../index/home_page.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>Rooms <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="../Room/viewAvailableRooms.php"><i class="fa fa-toggle-on"></i>Available Rooms</a>
                            </li>
                            <li>
                                <a href="../Student/requestRoom.php"><i class="fa fa-bell "></i>Request Room</a>
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
                        <h1 class="page-head-line">Welcome to Hall Management System</h1>
                    </div>
				</div>
				<?php
                $hallQuery = "SELECT * from hall";
				$hallQuery = $link->query($hallQuery);
				$hallCount = mysqli_num_rows($hallQuery);

				$roomQuery = "SELECT * from room";
				$roomQuery = $link->query($roomQuery);
				$roomCount = mysqli_num_rows($roomQuery);

				$studentQuery = "SELECT * from student";
				$studentQuery = $link->query($studentQuery);
				$studentCount = mysqli_num_rows($studentQuery);

                $employeeQuery = "SELECT * from employee";
                $employeeQuery = $link->query($employeeQuery);
                $employeeCount = mysqli_num_rows($employeeQuery); ?>
                <div class="col-md-8">
                    <div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href="#">
                                <i class="fa fa-university fa-5x"></i>
                                <h3>Halls</h3>
                                <h4><?php echo $hallCount; ?></h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="#">
                                <i class="fa fa-building fa-5x" ></i>
                                <h3>Rooms</h3>
                                <h4><?php echo $roomCount; ?></h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="#">
                                <i class="fa fa-users fa-5x"></i>
                                <h3>Students</h3>
                                <h4><?php echo $studentCount?></h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Hall Details
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead><tr><th>Hall Name</th><th>Type</th><th>Capacity</th></tr></thead>
                                    <?php
                                    $sql="select name,capacity,type from hall";
                                    $result = $link->query($sql);
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr><td>" . $row["name"]."</td><td>" . $row["type"]. "</td><td>" . $row["capacity"]. "</td></tr>";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>


                <div class="col-md-4 col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Login
                        </div>
                        <div class="panel-body">
                            <form action="home_page.php" role="form" method="get">
                                <h5>Enter Details to Login</h5><br>
                                Username:
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                    <input type="text" class="form-control" name="username" placeholder="Your Username " />
                                </div>
                                Password:
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="Your Password" />
                                </div>
                                <div class="form-group">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" /> Remember me
                                    </label>
                                </div>
                                <input class="btn btn-primary " type="submit" value="Login Now" /><br>
                                <?php
                                    $message='';
                                    if (isset($_GET['username']) && isset($_GET['password'])){
                                        $username1 = $_GET['username'];
                                        $password = $_GET['password'];
                                        $password_md5 = md5($_GET['password']);
                                        if (!empty($username1) && !empty($password)){
                                            $query = "SELECT id,role FROM user WHERE id ='$username1' AND password = '$password_md5'";
                                            if($query_run = mysqli_query($link,$query)){
                                                if (mysqli_num_rows($query_run)==0){
                                                    $message = 'username and password are unmatched';
                                                } else {
                                                    $query_row=mysqli_fetch_assoc($query_run);
                                                    $_SESSION['id'] = $query_row['id'];
                                                    $_SESSION['role']=$query_row['role'];
                                                    if ($query_row['role']=='student'){
                                                        echo '<script>window.location="index_student.php"</script>';
                                                    }else if($query_row['role']=='admin'){
                                                        echo '<script>window.location="index_admin.php"</script>';
                                                    }
                                                }
                                            }
                                        } else{
                                            $message='You should enter username and password';
                                        }
                                    }
                                    if($message!=''){
                                    ?><div class="row">
                                        <div class="alert alert-info">
                                            <?php echo $message; } ?>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
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

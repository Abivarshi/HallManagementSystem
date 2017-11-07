<?php session_start();
include_once('../Connect/Connect.php');?><!DOCTYPE html>
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
                    <h1 class="page-head-line">Available Rooms</h1>
                </div>
                <div class="panel-body">
                    <form action="requestRoom.php" method="get">
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
                                <!--
                                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">Request Room</button>

                                <!-- Modal
                                  <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">

                                      <!-- Modal content
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                          <p>Some text in the modal.</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>

                                    </div>
                                  </div>-->

                            </div>

                        </div>

                    </form>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12">

                    <?php
                    include('../Connect/Connect.php');
                    if(isset($_get['submit']) && !empty($_get["hallName"]))
                    {
                        $sql = "select room_number,(room_capacity-(select count(*) from stays where stays.hall_id=room.hall_id and stays.room_number=room.room_number)) as vacancy from room natural join hall where name='$_get[hallName]' and room_capacity>(select count(*) from stays where stays.hall_id=room.hall_id and stays.room_number=room.room_number)";
                        $result = $link->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table class='table table-striped table-bordered table-hover'><tr><th>Room Number</th><th>Vacancy</th></tr>";
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["room_number"]. "</td><td>" . $row["vacancy"]. "</td></tr>";
                            }
                            echo "</table><button type='button' class='btn btn-info ' data-toggle='modal' data-target='#myModal'>Request Room</button>

							<!-- Modal -->
							  <div class='modal fade' id='myModal' role='dialog'>
								<div class='modal-dialog'>
								
								  <!-- Modal content-->
								  <div class='modal-content'>
									<div class='modal-header'>
									  <button type='button' class='close' data-dismiss='modal'>&times;</button>
									  <h4 class='modal-title'>Please enter your details to request room in ". $_get["hallName"]."</h4>
									</div>
									<div class='panel-body'>
										<form action='requestRoom.php' method='get'>
                                        <div class='form-group'>
                                            <label>Student Id</label>
                                            <input class='form-control' name='id'size='100' type='text'>
                                        </div>
										<div class='form-group'>
                                            <label>Name</label>
                                            <input class='form-control' name='name' type='text'>
                                        </div>
										<div class='form-group'>
                                            <label>Department</label>
                                            <input class='form-control'name='department' type='text'>
                                        </div>										
										<div class='form-group'>
                                            <label>Year</label>
                                            <input class='form-control' name='year'type='text'>
                                        </div>
										<div class='form-group'>
                                            <label>Adderss</label>
                                            <input class='form-control' name='address' type='text'>
                                        </div>
										<div class='form-group'>
                                            <label>Email Address</label>
                                            <input class='form-control'name='email' type='text'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Other Information</label>
                                            <textarea class='form-control' name='other_info'rows='3'></textarea>
                                        </div>
                                  
                                 
                                        <button type='submit' class='btn btn-info' name='requestRoom'>Send Request </button>

                                    </form>
                            </div>
									<div class='modal-footer'>
									  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
									</div>
								  </div>
								  
								</div>
							  </div>";
                        } else {
                            echo "No Rooms Available";
                        }
                    }
                    if(isset($_get['requestRoom']))
                    {
                        $time = time();

                        $query = "INSERT INTO requestroom(student_name,id,department,address,email,other_info)VALUES('$_get[name]','$_get[id]','$_get[department]','$_get[address]','$_get[email]','$_get[other_info]')";
                        $result=mysqli_query($link,$query);

                    }
                    $link->close();
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

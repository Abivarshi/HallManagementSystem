<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Hall</title>

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

            </div>
            <!-- /. ROW  -->
            <div class="row">

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            New Hall Record
                        </div>
                        <div class="panel-body">
                            <form role="form" action="addHall.php">
                                <div class="form-group">
                                    <label>Hall ID</label>
                                    <input class="form-control" type="text" name="ID" pattern="[0-9]{3}" required>
                                    <p class="help-block">Required</p>
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name1" required>
                                    <p class="help-block">Required</p>
                                </div>

                                <div class="form-group">
                                    <label>Type</label><br/>
                                    <input type="radio" name ="type1" value="male"> Male <br>
                                    <input type="radio" name ="type1" value="male"> Female <br>
                                    <p class="help-block">Required</p>
                                </div>

                                <div class="form-group">
                                    <label>Capacity</label>
                                    <input class="form-control" type="number" name="capacity" step="1" required>
                                    <p class="help-block">Required</p>
                                </div>

                                <div class="form-group">
                                    <label>No of Rooms</label>
                                    <input class="form-control" type="number" name="room" step="1" required>
                                    <p class="help-block">Required</p>
                                </div>

                                <button type="submit" class="btn btn-danger">Submit </button>

                                <?php include '../Connect/Connect.php';
                                    if(isset($_GET['ID']) and  isset($_GET['name1']) and isset($_GET['type1']) and  isset($_GET['capacity']) and  isset($_GET['room']) ){
                                        $ID = $_GET['ID'];
                                        $name = $_GET['name1'];
                                        $type = $_GET['type1'];
                                        $capacity = (int)$_GET['capacity'];
                                        $room = (int)$_GET['room'];
                                        $q="INSERT INTO hall(hall_id,name,capacity,type,no_of_rooms) VALUES ('$ID','$name','$capacity','$type','$room')";
                                        mysqli_query($link,$q);
                                    }
                                ?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.ROW-->
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

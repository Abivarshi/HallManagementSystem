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
                    <h1 class="page-head-line">View Employee detail</h1>
                </div>
                <div class="panel-body">
                    <form role="form" action="viewEmployee.php">
                        <div class="form-group">
                            <label>ID</label>
                            <input class="form-control" type="text" name="ID">
                        </div>
                        <button type="submit" class="btn btn-danger">Submit </button>
                    </form>
                </div>

                <?php include '../Connect/Connect.php';
                if(isset($_GET['ID'])){
                    $ID = $_GET['ID'];
                    $q1="select concat(first_name,'  ',last_name) as name,concat(address_number,',  ',address_street,',  ',address_city,',  ',address_country,'.') as address,gender,date_of_birth,salary,position,working_hours,hall.name as hall_name from (person natural join employee natural join works) join hall using(hall_id) where person.id=$ID";
                    $result = mysqli_query($link,$q1);
                    while ($line = mysqli_fetch_array($result)){
                        $Name=$line['name'];
                        $Address=$line['address'];
                        $Gender=$line['gender'];
                        $Date_of_Birth=$line['date_of_birth'];
                        $Salary=$line['salary'];
                        $Position=$line['position'];
                        $Working_hours=$line['working_hours'];
                        $Hall=$line['hall_name'];
                    } ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Employee Detail of <?php echo $Name;?>
                                </div>
                                <div class="panel-body">
                                    <dl class="dl-horizontal">
                                        <dt>Name</dt>
                                        <dd><?php echo $Name;?></dd>
                                        <dt>Address</dt>
                                        <dd><?php echo $Address; ?></dd>
                                        <dt>Gender</dt>
                                        <dd><?php echo $Gender;?></dd>
                                        <dt>Date of Birth</dt>
                                        <dd><?php echo $Date_of_Birth; ?></dd>
                                        <dt>Salary</dt>
                                        <dd><?php echo $Salary;?></dd>
                                        <dt>Position</dt>
                                        <dd><?php echo $Position; ?></dd>
                                        <dt>Working Hours</dt>
                                        <dd><?php echo $Working_hours;?></dd>
                                        <dt>Hall</dt>
                                        <dd><?php echo $Hall; ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
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
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assign Hall</title>

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
                    <h1 class="page-head-line">Assign Hall for Employee</h1>
                    <div class="panel-body">
                        <form action="assignHall.php" method="get">
                            <!--div class="form-group"-->
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <label>Hall Name</label>
                                </div>
                                <div class="form-group">
                                    <select class="form-control"name="hallName"required/>
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
                                </div><br>
                            </div>

                            <div class="form-group">
                                <label>Employee Id</label>
                                <input class="form-control" type="text" name="id" pattern="[0-9]{4}" required>
                                <p class="help-block">Enter Employee Id here.</p>
                            </div>

                            <button type="submit" name="assignSubmit" class="btn btn-info">Assign </button>
                            <br></br>
                            <?php
                            $message='';
                            include('../Connect/Connect.php');

                            if(isset($_GET['assignSubmit']))
                            {
                                $hall_name=$_GET['hallName'];
                                $id=$_GET['id'];
                                $ass_date=date("y/m/d");
                                $hallQuery="select hall_id from hall where name='$hall_name'";
                                $hallQuery=mysqli_query($link,$hallQuery);
                                $hallQuery=mysqli_fetch_array($hallQuery);
                                $hallId=$hallQuery['hall_id'];
                                $state="paid";
                                $query11 = "SELECT * FROM employee WHERE id='$id'";
                                $query11 = $link->query($query11);
                                $queryCount = mysqli_num_rows($query11);
                                if($queryCount > 0) {
                                    $query="insert into works(id,hall_id,date)values('$id','$hallId','$ass_date')";
                                    $query1=mysqli_query($link,$query);
                                    echo "<br>".'Employee Assigned successfully'." @ ".date("Y-m-d");
                                }
                                else{
                                    $message="Employee does not exit";
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
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

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
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div id="page-login">
            <div class="row text-center " style="padding-top:10px ">
                <div class="col-md-12">
                    <img src="../assets/img/logo_bar_2.png" style="width:1110px"/>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

                    <div class="panel-body">
                        <form action="loginform.php" role="form" method="get">
                            <hr />
                            <h5>Enter Details to Login</h5>
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                <input type="text" class="form-control" name="username" placeholder="Your Username " />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Your Password" />
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" /> Remember me
                                </label>
                            </div>
                            <input class="btn btn-primary " type="submit" value="Login Now" />
                            <?php
                            include '../Connect/Connect.php';
                            if (isset($_GET['username']) && isset($_GET['password'])){
                                $username1 = $_GET['username'];
                                $password = $_GET['password'];
                                $password_md5 = md5($_GET['password']);

                                if (!empty($username1) && !empty($password)){
                                    $query = "SELECT id FROM user WHERE id ='$username1' AND password = '$password'";
                                    if($query_run = mysqli_query($link,$query)){
                                        if (mysqli_num_rows($query_run)==0){
                                            $message = 'username and password are unmatched';
                                        } else {
                                            $query_row=mysqli_fetch_assoc($query_run);
                                            $_SESSION['id'] = $query_row['id'];
                                            echo '<script> location.replace("index.php"); </script>';
                                        }
                                    }
                                } else{
                                    $message= 'You should enter username and password';
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
            <footer>
                <div class = 'footer1'>
                    <b>Address</b><br>
                    University of Sumanadasa,<br/>
                    Moratuwa.
                </div>
                <div class = 'footer2'>
                    <b>Contact Us</b><br>
                    Email : uos@gmail.com<br />
                    Tel: Principal office: +940112220000
                </div>
                <div class = 'footer3'><i>copyright : Codmax</i></div>
            </footer>
        </div>
    </div>
</body>
</html>

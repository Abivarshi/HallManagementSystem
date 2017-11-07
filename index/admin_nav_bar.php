<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index_admin.php">Hall Management</a>
    </div>

    <div class="header-right">
        <?php
        include('../Connect/Connect.php');
        $approvalQuery = "SELECT * from requestroom";
        $approvalQuery = $link->query($approvalQuery);
        $approvalCount = mysqli_num_rows($approvalQuery);
        ?>
        <a href="message-task.html" class="btn btn-info" data-toggle="dropdown" title="New Request To join HMS"><b><?php echo $approvalCount; ?> </b><i class="fa fa-envelope-o fa-2x"></i></a>
        <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
        <a href="../login_out/logout.php" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>


    </div>
</nav>
<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <a href="#"><i class="fa fa-desktop "></i>Hall<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="../Hall/viewHall.php"><i class="fa fa-square-o "></i>View Detail</a>
                    </li>
                    <li>
                        <a href="../Hall/addHall.php"><i class="fa fa-square-o "></i>Add Hall</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-plus "></i>Room<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="../Room/viewAvailableRooms.php"><i class="fa fa-square-o "></i>Available Rooms</a>
                    </li>
                    <li>
                        <a href="../Room/roomHistoryForm.php"><i class="fa fa-square-o "></i>Room History</a>
                    </li>
                    <li>
                        <a href="assignRoom.php"><i class="fa fa-square-o "></i>Assign Room</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-plus "></i>Student<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="viewDetail.php"><i class="fa fa-square-o "></i>View Detail</a>
                    </li>
                    <li>
                        <a href="../Student/studentHistory.php"><i class="fa fa-square-o "></i>Student History</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-square-o "></i>Update Student Detail</a>
                    </li>
                    <li>
                        <a href="../Student/studentPayment.php"><i class="fa fa-square-o "></i>Payment Detail</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-plus "></i>Employee<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="../Employee/viewEmployee.php"><i class="fa fa-square-o "></i>View Detail</a>
                    </li>
                    <li>
                        <a href="../Employee/employeeHistory.php"><i class="fa fa-square-o "></i>Employee History</a>
                    </li>
                    <li>
                        <a href="../Employee/addEmployee.php"><i class="fa fa-square-o "></i>Add Employee</a>
                    </li>
                    <li>
                        <a href="../Admin/assignHall.php"><i class="fa fa-square-o "></i>Assign Hall</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-plus "></i>Payment<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="../Payment/addPayment.php"><i class="fa fa-square-o "></i>Add Student Payment</a>
                    </li>
                    <li>
                        <a href="unpaid.php"><i class="fa fa-square-o "></i>Unpaid Student Detail</a>
                    </li>
                    <li>
                        <a href="recordSalary.php"><i class="fa fa-square-o "></i>Record Employee Salary</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

</nav>
<!-- /. NAV SIDE  -->
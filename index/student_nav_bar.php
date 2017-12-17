<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../index/index_student.php">Hall Management</a>
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
                <a href="#"><i class="fa fa-desktop "></i>Hall<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="../Hall/viewHall.php"><i class="fa fa-square-o "></i>View Detail</a>
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
                        <a href="../Student/vacateRoom.php"><i class="fa fa-square-o "></i>Vacate Room</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="../Student/myDetail.php"><i class="fa fa-desktop "></i>My Detail <span class="fa arrow"></span></a>
            </li>
            <li>
                <a href="../Student/myHistory.php"><i class="fa fa-desktop "></i>My History <span class="fa arrow"></span></a>
            </li>
        </ul>
    </div>

</nav>
<!-- /. NAV SIDE  -->
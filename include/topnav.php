<div class="navbar navbar-fixed-top navbar-primary main" role="navigation">

    <div class="navbar-header pull-left">
        <div class="navbar-brand">
            <div class="pull-left">
                <a href="" class="toggle-button toggle-sidebar btn-navbar"><i class="fa fa-bars"></i></a>
            </div>
            <a href="./index.php" class="appbrand innerL">Admin Panel</a>

        </div>
    </div>

    <ul class="nav navbar-nav navbar-right">
        <!-- <li class=" hidden-xs">
            <form class="navbar-form navbar-left " role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Type in here..."/>
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-inverse"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </li> -->
        <li class="dropdown">
            <a href="" class="dropdown-toggle user" data-toggle="dropdown"> <img src="assets/images/people/35/8.jpg" alt="" class="img-circle"/><span class="hidden-xs hidden-sm"> &nbsp; <?php echo $formula_user; ?> </span> <span class="caret"></span></a>
            <ul class="dropdown-menu list pull-right ">
                <li><a href="employee.php"><i class="fa fa-user pull-right"></i>Your Profile </a></li>
                <li><a href="employee_list.php"><i class="fa fa-pencil pull-right"></i>Edit Account </a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i>Log out </a></li>
            </ul>
        </li>
        <li><a href="logout.php" class="menu-icon" style="border-left:1px #333333 solid;"><i class="fa fa-power-off"></i></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-left hidden-xs">
        <li class="dropdown notification hidden-sm hidden-md">
            <a href="#" class="dropdown-toggle menu-icon" data-toggle="dropdown"><i class="fa fa-fw fa-users"></i></a>
            <ul class="dropdown-menu">
                <li><a href="employee.php">Add New User</a></li>
                <li><a href="employee_list.php">User List</a></li>
            </ul>
        </li>

    </ul>
</div>
<ul class="nav ace-nav">

   
    
    
    <li class="green">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <i class="icon-user icon-animated-vertical"></i>
            <span class="badge badge-success">
			Admin Access 
            </span>
        </a>

        <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
            <li class="dropdown-header">
                <a href="employee.php">
                <i class="icon-user-md"></i>
                Add New Admin
                </a>
            </li>
            <li class="dropdown-header">
                <a href="employeelist.php">
                <i class="icon-user"></i>
                Admin List  
                </a>
            </li>
            
            <li class="dropdown-header">
            </li>
        </ul>
    </li>
    
    
    <li class="light-blue">
        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
            <img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
            <span class="user-info">
                <small>Welcome,</small>
                <?php echo $_SESSION['SESS_AMSIT_EMP_NAME']; ?>
            </span>

            <i class="icon-caret-down"></i>
        </a>

        <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
            <li>
                <a href="#">
                    <i class="icon-cog"></i>
                    Settings
                </a>
            </li>

            <li>
                <a href="test_profile.php">
                    <i class="icon-user"></i>
                    Profile
                </a>
            </li>

            <li class="divider"></li>

            <li>
                <a href="class/logout.php">
                    <i class="icon-off"></i>
                    Logout
                </a>
            </li>
        </ul>
    </li>
</ul><!-- /.ace-nav -->
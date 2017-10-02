<ul class="nav nav-list">
    <li>
        <a href="index.php">
            <i class="icon-dashboard"></i>
            <span class="menu-text">Back To Dashboard </span>
        </a>
    </li>
    <li>
        <a href="employee.php">
            <i class="icon-user"></i>
            <span class="menu-text">Add New Admin </span>
        </a>
    </li>
    <li>
        <a href="employeelist.php">
            <i class="icon-user-md"></i>
            <span class="menu-text">Admin List </span>
        </a>
    </li>

    <!--    <li>
            <a href="setting.php">
                <i class="icon-user-md"></i>
                <span class="menu-text">Setting Table </span>
            </a>
        </li>-->
    <?php
    $sqlmenu_custom=$obj->SelectAll("page_info");
    if (!empty($sqlmenu_custom))
        foreach ($sqlmenu_custom as $custom):
            ?>
            <li>
                <a href="<?php echo $custom->page_name; ?>">
                    <i class="icon-user-md"></i>
                    <span class="menu-text"><?php echo $custom->menu_name; ?> </span>
                </a>
            </li>
            <?php
        endforeach;
    ?>

</ul><!-- /.nav-list -->

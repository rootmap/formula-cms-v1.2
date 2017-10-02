<?php
session_start();
include('plugin/plugin.php');
$plugin=new cmsPlugin();
include('class/login.php');
$logins=new loginClass();
if (isset($_POST['formula'])) {
    include('class/db_Class.php');
    $obj=new db_class();
    extract($_POST);
    echo $logins->login_user($username, $password);
    exit();
}
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
    <head>
        <?php echo $plugin->softwareTitle();
        echo $plugin->GeneralBodyCss(); ?>
    </head>
    <body class=" loginWrapper">



        <div id="content"><h4 class="innerAll margin-none border-bottom text-center"><i class="fa fa-lock"></i> Login to your <?php echo $plugin->softwareName(); ?> Account<pre><?php echo $logins->GetPcAddress(); ?></pre></h4>



            <div class="login spacing-x2">
                <div class="placeholder text-center"><i class="fa fa-lock"></i></div>
                <div class="col-sm-6 col-sm-offset-3">
                    <?php echo $plugin->ShowMsg(); ?>
                    <div class="panel panel-default">
                        <div class="panel-body innerAll">
                            <form role="form" method="post" action="">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">User Name </label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                                </div>
                                <button type="submit" name="formula" class="btn btn-primary btn-block">Login</button>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" id="remember"> Remember my details
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-sm-offset-3 text-center">
                    <!--<a href="signup.php?lang=en" class="btn btn-info">Create a new account? <i class="fa fa-pencil"></i> </a>-->
                </div>
            </div>





            <!-- Global -->
            <?php echo $plugin->GeneralBodyJs(); ?>
    </body>
</html>
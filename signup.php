<?php include('plugin/plugin.php'); $plugin=new cmsPlugin(); ?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
<head>
	<?php echo $plugin->softwareTitle(); echo $plugin->GeneralBodyCss(); ?>	
</head>
<body class=" loginWrapper">

	
	
	<div id="content"><h4 class="innerAll margin-none border-bottom text-center"><i class="fa fa-lock"></i> Signup for new Account</h4>

<div class="login spacing-x2">
	<div class="placeholder text-center"><i class="fa fa-lock"></i></div>
	<div class="col-sm-6 col-sm-offset-3">
		<div class="panel panel-default">
			<div class="panel-body innerAll">
		  		<form role="form" action="index.html?lang=en">
			  		<div class="form-group">
		    			<label for="exampleInputEmail1">Full Name</label>
			    		<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Your full name">
			  		</div>
		  	  		<div class="form-group">
			    		<label for="exampleInputEmail1">Email address</label>
			    		<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
			  		</div>
			  		<div class="form-group">
			    		<label for="exampleInputPassword1">Password</label>
			    		<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  		</div>
			    	<div class="form-group">
			    		<label for="exampleInputPassword1">Confirm Password</label>
			    		<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Retype Password">
			  		</div>
			  		<button type="submit" class="btn btn-primary btn-block">Create Account</button>
				</form>
		  	</div>
		</div>
	</div>
	<div class="col-sm-6 col-sm-offset-3 text-center">
		<a href="login.php?lang=en" class="btn btn-info">I already have a account. <i class="fa fa-lock"></i> </a>
	</div>
</div>

	

	

	<!-- Global -->
	  <?php echo $plugin->GeneralBodyJs(); ?>
</body>
</html>
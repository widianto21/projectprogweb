<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/logins_css.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css">
</head>
<body>
	<div class="login-page" >
	  <div class="form">
	    <form class="login-form" method="post" action="<?php echo base_url();?>Users/user_login">
    		<?php if(isset($error_msg))echo "<p class=\"message\">".$error_msg."</p>"?>
	      	<input type="text" placeholder="username" name="username"/>
	      	<input type="password" placeholder="password" name="password"/>
	      	<button>login</button>
	    </form>
	  </div>
	</div>
</body>
</html>
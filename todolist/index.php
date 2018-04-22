<?php include('servr.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration </title>
	<link rel="stylesheet" type="text/css" href="css1.css">
</head>
<body>

<h1 style="color:#550080; text-align:center;">ToDO List Manager</h1>
	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="index1.php">

		<?php include('erors.php'); ?>

		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="reg.php">Sign up</a>
		</p>
	</form>


</body>
</html>
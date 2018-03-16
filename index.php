<?php
	session_start();

	if ( isset($_SESSION['errors']) ) {
		
		$errors = $_SESSION['errors'];
		
		$_SESSION['errors'] = null;

	  	unset($_SESSION['error']);
	}

	if (isset($_SESSION['user_id'])) {
		
		header('Location: /home.php');
		exit();
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP AUTH WITH SESSION</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		#login-form {
			margin-top: 5rem;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 class="text-center">PHP AUTH WITH SESSION</h1>
		<?php if (isset($errors)) { ?>
			<div class="alert alert-danger col-md-4 offset-md-4" role="alert">
				<Ul>
					<?php foreach ($errors as $value) { ?>
					<li><?php echo $value; ?></li>
					<?php } ?>
				</Ul>
			</div>
		<?php } ?>
		<?php if (!isset($_GET['register'])) { ?> 
			<div class="col-md-4 offset-md-4">
				<form id="login-form" action="/process-login.php" method="POST">
					<h2>Login Form</h2>

					  <div class="form-group">
					    <label for="email-address">Email address</label>
					    <input type="email" class="form-control" name="email" id="email-address" aria-describedby="emailHelp" placeholder="Enter email">
					    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
					  </div>
					  <div class="form-group">
					    <label for="password">Password</label>
					    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
					  </div>
					  <p><a href="/?register=true">Register here.</a></p>
					  <button type="submit" class="btn btn-primary" value="submit">Login</button>
				</form>
			</div>	
		<?php } ?>
		<?php if (isset($_GET['register'])) { ?>
			<div class="col-md-4 offset-md-4">
				<form id="login-form" action="/process-register.php" method="POST">
						<h2>Register Form</h2>
					  <div class="form-group">
					    <label for="email-address">Email address</label>
					    <input type="email" class="form-control" name="email" id="email-address" aria-describedby="emailHelp" placeholder="Enter email">
					    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
					  </div>
					  <div class="form-group">
					    <label for="name">Name</label>
					    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter name">
					    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
					  </div>
					  <div class="form-group">
					    <label for="password">Password</label>
					    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
					  </div>
					  <p><a href="/">Already registered?</a></p>
					  <button type="submit" class="btn btn-primary" value="submit">Register</button>
				</form>
			</div>	
		<?php } ?>	
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
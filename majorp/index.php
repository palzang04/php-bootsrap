<?php session_start();?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Palzang">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/logo.jpg" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title text-center">Login</h4>

							<form action ="" method="POST" class="my-login-validation was-validated">
								<div class="form-group">

									<label for="email">E-Mail Address*</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="valid-feedback">Valid.</div>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password*
										<a href="forgot.php" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password" required>
										<div class="valid-feedback">Valid.</div>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">

										<div class="invalid-feedback">
								    	Check this checkbox to continue
							    	</div>
										<label for="remember" class="custom-control-label">Remember Me</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block" name="submit">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="register.php">Create One</a>
								</div>
								<?php
									if(isset($_POST['submit']))
									{
										require_once("connection.php");

										$email=$_POST["email"];
										$password=$_POST["password"];
									$sql="select * from registration where email='".$email."'and password='".$password."'";

									$result=mysqli_query($conn,$sql);
									$numrows=mysqli_num_rows($result);
									if($numrows!=0)
									{


										while($row=mysqli_fetch_assoc($result))
										{
											$db_email=$row["email"];
											$db_password=$row["password"];
											$_SESSION["username"]=$row["name"];
										}
										if($email==$db_email && $password==$db_password)
										{
											header("location:view.php");
										}
										else {
											echo '<p class="font-weight-bold text-center">
											Incorrect username or password
											</p>';
										}

									}
									else {
										echo '<p class="font-weight-bold text-center">
										Account does not exist !
										</p>';
									}
									}

								?>
							</form>
						</div>
					</div>

					<div class="footer">
						Copyright @palzang 2021
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

<?php
session_start();


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Palzang">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Reset Password </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center align-items-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="img/logo.jpg" alt="bootstrap 4 login page">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title text-center">Forgot Password</h4>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
									<!-- <div class="form-text text-muted">
										By clicking "Reset Password" we will send a password reset link
									</div> -->
								</div>
								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block" name= "submit">
										Reset Password
									</button>
								</div>
								<br>
									<div class="text-center">
									<a href="index.php" class="text-center" >Back to login page</a>
									</div>


							</form>
							<?php
							if(isset($_POST["submit"]))
							{
								require_once("connection.php");
								$email=$_POST["email"];
								$_SESSION["email"]=$_POST["email"];
								$sql=" select * from registration where email = '".$email."'";
								$result=mysqli_query($conn,$sql);
								$numrows=mysqli_num_rows($result);
								if($numrows!=0)
								{
										while($row=mysqli_fetch_assoc($result))
										{
											$db_email=$row["email"];

										}
										if($email==$db_email)
										{
											header("location:reset.php");
										}
										else {
											echo '<p class="font-weight-bold text-center">
											Email does not exist
											</p>';
										}


								}
								else {
									{
										echo '<p class="font-weight-bold text-center">
										Email does not exist
										</p>';
									}
								}
							}




							?>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2017 &mdash; Your Company
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>

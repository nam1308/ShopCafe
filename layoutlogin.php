<!DOCTYPE html>
<html>
   <?php
   require './connect.php';
   
    if(!empty($_COOKIE['remember'])){
		session_start();
        $token=$_COOKIE['remember'];
        $sql="select * from nguoidung where token='$token'";
        $result=mysqli_query($connect,$sql);
        $each=mysqli_fetch_array($result);
        $_SESSION['MaNguoiDung']=$each['MaNguoiDung'];
        $_SESSION['TenND']=$each['TenNguoiDung'];
		$_SESSION['TaiKhoan']=$each['TaiKhoan'];
    }
	if(isset($_SESSION['MaNguoiDung'])){
		header('location:index1.php');
		exit;
	}
   ?> 
<head>
	<title>My Awesome Login Page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="./login.css">
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="./img/username.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="/Coffee/sign_in.php" method="POST">
						<div class="input-group">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" value="" placeholder="username">
						</div>
						<div class="mb-3" style="color: red;text-decoration-line:underline;text-decoration-style:wavy;">
						<?php
						if(isset($_GET['errorUserName'])){
							echo $_GET['errorUserName'];
						}
						
						?>
						</div>
						<div class="input-group">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
						</div>
						<div class="mb-3" style="color: red; text-decoration-line:underline; text-decoration-style:wavy;">
						<?php
						if(isset($_GET['errorPass'])){
							echo $_GET['errorPass'];
						}
						?>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="remember" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
						<div class="" style=" font-size: 11px;color: red; text-decoration-line:underline; text-decoration-style:wavy;">
						<?php
						if(isset($_GET['error'])){
							echo $_GET['error'];
						}
						?>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Login</button>
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="#" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

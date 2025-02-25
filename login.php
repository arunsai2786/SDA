<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page of BMS</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="login/login.css">
	<!-- <link rel="stylesheet" href="login_bootstrpe.css"> -->

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- <script src="login.js"></script>	 -->
    <style>
        .form {
            margin: 50px auto;
            width: 300px;
            padding: 30px 25px;
            background: white;
        }
    </style>

</head>

<body>
	<!-- partial:index.partial.html -->


	<form method="post" name="login">
		<div class="box-form">
			<div class="left">
				<div class="overlay">
					<h1>SDA Login</h1><br>
					<p>SDA - Student Dropout analysis</p>
					<span>
						<p>login with social media</p>
						<a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					</span>
				</div>
			</div>


			<div class="right">
				<h5>Login</h5>
				<p>Don't have an account? <a href="/test/Student-Dropout-Analysis-main/registration.php">Creat Your Account</a> it takes less than a minute</p>

				<?php
    require('login/db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $sql    = "SELECT * FROM users WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $sql) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
			header("Location:../Student-Dropout-Analysis-main/admin/admin.php");
        } else {
            echo "<p style='color:red'>Enter valid username and Password</p>";
				//   header("Location: /student_dropout_analysis/admin/admin.php");
        }
    } 
?>

				<div class="inputs">
					<input type="text" placeholder="user name" id="un" name="username">
					<br>
					<input type="password" placeholder="password" id="pwd" name="password">
				</div>

				<br><br>

				<div class="remember-me--forget-password">
					<!-- Angular -->
					<label>
						<input type="checkbox" checked />
						<span class="text-checkbox">Remember me</span>
					</label>
					<p>forget password?</p>
				</div>

				<br>
				<button name="submit">Login</button>
				<P> Back to Home <a href="/Student-Dropout-Analysis-main/index.html">Home</a></P>
			</div>

		</div>
	</form> 
	<!-- partial -->

	

</body>

</html>


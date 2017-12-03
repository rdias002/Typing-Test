<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
		<style>
			body{
				background-image:url(res/indexbg.jpg);
				font-size:20px;
				background-repeat: no-repeat;
				background-size: cover;
				color: white;
				text-align:center;
			}
			.signup{
				background-color:transparent;
				color:white;
				border:0;
			}
			
			input[type="text"], input[type="password"]{
				background: transparent;
				border: 3 white;
				color:white;
				font-size:15px;
			}
			td{
				color : white;
				font-size:20px;
				text-align:left;
			}
			
		</style>
	</head>
	<body>
		<h1>Online Typing Test</h1>
		<h2>Welcome To Your Online Typing Test</h2>
		<form action="" method="POST">
			<table align="center" style="margin-top:100px">
			<tr><td>User Name:</td><td> <input type="text"  name="lusername" id="lusername" size="20" value=""/></td></tr>
			<tr><td>Password:</td><td> <input type="password"  name="lpassword" id="lpassword" size="20" value=""/></td></tr>
			<tr><td colspan="2" style="text-align:center"> <input type="submit"  name="submit" id="submit" value="Login"/></td></tr>
			<tr ><td colspan="2" class="signup">Don't have an account? 
			<a href="signup.php" class="signup">Sign Up</a></td></tr>
			</table>
		</form>
		
		
	</body>
</html>
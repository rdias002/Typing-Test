<?php
	session_start();
	if(isset($_SESSION["username"]) && $_SESSION["username"] != 'Guest'){
		header( 'Location:index.php' );
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" href="css/body.css"/>
		<style>
			.val{
				background: transparent;				
				color:white;
				font-size:15px;
				border:1px white solid;
				padding:3px 5px;
			}
			td{
				color : white;
				font-size:20px;
				text-align:left;
			}
			.btn{
				color : white;
				background-color : transparent;
				border : 1px white solid;
				font-size : 20px;
				padding : 10px;
				margin-top : 10px;
			}
			
		</style>
	</head>
	<body>
		<h1>Online Typing Test</h1>
		<h2>Welcome To Your Online Typing Test</h2>
		<form action="" method="POST">
			<table align="center" style="margin-top:100px">
			<tr><td>User Name:</td><td> <input type="text"  name="lUsername" id="lUsername" size="20" value="" class="val"/></td></tr>
			<tr><td>Password:</td><td> <input type="password"  name="lPassword" id="lPassword" size="20" value="" class="val"/></td></tr>
			<tr><td colspan="2" style="text-align:center"> <input type="submit"  name="submit" id="submit" value="Login" class="btn"/></td></tr>
			<tr><td colspan="2" style="text-align:center">Don't have an account? <a style="color:white" href="signup.php">Sign Up</a></td></tr>
			<tr><td colspan="2" style="text-align:center"><a style="color:white" href="forgotpassword.php">Forgot password?</a></td></tr>
			<tr><td colspan="2" style="text-align:center"><a style="color:white" href="index.php">Not Now</a></td></tr>
			</table>
		</form>
	
	
	
	</body>
</html>
<?php
	require('db.php');
	if(isset($_POST["lUsername"],$_POST["lPassword"])){
		$username = htmlspecialchars($_POST["lUsername"]);
		$password = htmlspecialchars($_POST["lPassword"]);
		
		$user = $conn->query("select upassword from users where uname like '$username'");
		$temp = $user->fetch_assoc();
		if($user->num_rows == 0 || $temp["upassword"] !== $password)
			echo "<br/><br/><strong>Invalid Username & Password</strong><br>";
		else{
			$_SESSION["username"] = $username;
			header( 'Location:index.php' );
		}
	//	print_r($user);
	}
?>
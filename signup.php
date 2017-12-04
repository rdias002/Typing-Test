<!DOCTYPE html>
<html>
	<head>
		<title>Sign Up Page</title>
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
			<tr><td>User Name:</td><td> <input type="text"  name="susername" id="susername" size="20" value=""/></td></tr>
			<tr><td>Password:</td><td> <input type="password"  name="sPassword" id="sPassword" size="20" value=""/></td></tr>
			<tr><td>Confirm Password:</td><td> <input type="password"  name="sCassword" id="sCassword" size="20" value=""/></td></tr>
			<tr><td>Email:</td><td> <input type="text"  name="sEmail" id="sEmail" size="20" value=""/></td></tr>
			<tr><td>Mobile:</td><td> <input type="text"  name="sMobile" id="sMobile" size="20" value=""/></td></tr>
			<tr><td>Security Question:</td><td> <input type="list"  name="sSecQue" id="sSecQue" size="20" disabled /></td></tr> <!--- Add  drop down list for security question--->
 			<tr><td>Answer:</td><td> <input type="text"  name="sSecAns" id="sSecAns" size="20" /></td></tr>
			<tr><td colspan="2" style="text-align:center"> <input type="submit"  name="submit" id="submit" value="Sign Up"/></td></tr>
			<tr ><td colspan="2" style="text-align:center"">Already have an account? 
			<a href="index.php" class="signup">Log In</a></td></tr>
			</table>
			</tr>
			</table>
		</form>
		
		
	</body>
</html>
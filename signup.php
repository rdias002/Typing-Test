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
			.val{
				background: transparent;				
				color:white;
				font-size:15px;
				border:1px white solid;
				padding:3px 5px;
			}
		</style>
	</head>
	<body>
		<h1>Online Typing Test</h1>
		<h2>Welcome To Your Online Typing Test</h2>
		<form action="" method="POST">
			<table align="center" style="margin-top:100px">
			<tr><td>User Name:</td><td> <input type="text"  name="susername" id="susername" size="23" value="" class="val"/></td></tr>
			<tr><td>Password:</td><td> <input type="password"  name="sPassword" id="sPassword" size="23" value="" class="val"/></td></tr>
			<tr><td>Confirm Password:</td><td> <input type="password"  name="sCassword" id="sCassword" size="23" value="" class="val"/></td></tr>
			<tr><td>Email:</td><td> <input type="email"  name="sEmail" id="sEmail" size="23" value="" class="val"/></td></tr>
			<tr><td>Mobile:</td><td> <input type="text"  name="sMobile" id="sMobile" size="23" value="" class="val"/></td></tr>
			<tr><td>Security Question:</td><td> <select class="val" style="color:black" id="sSecQue"/>
				<option value="What is your favourite color?" >What is your favourite color?</option>
				<option value="Which city were you born in?">Which city were you born in?</option>
				<option value="What is your favourite food?">What is your favourite food?</option>
			</select></td></tr>
 			<tr><td>Answer:</td><td> <input type="text"  name="sSecAns" id="sSecAns" size="23" class="val"/></td></tr>
			<tr><td colspan="2" style="text-align:center"> <input type="submit" name="submit" id="submit" value="Sign Up" class="btn"/></td></tr>
			<tr ><td colspan="2" style="text-align:center">Already have an account? <a style="color:white" href="index.php" >Login</a></td></tr>
			</table>
			</tr>
			</table>
		</form>


	</body>
</html>
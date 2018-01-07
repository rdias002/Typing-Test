<?php
	session_start();
	if(isset($_SESSION["username"]) && $_SESSION["username"] != 'Guest'){
		header( 'Location:maingame.php' );
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sign Up Page</title>
		<style>
			body{
				background:url(res/indexbg.jpg) no-repeat center center fixed;
				font-size:20px;
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
			select option{
				color:white;
				background-color:rgb(199,44,50);
			}
		</style>
	</head>
	<body>
		<h1>Online Typing Test</h1>
		<h2>Welcome To Your Online Typing Test</h2>
		<form action="" method="POST">
			<table align="center" style="margin-top:100px">
			<tr><td>*User Name:</td><td> <input type="text"  name="sUsername" id="sUsername" size="23" value="<?php echo isset($_POST["sUsername"])?$_POST["sUsername"]:""?>" class="val" maxlength="10" required/></td></tr>
			<tr><td>*Password:</td><td> <input type="password"  name="sSPassword" id="sSPassword" size="23" class="val" maxlength="32" required/></td></tr>
			<tr><td>*Confirm Password:</td><td> <input type="password"  name="sCPassword" id="sCPassword" size="23" class="val" maxlength="32" required/></td></tr>
			<tr><td>*Email:</td><td> <input type="email"  name="sEmail" id="sEmail" size="23" class="val" maxlength="30" value="<?php echo isset($_POST["sEmail"])?$_POST["sEmail"]:""?>" required/></td></tr>
			<tr><td>Mobile Number:</td><td> <input type="text"  name="sMobile" id="sMobile" size="23" value="<?php echo isset($_POST["sMobile"])?$_POST["sMobile"]:""?>" class="val" pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$"/></td></tr>
			<tr><td>*Security Question:</td><td> <select class="val" id="sSecQue" name="sSecQue"/>
				<option value="What is your favourite color?">What is your favourite color?</option>
				<option value="Which city were you born in?">Which city were you born in?</option>
				<option value="What is your favourite food?">What is your favourite food?</option>
			</select></td></tr>
 			<tr><td>*Answer:</td><td> <input type="text"  name="sSecAns" id="sSecAns" size="23" class="val" maxlength="20" value="<?php echo isset($_POST["sSecAns"])?$_POST["sSecAns"]:""?>" required/></td></tr>
			<tr><td colspan="2" style="text-align:center"> <input type="submit" name="submit" id="submit" value="Sign Up" class="btn"/></td></tr>
			<tr ><td colspan="2" style="text-align:center">Already have an account? <a style="color:white" href="login.php" >Login</a></td></tr>
			</table>
			</tr>
			</table>
		</form>
		
		
		<?php
			require("db.php");
			if(isset($_POST["sUsername"],$_POST["sSPassword"],$_POST["sCPassword"],$_POST["sEmail"],$_POST["sMobile"],$_POST["sSecQue"],$_POST["sSecAns"])){
				$sUsername = $_POST["sUsername"];
				$sSPassword = $_POST["sSPassword"];
				$sCPassword = $_POST["sCPassword"];
				$sEmail = $_POST["sEmail"];
				$sMobile = $_POST["sMobile"];
				$sSecQue = $_POST["sSecQue"];
				$sSecAns = $_POST["sSecAns"];
				if($conn->errno)
					die("Error at server side. Will be fixed soon. Sorry for the inconvinience");
				if($sSPassword != $sCPassword){
					die("Passwords don't match");
				}
				$uns = $conn->query("select uname from users where uname = '$sUsername'");
				if($uns->num_rows == 1){
					die("User name already exists");
				}
				$que ="
					insert into users (uname,upassword,umobile,uemail,usecque,usecans) values ('$sUsername','$sSPassword','$sMobile','$sEmail','$sSecQue','$sSecAns');
				";
				$conn->real_query($que);
				$que ="
					insert into userdetails (uname,hgrosswpm,hnetwpm,haccuracy, notries) values ('$sUsername',0,0,0,0);
				";
				
				if($conn->real_query($que)){
					print("Successful! You will now be redirected to login page");
					
					header('Refresh: 3; url=login.php');
				}
				else{
					die("An error occured, please retry: ".$conn->error);
				}
			}
		
		?>
		

	</body>
</html>
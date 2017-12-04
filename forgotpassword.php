<!DOCTYPE html>
<html>
	<head>
		<title>Password Recovery Page</title>
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
				margin : 10px;

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
			<tr><td>User Name:</td><td> <input type="text"  name="lusername" id="lusername" size="20" value="<?php echo isset($_POST["lusername"])?$_POST["lusername"]:""?>" class="val"/></td></tr>
			<tr><td>Security Question:</td><td> <input type="text"  name="sSecQue" id="sSecQue" size="20" disabled class="val"/></td></tr>
			<tr><td>Answer:</td><td> <input type="text" value="<?php echo isset($_POST["sSecAns"])?$_POST["sSecAns"]:""?>" name="sSecAns" id="sSecAns" size="20" class="val"/></td></tr>
			<tr><td colspan="2" style="text-align:center"> <input type="submit"  name="recoverpass" id="recoverpass" value="Get Question" class="btn"/>
			<input type="hidden" id="queorpass" name="queorpass" value="que"/>
			</td></tr>
			<tr ><td colspan="2" style="text-align:center"><a style="color:white" href="index.php" >Login</a></td></tr>
			</table>
			<p id="forpass"></p>
		</form>
		<?php
			require('db.php');
			if(isset($_POST["lusername"])){
				$uname = $_POST["lusername"];
				$res = $conn->query("select usecque, usecans, upassword from users where uname = '$uname'");
				if($res->num_rows == 0)
					echo "<strong>User with that username doesn't exists</strong><br/>";
				else{
					$opt = $_POST["queorpass"];
					$row = $res->fetch_assoc();
					$secque = $row["usecque"];	
					$secans = $row["usecans"];
					$upass = $row["upassword"];
					if($opt == "que"){											
						$script = "
						<script>
							document.getElementById('sSecQue').value='$secque';
							document.getElementById('queorpass').value='pass';
							document.getElementById('sSecAns').value='';
							document.getElementById('recoverpass').value='Get Password';
						</script>
					";
					echo $script;
					}
					else{
						$script = "
							<script>
								var uname = document.getElementById('lusername').value;
								var secans = document.getElementById('sSecAns').value;
								document.getElementById('queorpass').value='que';
								if(uname == '$uname' && secans == '$secans')
									document.getElementById('forpass').innerHTML = 'Your password is: $upass';
								else
									document.getElementById('forpass').innerHTML = 'Incorrect answer';
							</script>
						";
						echo $script;
					}
				}
			}
		?>
	</body>
</html>
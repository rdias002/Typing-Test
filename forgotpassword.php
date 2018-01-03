<!DOCTYPE html>
<html>
	<head>
		<title>Password Recovery Page</title>
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
				margin : 10px;

			}
			.val{
				background: transparent;
				color:white;
				font-size:15px;
				border:1px white solid;
				padding:3px 5px;
			}
			#sSecAnstr{
				opacity:0;
				transition: opacity 1s;
			}
		</style>
	</head>
	<body>
		<script src="scripts/jquery-3.2.1.min.js"></script>
		<h1>Online Typing Test</h1>
		<h2>Welcome To Your Online Typing Test</h2>
		<form action="" method="POST">
			<table align="center" style="margin-top:100px">
			<tr><td>User Name:</td><td> <input type="text"  name="lusername" id="lusername" size="20" value="<?php echo isset($_POST["lusername"])?$_POST["lusername"]:""?>" class="val" required/></td></tr>
			<tr><td>Security Question:</td><td> <input type="text"  name="sSecQue" id="sSecQue" size="20" readonly class="val"/></td></tr>
			<tr id="sSecAnstr"><td>Answer:</td><td> <input type="text" value="<?php echo isset($_POST["sSecAns"])?$_POST["sSecAns"]:""?>" name="sSecAns" id="sSecAns" size="20" class="val"/></td></tr>
			<tr><td colspan="2" style="text-align:center"> <input type="submit"  name="recoverpass" id="recoverpass" value="Get Question" class="btn"/>
			<input type="hidden" id="queorpass" name="queorpass" value="que"/>
			</td></tr>
			<tr ><td colspan="2" style="text-align:center"><a style="color:white" href="login.php" >Login</a></td></tr>
			</table>
			<p id="forpass"></p>
		</form>
		<script>
			$(document).ready(function(){
			});
		</script>
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
							$('#sSecQue').val('$secque');
							$('#queorpass').val('pass');
							$('#sSecAns').val('');
							$('#recoverpass').val('Get Password');
							$('#sSecAnstr').css('opacity','1');
						</script>
					";
					echo $script;
					}
					else{
						$script = "
							<script>
								var uname = $('#lusername').val();
								var secans = $('#sSecAns').val();
								$('#queorpass').val('que');
								if(uname == '$uname' && secans == '$secans')
									$('#forpass').text('Your password is: $upass');
								else
									$('#forpass').text('Incorrect answer');
							</script>
						";
						echo $script;
					}
				}
			}
		?>
	</body>
</html>
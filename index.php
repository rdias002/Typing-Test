<?php		
	require('db.php');
	session_start();
	$n = rand();
	if(isset($_SESSION["username"])){
		
	}else{
		$_SESSION["username"] = 'Guest';
	}
	$user = $_SESSION["username"];
	if(isset($_POST['loggedout'])){
		session_unset();
		session_destroy();
		die();
	}
	if(isset($_POST['completed'])){
			$gwpm = $_POST['grosswpm'];
			$nwpm = $_POST['netwpm'];
			$acc = $_POST['accuracy'];
			if($user != 'Guest'){
				$details = ($conn->query("select * from userdetails where uname = '$user';"))->fetch_assoc();
				if($details['hgrosswpm']<$gwpm){
					$que = "update userdetails set hgrosswpm = $gwpm where uname = '$user'";
					$conn->query($que);
				}
				if($details['hnetwpm']<$nwpm){
					$que = "update userdetails set hnetwpm = $nwpm where uname = '$user'";
					$conn->query($que);
				}
				if($details['haccuracy']<$acc){
					$que = "update userdetails set haccuracy= $acc where uname = '$user'";
					$conn->query($que);
				}
				$que = "update userdetails set notries= notries + 1 where uname = '$user'";
				$conn->query($que);
			}
			echo json_encode(($conn->query("select * from userdetails where uname = '$user';"))->fetch_assoc());
			die();
	}
	if(isset($_POST['PageReady'])){
		$row = ($conn->query("select * from userdetails where uname = '$user';"))->fetch_assoc();
		echo json_encode($row);
		die();
	}
	if(isset($_POST['getDetails'])){
		$row = ($conn->query("select * from users where uname = '$user';"))->fetch_assoc();
		echo json_encode($row);
		die();
	}
	if(isset($_POST["uname"],$_POST["email"],$_POST["mobile"],$_POST["secque"],$_POST["secans"])){
				$sUsername = $_POST["uname"];
				$sSPassword = $_POST["pass"];
				$sCPassword = $_POST["rpass"];
				$sEmail = $_POST["email"];
				$sMobile = $_POST["mobile"];
				$sSecQue = $_POST["secque"];
				$sSecAns = $_POST["secans"];
				if($conn->errno)
					die("Error at server side. Will be fixed soon. Sorry for the inconvinience");
				if($sSPassword != $sCPassword){
					die("Passwords don't match");
				}
	}
	if(isset($_POST['deleteAccount'])){
		$user = $_POST['user'];
		$conn->query("delete from userdetails where uname = '$user'");
		$conn->query("delete from users where uname = '$user'");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Online Typing Test</title>
		<?php echo "<link rel='stylesheet' href='css/maingame.css?$n'/>";?>
		<style>
			
		</style>
	</head>
	<body>
		<div class="loginout">
		<b><span class="user" id="user" style="color:white;font-size:23px;"></span></b>&nbsp;
		<a href="login.php" id="login">Login</a>
		<a href="signup.php" id="signup">Sign Up</a>
		<a href="index.php" id="logout">Log Out</a>
		</div>
		<h1 style="font-size:50px">Online Typing Test</h1>
		<br/><br/>
		<div class="bod">
			<div class="container" id="container">
				<div class="words" id="words"></div>
				<div class="result" id="result" ></div>
				<div class="input">
					<input type="text" name="inputf" id="inputf" class="inputf" autofocus autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"/>
					<button class="replay" id="replay">Retry</button>
					<div id="time-dd" class="time-dd">
						<span class="time" id="time">1:00</span>
						<div id="time-dd-contents" class="time-dd-contents">
							<span id="1min" class="1min">1:00</span>
							<span id="2min" class="2min">2:00</span>
							<span id="5min" class="5min">5:00</span>
							<span id="10min" class="10min">10:00</span>
						</div>
					</div>
				</div>
			</div>
			<div id="details" class="details">
				<div>Username</div><div id='duname'></div>
				<div>No. Of Tests</div><div id='dnotries'></div>
				<div>Highest speeds(gross)</div><div id='dhgwpm'></div>
				<div>Highest speeds(net)</div><div id='dhnwpm'></div>
				<div id="editAC" class="editAC">Edit Account Details</div>
			</div>
			<div id="aceditor" class="aceditor">
				<span id="close" class="close">X</span>
				<form id="feditor" action="" method="post">
				<div id="editor" class="editor">
					
					<div>User Name:</div><div><input type="text" id="uname" class="val"/></div>
					<div>New Password:</div><div><input type="password" id="pass" class="val"/></div>
					<div>Repeat Password:</div><div><input type="password" id="rpass" class="val"/></div>
					<div>Email:</div><div><input type="email" id="email" class="val"/></div>
					<div>Mobile:</div><div><input type="mobile" id="mobile" class="val"/></div>
					<div>Security Question:</div><div><select class="val" id="secque" name="secque"/>
														<option value="What is your favourite color?">What is your favourite color?</option>
														<option value="Which city were you born in?">Which city were you born in?</option>
														<option value="What is your favourite food?">What is your favourite food?</option>
													  </select></div>
					<div>Answer:</div><div><input type="text" id="secans" class="val"/></div>
				</div>
				<div id="buttons" class="buttons">
					<input type="submit" id="save" class="save" value="Save"/><div id="delac" class="delac">Delete Account</div>
				</div>
				<div id="cdelac" class="cdelac">
					<div>Confirm Delete?</div>
					<div id="no" class="no">No</div>
					<div id="yes" class="yes">Yes</div>
				</div>
			</form>
			</div>
			<div id="highscores" class="highscores">
				<div class="highscores-title">Highscores</div>
				<div>Sr. No.</div><div>Username</div><div>wpm</div>
				<div>a</div><div>a</div><div>a</div>
				<div>a</div><div>a</div><div>a</div>
				<div>a</div><div>a</div><div>a</div>
				<div>a</div><div>a</div><div>a</div>
				<div>a</div><div>a</div><div>a</div>
				<div>a</div><div>a</div><div>a</div>
				<div>a</div><div>a</div><div>a</div>
				<div>a</div><div>a</div><div>a</div>
				<div>a</div><div>a</div><div>a</div>
				<div>a</div><div>a</div><div>a</div>
				<div>a</div><div>a</div><div>a</div>
				<div>a</div><div>a</div><div>a</div>
				<div>a</div><div>a</div><div>a</div>
			</div>
		</div>
		<?php
		echo "<div id='wordslist' style='display:none'><br/>";
		$wrdlist = $conn->query("select value from texts");
		$itr = 501;
		while($lst = $wrdlist->fetch_assoc()){
			$val = $lst["value"];
			echo "<textarea id='$itr'>'$val'</textarea><br/>";
			$itr = $itr + 1;
		}
		echo "</div>";
		
		echo "
		<script src='scripts/jquery-3.2.1.min.js'></script>
		<script src='scripts/maingame.js?$n'></script>			
		";
		?>
		
		<script>

		$(document).ready(function(){
			var user = "<?php echo $_SESSION['username'];?>";
			$('#user').text("("+user+")");
			if(user != 'Guest'){
				$("#login").hide();
				$("#signup").hide();
			}else{
				$("#logout").hide();
			}
			$("#logout").click(function(){
				$("#login").show();
				$("#signup").show();	
				$.post(window.location,{loggedout:'true'});
				location.reload();
				$(this).hide();
			});
		});
		</script>
	</body>
</html>


<link rel="stylesheet" href="css/default.css" type="text/css">
<?php
	if(isset($_REQUEST['logout']))
	{
		//need to change this to ONLY destroy SkateBoard session data
		session_start();
		session_unset();
		session_destroy();
	}
?>
<div id="loginBox">
			<div id="loginHeader">
				Welcome to Ballards' Talking Lawn!<br />
				Please Login:
			</div>
			<form id="loginForm" method="post" action="login.php">
				Username: <input type="text" name="username"><br />
				Password: <input type="password" name="pword"><br />
				<input type="submit" value="Login">
			</form>
			<div id="messageArea">
				<?php
						session_start();
				
					if(isset($_POST['username']))
					{
						$usr = $_POST['username'];
						$sql = "SELECT password FROM `users` WHERE `login` = '$usr'";
						
						include "../web/readConf.php";

						//database host and credentials
						$host = $config['DB_host'];
						$usr = $config['DB_user'];			//user
						$pass = $config['DB_password'];	//password
	
						$db = new mysqli($host,$usr,$pass,"SkateBoard");
						
						
						$result = $db->query($sql)->fetch_all();
						if(isset($result[0]) && $result[0][0] == $_POST['pword'])
						{
							$_SESSION['SkateBoard']['user'] = $_POST['username'];
							echo "Woo Hoo!";
							echo '<meta http-equiv="REFRESH" content="0;url=index.php">';
						}
						else
							echo 'Bad username or password.';
						
					}
				?>
			</div>
		</div>
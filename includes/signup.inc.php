<?php

session_start();

if (isset($_POST['submit'])) 
{
	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$old_pwd = '';
	$admin = 0;
	$restriction = 0;

	// Error Handlers
	// Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd))
	{
		header("Location: ../signup.php?signup=empty");
		exit();
	}
	else
	{
		// Check if imput charr are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last))
		{
			if(!preg_match("/^[a-zA-Z]*$/", $first))
			{
				header("Location: ../signup.php?signup=invalid-first");
			}
			if(!preg_match("/^[a-zA-Z]*$/", $last))
			{
				header("Location: ../signup.php?signup=invalid-last");
			}
			exit();
		}
		else
		{
			// Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				header("Location: ../signup.php?signup=email-fail");
				exit();
			}
			else
			{
				// Check for e-mail taken
				$sql = "SELECT * FROM users WHERE user_email = '$email'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if($resultCheck > 0)
				{
					header("Location: ../signup.php?signup=email-taken");
					exit();
				}


				$sql = "SELECT * FROM users WHERE user_uid = '$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
			
				if ($resultCheck > 0)
				{
					header("Location: ../signup.php?signup=usertaken");
					exit();
				}
				else
				{
					// Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);	
					// Insert the user into the database
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd, user_old_pwd, user_adm_lvl, user_rst_lvl) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd', '$old_pwd', '$admin', '$restriction');";
					mysqli_query($conn, $sql);

					mkdir($_SERVER['DOCUMENT_ROOT']. '/blake/users/' . $uid, 0700);
					copy($_SERVER['DOCUMENT_ROOT']. '/blake/photos/logos/picture.jpg', $_SERVER['DOCUMENT_ROOT']. '/blake/users/' . $uid . '/picture.jpg');
					
					$sql = "SELECT * FROM users WHERE user_uid = '$uid' OR user_email = '$email'";
					$result = mysqli_query($conn, $sql);
					if ($row = mysqli_fetch_assoc($result)) 
					{
						// Log in the user here
						$_SESSION['u_id'] = $row['user_id'];
						$_SESSION['u_first'] = $row['user_first'];
						$_SESSION['u_last'] = $row['user_last'];
						$_SESSION['u_email'] = $row['user_email'];
						$_SESSION['u_uid'] = $row['user_uid'];
						$_SESSION['u_adm_lvl'] = $row['user_adm_lvl'];
					}
					

					require("MailSend/PHPMailer.php");
					require("MailSend/SMTP.php");

					$mail = new PHPMailer\PHPMailer\PHPMailer();
					$mail->IsSMTP(); // enable SMTP

					$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
					$mail->SMTPAuth = true; // authentication enabled
					$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
					$mail->Host = "smtp.gmail.com";
					$mail->Port = 465; // or 587
					$mail->IsHTML(true);
					$mail->Username = "blake1blog@gmail.com";
        			$mail->Password = "BlakeBlogAB98177!?";
					$mail->SetFrom("blake1blog@gmail.com");
					$mail->Subject = "Bine ai venit, " . $first . " " . $last . "!";
					$mail->Body = 
					'
					<html>
					<body>
					<div id="container" style="margin: auto; width: 60%">
						<div id="logo-site" style="width: 204px; height: 88px; margin: auto;"><img src="https://andreiiosif.000webhostapp.com/photos/logos/logo_web.png"></div>
						<div id="bar" style="width: 100%; height: 10px; background-color: #efefef;"></div>
						<div id="titlu" style="font-size: 30px; color: black; text-align: center;">Salutare <b>' . $first . ' ' . $last . '</b>,</div>
						<p id="par1" style="padding-top: 10px; font-size: 20px; color: black;">Apreciem opiniile clientilor nostri si dorim intotdeauna sa oferim cea mai buna experienta utilizatorilor nostri.</p>
						<div id="lnk" style="margin: auto; width: 200px; font-size: 30px; color: black; background-color: #cd4228; text-align: center; margin-top: 10px; margin-bottom: 10px;"><a href="http://localhost/blake/myacc.php" style="font-size: 30px; color: black; text-decoration: none;">Contul meu</a></div>
						<p id="par2" style="font-size: 20px; color: black; text-align: center;">Va multumim ca ne ajutati sa va ajutam,<br>Echipa Mentors</p>
					</div>
					</body>
					</html>
					';
					$mail->AddAddress($email);

					if(!$mail->Send()) {
						echo "Mailer Error: " . $mail->ErrorInfo;
					} else {
						echo "Message has been sent";
					}
					header("Location: ../index.php?signup=succes");
					exit();
				}
			}
		}
	}
} 
else
{
	header("Location: ../signup.php");
	exit();
}
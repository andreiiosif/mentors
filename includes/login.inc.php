<?php

session_start();

if (isset($_POST['submit'])) 
{
	include 'dbh.inc.php';

	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	// Error Handlers
	// Check if inputs are empty
	if (empty($uid) || empty($pwd))
	{
		if(empty($uid) && empty($pwd))
		{
			header("Location: ../login.php?login=error");
		}
		else if(empty($uid))
		{
			header("Location: ../login.php?login=error");
		}
		else if(empty($pwd))
		{
			header("Location: ../login.php?login=error");
		}
		exit();
	}
	else
	{
		$sql = "SELECT * FROM users WHERE user_uid = '$uid' OR user_email = '$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1)
		{
			header("Location: ../login.php?login=err-log");
			exit();	
		}
		else
		{
			if ($row = mysqli_fetch_assoc($result)) 
			{
				//De-hashing password
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				if ($hashedPwdCheck == false) 
				{
					header("Location: ../login.php?login=pwderror");
					exit();	
				}
				elseif ($hashedPwdCheck == true) 
				{
					// Log in the user here
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					$_SESSION['u_adm_lvl'] = $row['user_adm_lvl'];
					header("Location: ../index.php?login=success");
					exit();
				}
			}
		}
	}
}
else
{
	header("Location: ../login.php?login=error");
	exit();
}
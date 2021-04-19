<?php
    session_start();
    include_once 'dbh.inc.php';
    $id = $_SESSION['u_id'];

    if(isset($_POST['first1']))
    {
        $first = mysqli_real_escape_string($conn, $_POST['first']);
        if (empty($first))
        {
            header("Location: ../myacc_edit.php?edit=no-data-first");
            exit();
        }
        if (!preg_match("/^[a-zA-Z]*$/", $first))
        {
            header("Location: ../myacc_edit.php?edit=invalid-first");
            exit();
        }
        // Actualizez numele folosit
        $sql = "UPDATE users SET user_first = '$first' WHERE user_id = $id";
        $result = mysqli_query($conn, $sql);
        $_SESSION['u_first'] = $first;

        header("Location: ../myacc_edit.php?edit=success-first");
        exit();
    }
    else if(isset($_POST['last1']))
    {
        $last = mysqli_real_escape_string($conn, $_POST['last']);
        if (empty($last))
        {
            header("Location: ../myacc_edit.php?edit=no-data-last");
            exit();
        }
        if (!preg_match("/^[a-zA-Z]*$/", $last))
        {
            header("Location: ../myacc_edit.php?edit=invalid-last");
            exit();
        }
        // Actualizez prenumele folosit
        $sql = "UPDATE users SET user_last = '$last' WHERE user_id = $id";
        $result = mysqli_query($conn, $sql);
        $_SESSION['u_last'] = $last;

        header("Location: ../myacc_edit.php?edit=success-last");
        exit();
    }
    else if(isset($_POST['email1']))
    {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            header("Location: ../myacc_edit.php?edit=invalid-email");
            exit();
        }   
        // Actualizez e-mail-ul folosit
        $sql = "UPDATE users SET user_email = '$email' WHERE user_id = $id";
        $result = mysqli_query($conn, $sql);
        $_SESSION['u_email'] = $email;

        header("Location: ../myacc_edit.php?edit=success-email");
        exit();
    }
    else if(isset($_POST['new_pass1']))
    {
        $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
        if (empty($new_pass))
        {
            header("Location: ../myacc_edit.php?edit=no-data-pass");
            exit();
        }
        // Actualizez parola folosita
        $hashedPwd = password_hash($new_pass, PASSWORD_DEFAULT);
        // Verific daca parola coincide cu parola curenta sau cu una veche
        $sql = "SELECT user_pwd, user_old_pwd FROM users WHERE user_id = $id";	
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        //De-hashing password
		$hashedPwdCheck1 = password_verify($new_pass, $row['user_pwd']);
		$hashedPwdCheck2 = password_verify($new_pass, $row['user_old_pwd']);
        if($hashedPwdCheck1 || $hashedPwdCheck2)
        {
            header("Location: ../myacc_edit.php?edit=old-pass");
            exit();
        }
        $old_hashedPwd = $row['user_pwd'];
        $sql = "UPDATE users SET user_pwd = '$hashedPwd', user_old_pwd = '$old_hashedPwd' WHERE user_id = $id";
        $result = mysqli_query($conn, $sql);

        header("Location: ../myacc_edit.php?edit=success-newpass");
        exit();
    }
?>
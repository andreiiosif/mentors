<?php
    if (isset($_POST['submit'])) 
    {
        include_once 'dbh.inc.php';

        $first = mysqli_real_escape_string($conn, $_POST['first']);
        $last = mysqli_real_escape_string($conn, $_POST['last']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $comm = mysqli_real_escape_string($conn, $_POST['coment']);

        if (empty($first) || empty($last) || empty($email))
        {
            header("Location: ../contact.php?contact=empty");
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            header("Location: ../contact.php?contact=email-fail");
            exit();
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
        $mail->Subject = "Ai primit un mesaj nou de la " . $first . " ". $last . "!";
        $mail->Body = 
        '
        <html>
        <body>			
        <div id="logo-site" style="width: 204px; height: 88px; margin: auto;"><img src="https://andreiiosif.000webhostapp.com/photos/logos/logo_web.png"></div>
        <div id="bar" style="width: 100%; height: 10px; background-color: #fefefe;"></div>
        <div id="continut" style="font-size: 20px;">Salut! <span style="font-weight: bolder;">' . $first . ' ' . $last . '</span> ti-a trimis un mesaj nou prin sectiunea contact si are adresa de mail <span style="font-weight: bolder;">' . $email . '</span>. Mai jos ai mesajul:</div>
        <div id="msj" style="width: 80%; margin: auto; margin-top: 15px; margin-bottom: 15px; font-size: 15px; font-style: italic;">' . $comm . '</div>
        <p id="par2" style="font-size: 20px; color: black; text-align: right;">Salut,<br>Mentors Autobot</p>
        </body>
        </html>
        ';
        $mail->AddAddress("iojaandrei11@gmail.com");

        if(!$mail->Send()) {
            //echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            //echo "Message has been sent";
        }       
        //header("Location: ../contact.php?contact=succes");
        exit(); 
    }
?>
<?php
require ('header.php');
session_start();

if(isset($_POST['submit_btn'])){
require 'PHPmailer/PHPMailerAutoload.php';

$name   = $_POST['name'];
$email   = $_POST['email'];
$number   = $_POST['number'];
$message = $_POST['message'];

$mail = new PHPMailer;
// $mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp1.gmail.com;smtp2.hotmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'vijay.jiovio@gmail.com';                 // SMTP username
$mail->Password = 'Jiovio98765@123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('from@example.com', 'JiovioHealthCare');
$mail->addAddress('devapraveen10@gmail.com');     // Add a recipient receive 
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'User Contact';
$mail->Body    = 'Name:'.$name.'<br>'.'Email:'.$email.'<br>'.'Phone Number:'.$number.'<br>'.'Comment Box:'.$message;
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    $_SESSION['failed'] ="<p class='text-center text-danger font-weight-normal'>!Please Try Again</p>". $mail->ErrorInfo;
    header("Location: contact.php");
} else {
    $_SESSION['success'] ="<p class='text-center text-success font-weight-normal'>!Form Submited Successfully</p>";
    header("Location: contact.php");
}
}
?>
<body>
    <form  method="post">
        <input type="text" name="name" id="">
        <input type="email" name="email" id="">
        <input type="text" name="message" id="">
        <input type="tel" name="number" id="">
        <button type="submit" name="submit_btn">Submit</button>
    </form>
</body>
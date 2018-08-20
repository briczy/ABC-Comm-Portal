<?php
require_once './PHPMailerAutoload.php';

$mail = new PHPMailer();
$mail->setFrom('lithanm6@gmail.com', 'Badmin');
// $mail->addAddress('brian.czy@gmail.com', 'User1');
$mail->Subject = $_POST['subject'];
$mail->isHTML(TRUE);
$mail->Body = $_POST['message'];
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = TRUE;
 
$mail->Username = 'lithanm6@gmail.com';
$mail->Password = 'H245hyt12';

$mysql = mysqli_connect('localhost', 'bzychiong', '6vkX_ct%');
mysqli_select_db($mysql, 'mail');
$result = mysqli_query($mysql, 'SELECT * FROM mailinglist');

foreach ($result as $row){
	$mail->addBCC($row['email'], $row['name']);
	if(!$mail->send()){
	echo "Mailer Error";
	break;
	} else {
		echo "Message sent to :".$row['email']."<br>";
	}
	$mail->clearAllRecipients();
}
?>
<a href="/phpcrudsample/public/home.php">Back To Home</a>


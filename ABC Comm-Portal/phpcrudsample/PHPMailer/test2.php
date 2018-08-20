<?php
$mysql = mysqli_connect('localhost', 'root', 'password');
mysqli_select_db($mysql, 'mail');
$result = mysqli_query($mysql, 'SELECT * FROM mailinglist');

foreach ($result as $row)
	$mail->addAddress($row['email'], $row['name']);
	if(!$mail->send()){
	echo "Mailer Error (".str_replace("@", "&#64;", $row['email'].')'.$mail->ErrorInfo.
	break;
	} else {
		echo "Message sent to :".$row['name'].'('.str_replace("@"
?>
<?php
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

include '../../includes/security.php';
include '../../includes/header.php';

ob_start();
?>

<body>
<div>
	<form name='bulk' method='post' action='./../../../PHPMailer/test.php'>
		<input type='text' name='subject' placeholder='Subject'><br>
		<br>
		<textarea name='message' placeholder='Message'></textarea><br>
		<br>
		<br>
		<button type="submit" value="Submit">Send Bulk Email</button>
		<button type="reset" value="Reset">Clear</button>
		<br>   
		<br>
		<br>  		
	</form>
</div>
    
<?php
include '../../includes/footer.php';
?>
<?php
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

include '../../includes/security.php';
include '../../includes/header.php';

ob_start();

$id= "";
$editresult = "";
$eresult = "";
$updatesql = "";
$updateresult = "";
$servername = "localhost";
$username = "bzychiong";
$password = "6vkX_ct%";
$database = "bzychiong";
$efname = $elname = $eemail = "";

/**
 * select conditions for $sql statements 
 * @var PDO $dbh
 */
$dbh = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
$editid = $_SESSION["email"];
$sql = "SELECT * FROM tb_user WHERE email='$editid'";
$editresult = $dbh->query($sql);

/**
 * print out rows and populate table
 */
foreach ($editresult as $row) {
    $eresult .= "<tr><td>" . $row['id'] . "</td><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "
</td><td>" . $row["email"] . "</td><td><input type='checkbox' name='delete[]' value='" . $row['id'] . "'</td></tr>";
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['efname'])) {
        $efname = $_REQUEST['efname'];
    }
    if (isset($_REQUEST['elname'])) {
        $elname = $_REQUEST['elname'];
    }
    if (isset($_REQUEST['eemail'])) {
        $eemail = $_REQUEST['eemail'];
    }
    $updatesql = "UPDATE tb_user SET firstname = '".$efname."', lastname = '".$elname."', email = '".$eemail."' WHERE email='$editid'";
    // var_dump($updatesql);
    $updateresult = $dbh->query($updatesql);
    echo 'Record updated in database, use new details the next time you login <br>'; 
}

$mailinglist = "mail";
$subname = "";
$subemail = "";
$subsql = "";
$subbed = "";

$dbh2 = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

if ($_SERVER['REQUEST_METHOD'] == "GET") {
	if (isset($_REQUEST['subname'])) {
        $subname = $_REQUEST['subname'];
    }
	if (isset($_REQUEST['subemail'])) {
        $subemail = $_REQUEST['subemail'];
    }
	if(isset($_REQUEST['subs']))
	{
	$subsql = "INSERT INTO mailinglist (name, email) VALUES ('$subname', '$subemail')";
	$subbed = $dbh2->query($subsql);
	echo 'Thanks for subscibing to our newsletter!';
	}
	if(isset($_REQUEST['unsubs']))
	{
	$unsubsql = "DELETE FROM mailinglist WHERE name='$subname' OR email='$subemail'";
	$unsubbed = $dbh2->query($unsubsql);
	echo 'Thanks for unsubscibing to our newsletter!';
	}
}

?>

<html>
<head>
    <style>
        table, th, td {
        	border: 1px solid black;
        }
    </style>
</head>

<body>
<div>
	<form name='update' action='' method='post'>
		First Name: <input type='text' name='efname'> 
		Last Name: <input type='text' name='elname'> 
		Email: <input type='text' name='eemail'>
		<button type="submit" value="Submit">Update</button>
		<button type="reset" value="Reset">Clear</button>
		<br> 		
		<table style='width:100%'>
            <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Delete</th>
            </tr>
            <?=$eresult?>
        </table>
        <input type='submit' value='Delete' style='float:right'>
	</form> 
</div>
<div>
	<form name='subscribe' method='get'>
		Name: <input type='text' name='subname'>
		Email: <input type='text' name='subemail'>
	<button type="submit" name="subs" value="Subscribe">Subscribe to our newsletter!</button>
	<button type="submit" name="unsubs" value="Unsubscribe">Unsubscribe</button>
	</form>
</div>
</body>
</html>

<?php
include '../../includes/footer.php';
?>
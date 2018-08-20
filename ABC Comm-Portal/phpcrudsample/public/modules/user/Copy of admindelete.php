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
$username = "root";
$password = "test123";
$database = "phpcrudsample";
$efname = $elname = $eemail = "";

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
    try {
        $dbh = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        if($efname.$elname.$eemail == ""){
            $sql = "SELECT * FROM tb_user";
        }
        else{
            $sql = "SELECT * FROM tb_user WHERE (firstname LIKE '$efname') OR (lastname LIKE '$elname') OR (email LIKE '$eemail')";
        }
        $results = $dbh->query($sql);
        foreach ($results as $row) {
            $eresult .= "<tr><td><a href='edit.php?id=" . $row['id'] . "'>" . $row['id'] . "</a></td><td>". $row["firstname"] . "</td><td>" . $row["lastname"] . "
                        </td><td>" . $row["email"] . "</td><td><input type='checkbox' name='delete[]' value='"
                            . $row['id'] . "'</td></tr>";
        }
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

/*
$dbh = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
$editid = $_SESSION["email"];
$sql = "SELECT * FROM tb_user";
$editresult = $dbh->query($sql);


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
    echo 'Record updated in database, use new details the next time you login';
}
*/

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
</body>
</html>
<?php
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

include '../../includes/security.php';
include '../../includes/header.php';

ob_start();

$results = "";
$sql = "";
$sfname = "";
$slname = "";
$semail = "";
$sresult = "";

/**
 * if request method is post connect and carry out SQL
 */
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST["searchfname"])) {
        $sfname = $_REQUEST["searchfname"];
    }
    if (isset($_REQUEST["searchlname"])) {
        $slname = filter_var($_REQUEST["searchlname"], FILTER_SANITIZE_STRING);
    }
    if (isset($_REQUEST["searchemail"])) {
        $semail = filter_var($_REQUEST["searchemail"], FILTER_SANITIZE_STRING);
    }
    /**
     * setting variables for connection
     */
    $servername = "localhost";
    $username = "bzychiong";
	$password = "6vkX_ct%";
	$database = "bzychiong";
    try {
        $dbh = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        /**
         * if fields all empty select all from DB
         */
        if($sfname.$slname.$semail == ""){
            $sql = "SELECT * FROM tb_user";
        }
        else{
            $sql = "SELECT * FROM tb_user WHERE (firstname LIKE '$sfname') OR (lastname LIKE '$slname') OR (email LIKE '$semail')";
        }
        $results = $dbh->query($sql);
        // echo $sql;
            foreach ($results as $row) {
                $sresult .= "<tr><td>" . $row['id'] . "</td><td>". $row["firstname"] . "</td><td>" . $row["lastname"] . "
                        </td><td>" . $row["email"] . "</td><td><input type='checkbox' name='delete[]' value='" . $row['id'] . "'</td></tr>";
            }
            /**
             * catch exception
             */
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
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
	<form name='search' method='post' action='admindelete.php'>
		First Name: <input type='text' name='searchfname'> 
		Last Name: <input type='text' name='searchlname'> 
		Email: <input type='text' name='searchemail'>
		<button type="submit" value="Submit">Search</button>
		<button type="reset" value="Reset">Clear</button>
		<br>        
	</form>
</div>
<div>
	<form name='feedback' action='delete.php' method='post'>		
		<table style='width:100%'>
            <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Delete</th>
            </tr>
            <?=$sresult?>
        </table>
     <input type='submit' value='Delete' style='float:right'>  
	</form> 
</div>
</body>
</html>

<?php 
include '../../includes/footer.php';
?>
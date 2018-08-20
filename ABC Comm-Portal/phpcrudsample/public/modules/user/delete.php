<?php
ob_start();
/**
 * delete functionality
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $getAllId = "";
    if(isset($_REQUEST["delete"]))
    {
        $idList= $_REQUEST["delete"];
    }
    
    $maxId = count($idList);

    $sql = "DELETE FROM tb_user WHERE id IN (";
    for($i = 0; $i < $maxId; $i++){
        if($i == $maxId-1){
            $sql.=$idList[$i].")";
        }
        else{
            $sql.=$idList[$i].", ";
        }
    }

    $servername = "localhost";
    $username = "root";
    $password = "test123";
    $database = "phpcrudsample";
    
    try {
        $dbh = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $query = $dbh->query($sql);
        header("Location: admindelete.php");
        die();
    }
    catch(PDOException $e){
        $php_error = "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}




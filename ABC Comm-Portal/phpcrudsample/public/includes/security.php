<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}

// $user = unserialize($_SESSION['user']);
?>




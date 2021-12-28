<?php 
    session_start();
    $_SESSION["current_user"] = array();
    header('location: index.php');
?>
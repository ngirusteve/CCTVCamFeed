<?php
//Author: Erick Saddam | Linkedn:https://www.linkedin.com/in/erick-saddam-44b71aa1
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
?>
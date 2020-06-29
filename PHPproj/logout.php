<?php
    session_start();
    $_SESSION["logged"]=false;
    header("location:../HTML files/login.html");
    exit();
    session_end();
?>    
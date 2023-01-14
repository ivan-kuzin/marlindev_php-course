<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';

    session_start();
    if ( isset($_SESSION['user']) ) {
        unset($_SESSION['user']);
    }
    header('Location: /');
?>
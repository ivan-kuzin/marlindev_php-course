<?php
    session_start();
    if ( isset($_SESSION['user']) ) {
        unset($_SESSION['user']);
    }
    header('Location: /task_15.php');
?>
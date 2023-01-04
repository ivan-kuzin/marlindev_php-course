<?php
    session_start();
    if ( isset($_SESSION['count']) ){
        $_SESSION['count'] = $_SESSION['count'] + 1;
    }else{
        $_SESSION['count'] = 1;
    }
    header('Location: /task_14.php');
?>
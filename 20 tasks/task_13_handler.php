<?php
    if ( isset($_POST['text']) ) {
        session_start();
        $_SESSION['text'] = $_POST['text'];
    }
    header('Location: /task_13.php');
?>
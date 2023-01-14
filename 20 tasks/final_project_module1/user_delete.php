<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/functions.php';
    session_start();

    if ( !user_logged() ){
        $_SESSION['error'] = 'Необходима авторизация';
        header('Location: /');
    }

    if ( isset($_GET['id']) && !empty($_GET['id']) ){
        require $_SERVER['DOCUMENT_ROOT'].'/config.php';
        $delete_user_sql = 'DELETE FROM users WHERE id = :id';
        $statement = $pdo->prepare($delete_user_sql);
        $statement->execute(['id' => $_GET['id']]);
        header('Location: /users_page.php');
    }
?>
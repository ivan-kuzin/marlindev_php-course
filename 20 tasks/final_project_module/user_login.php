<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/functions.php';
    session_start();

    if ( isset($_POST['email']) && isset($_POST['password']) ){

        $user_data = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        $user = get_user_info($user_data['email']);
        if ( !empty($user) ){
            if ( password_verify($user_data['password'], $user['password']) ){
                $_SESSION['user'] = $user['email'];
                header('Location: /users_page.php');
            }else{
                $_SESSION['error'] = 'Неверный пароль для пользователя '. $user_data['email'];
                header('Location: /');
            }
        }else{
            $_SESSION['error'] = 'Пользователь с почтой '. $user_data['email'] .' не найден';
            header('Location: /');
        }
    }else{
        header('Location: /');
    }
?>
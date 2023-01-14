<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/functions.php';

    if ( !user_logged() ){
        $_SESSION['error'] = 'Необходима авторизация';
        header('Location: /');
    }

    if ( isset($_POST['id']) && !empty($_POST['id']) ){
        $user_data = [
            'email' => $_POST['email'],
            'password' => ( isset($_POST['password']) && !empty($_POST['password']) ) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '',
            'first_name' => ( isset($_POST['first_name']) && !empty($_POST['first_name']) ) ? $_POST['first_name'] : '',
            'last_name' => ( isset($_POST['last_name']) && !empty($_POST['last_name']) ) ? $_POST['last_name'] : '',
            'age' => ( isset($_POST['age']) && !empty($_POST['age']) ) ? intval($_POST['age']) : '',
            'city' => ( isset($_POST['city']) && !empty($_POST['city']) ) ? $_POST['city'] : '',
            'banned' => 0
        ];

        if ( isset($_FILES['avatar']) && !empty($_FILES['avatar']) ){
            $file_name = $_FILES['avatar']['name'];
            $file_url = $_FILES['avatar']['tmp_name'];
            $user_data['avatar'] = file_uploader($file_name, $file_url);
        }

        $user_data = array_diff($user_data, array(''));
        $set_params_str = '';
        foreach ( $user_data as $key => $value ){
            if ( $key != 'id' ){
                $set_params_str .= $key .' = :'. $key .', ';
            }
        }

        $user_data['id'] = $_POST['id'];

        $update_user_sql = 'UPDATE users SET '. rtrim($set_params_str,', ') .' WHERE id = :id';
        $statement = $pdo->prepare($update_user_sql);
        $statement->execute($user_data);
        $_SESSION['success'] = 'Данные пользователя с почтой '. $user_data['email'] .' успешно обновлены!';
        header('Location: /');
    }else{
        $_SESSION['error'] = 'Произошла ошибка!';
        header('Location: /');
    }
?>
<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/functions.php';
    session_start();

    if ( isset($_POST['email']) && isset($_POST['password']) ) {
        $user_data = [
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
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
        $user_data_fields = array_keys($user_data);

        $user_data_values = [];
        foreach ( $user_data_fields as $field ){
            $user_data_values[] = ':'.$field;
        }

        $search_user_sql = 'SELECT * FROM users WHERE email = :email';
        $statement = $pdo->prepare($search_user_sql);
        $statement->execute(['email' => $user_data['email']]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if ( isset($user) && is_array($user) ){
            $_SESSION['error'] = 'Пользователь с почтой '. $user_data['email'] .' уже зарегистрирован!';
            header('Location: /registration_page.php');
        }else{
            $create_user_sql = 'INSERT INTO users ('. implode(',', $user_data_fields) .') VALUES ('. implode(',', $user_data_values) .')';
            $statement = $pdo->prepare($create_user_sql);
            $statement->execute($user_data);
            $_SESSION['success'] = 'Новый пользователь с почтой '. $user_data['email'] .' успешно зарегистрирован!';
            header('Location: /');
        }
    }else{
        header('Location: /');
    }
?>
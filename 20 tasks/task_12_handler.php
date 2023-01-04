<?php
    if ( $_POST['email'] && $_POST['password'] ){

        $data = [
            'username' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];

        $pdo = new PDO('mysql:host=localhost;dbname=task_12', 'root', 'root');

        $check_email_sql = 'SELECT * FROM users WHERE username = :username';
        $statement = $pdo->prepare($check_email_sql);
        $statement->execute( ['username' => $data['username']] );
        $check_email = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ( !empty($check_email) ){
            session_start();
            $_SESSION['user_exists'] = $data['username'] .' уже занят другим пользователем!';
            header('Location: /task_12.php');
        }else{
            $create_user_sql = 'INSERT INTO users (username, password) VALUES (:username, :password)';
            $statement = $pdo->prepare($create_user_sql);
            $statement->execute($data);
            header('Location: /task_12.php');
        }
    }else{
        header('Location: /task_12.php');
    }

?>
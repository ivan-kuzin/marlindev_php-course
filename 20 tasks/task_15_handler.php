<?php
    if ( isset($_POST['email']) && isset($_POST['password']) ){

        session_start();

        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        $pdo = new PDO('mysql:host=localhost;dbname=task_15', 'root', 'root');

        $login_sql = 'SELECT * FROM users WHERE email = :email';
        $statement = $pdo->prepare($login_sql);
        $statement->execute(['email' => $data['email']]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ( !empty($user) && password_verify($data['password'], $user['password']) ) {
            $_SESSION['user'] = $user['email'];
            header('Location: /task_16.php');
        }else{
            $_SESSION['user'] = 'error';
            header('Location: /task_15.php');
        }

    }else{
        header('Location: /task_15.php');
    }
?>
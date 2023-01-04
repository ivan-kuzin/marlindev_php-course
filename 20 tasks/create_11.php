<?php

    if ( $_POST['text'] ){

        $data = [
            'text' => $_POST['text']
        ];

        $pdo = new PDO('mysql:host=localhost;dbname=task_11', 'root', 'root');

        $sql_select = 'SELECT * FROM text WHERE text = :text';
        $statement = $pdo->prepare($sql_select);
        $statement->execute($data);
        $result_find = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ( $result_find ){
            session_start();
            $_SESSION['flash'] = 'Текст уже добавлен в Базу Данных!';
            header('Location: /task_11.php');
        }else{
            $sql_create = 'INSERT INTO text (text) VALUES (:text)';
            $statement = $pdo->prepare($sql_create);
            $statement->execute($data);
        }

        header('Location: /task_11.php');
    }else{
        header('Location: /task_11.php');
    }

?>
<?php

    if ( isset($_POST['text']) ){
        $data = [
            'text' => $_POST['text']
        ];
        $pdo = new PDO( 'mysql:host=localhost;dbname=task_10', 'root', 'root' );
        $sql = 'INSERT INTO text (text) VALUES(:text)';
        $statement = $pdo->prepare($sql);
        $statement->execute($data);
        header('Location: /task_10.php?status=ok');
    }else{
        header('Location: /task_10.php?status=error');
    }

?>
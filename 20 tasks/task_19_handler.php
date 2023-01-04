<?php
    function file_uploader($file_name, $file_url){
        $file_info = pathinfo($file_name);
        $new_file_name = uniqid() .'.'. $file_info['extension'];
        $new_file_url = $_SERVER['DOCUMENT_ROOT'] . '/task_19_upload/' . $new_file_name;
        move_uploaded_file($file_url, $new_file_url);
        return $new_file_name;
    }

    if ( isset($_FILES['files']) && is_array($_FILES['files']) ) {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/task_19_config.php';
        $upload_file_sql = 'INSERT INTO files (filename) VALUES (:filename)';
        $statement = $pdo->prepare($upload_file_sql);
        for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
            $file_name = $_FILES['files']['name'][$i];
            $file_url = $_FILES['files']['tmp_name'][$i];
            echo $file_name.' ';
            $statement->execute(['filename' => file_uploader($file_name, $file_url)]);
        }
    }

    header('Location: /task_19.php');
?>

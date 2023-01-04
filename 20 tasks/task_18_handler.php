<?php
if ( is_uploaded_file($_FILES['file']['tmp_name']) ) {
    $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/task_18_upload';
    $file = $_FILES['file'];
    $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
    $detectedType = exif_imagetype($file['tmp_name']);
    if ( in_array($detectedType, $allowedTypes) ) {
        $file_info = pathinfo($file['name']);
        $new_file_name = uniqid() .'.'. $file_info['extension'];
        $new_file_url = $upload_dir . '/' . $new_file_name;
        move_uploaded_file($file['tmp_name'], $new_file_url);
        require_once $_SERVER['DOCUMENT_ROOT'].'/task_18_config.php';
        $file_upload_sql = 'INSERT INTO files (filename) VALUES (:filename)';
        $statement = $pdo->prepare($file_upload_sql);
        $statement->execute(['filename' => $new_file_name]);
    } else {
        session_start();
        $_SESSION['error'] = 'Загружать можно только изображения формата png, jpg, jpeg или gif!';
    }
}
header('Location: /task_18.php');
?>
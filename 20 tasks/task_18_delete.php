<?php
if ( isset($_GET['image_id']) ) {
    $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/task_18_upload';
    $file = $_GET['image_id'];
    require_once $_SERVER['DOCUMENT_ROOT'].'/task_18_config.php';
    $find_image_sql = 'SELECT * FROM files WHERE id = :image';
    $statement = $pdo->prepare($find_image_sql);
    $statement->execute(['image' => $file]);
    $db_image = $statement->fetch(PDO::FETCH_ASSOC);

    if ( !empty($db_image) ){
        $image_name = $db_image['filename'];
        if ( file_exists($upload_dir.'/'.$image_name) ){
            unlink($upload_dir .'/'. $image_name);
            $file_delete_sql = 'DELETE FROM files WHERE id = :image';
            $statement = $pdo->prepare($file_delete_sql);
            $statement->execute(['image' => $db_image['id']]);
            session_start();
            $_SESSION['deleted'] = 'Файл '. $image_name .'удален!';
        }
    }
}
header('Location: /task_18.php');
?>
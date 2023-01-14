<?php
    function user_logged(){
        $active_user = false;
        if ( isset($_SESSION['user']) && !empty($_SESSION['user']) ){
            $active_user = true;
        }
        return $active_user;
    }

    function get_user_info($user_email){
        $result = false;
        if ( isset($user_email) && !empty($user_email) ){
            require $_SERVER['DOCUMENT_ROOT'].'/config.php';
            $user_login_sql = 'SELECT * FROM users WHERE email = :email';
            $statement = $pdo->prepare($user_login_sql);
            $statement->execute(['email' => $user_email]);
            $query_result = $statement->fetch(PDO::FETCH_ASSOC);
            if ( is_array($query_result) ){
                $result = $query_result;
            }
        }
        return $result;
    }

    function get_all_users_info(){
        $result = false;
        require $_SERVER['DOCUMENT_ROOT'].'/config.php';
        $search_users_sql = 'SELECT * FROM users';
        $statement = $pdo->prepare($search_users_sql);
        $statement->execute();
        $query_result = $statement->fetchAll(PDO::FETCH_ASSOC);
        if ( is_array($query_result) ){
            $result = $query_result;
        }
        return $result;
    }

    function file_uploader($file_name, $file_url){
        $file_info = pathinfo($file_name);
        $new_file_name = uniqid() .'.'. $file_info['extension'];
        $new_file_url = $_SERVER['DOCUMENT_ROOT'] . '/user_avatars/' . $new_file_name;
        move_uploaded_file($file_url, $new_file_url);
        return $new_file_name;
    }
?>

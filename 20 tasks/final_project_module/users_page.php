<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Пользователи</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'] .'/header.php'; ?>
<?php
if ( !user_logged() ){
    $_SESSION['error'] = 'Необходима авторизация';
    header('Location: /');
}
?>
<main role="main">
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5">
            <?php
                $current_user = get_user_info($_SESSION['user']);
                $users = get_all_users_info();

                if ( isset($current_user) && is_array($current_user) ):
                    ?>
                    <div class="col-md-6">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col-auto d-none d-lg-block" style="width: 200px; height: 250px;">
                                <?php
                                    if ( isset($current_user['avatar']) && !empty($current_user['avatar']) ):
                                        echo '<img src="/user_avatars/'. $current_user['avatar'] .'" style="width: 100%; height: 100%; object-fit: cover;">';
                                    else: ?>
                                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="15%" y="50%" fill="#eceeef">Нет изображения</text></svg>
                                <?php
                                    endif;
                                ?>
                            </div>
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-primary">Ваш профиль</strong>

                                <?php
                                    $first_name = ( isset( $current_user['first_name']) && !empty($current_user['first_name']) ) ? $current_user['first_name'] : '-';
                                    $last_name = ( isset( $current_user['last_name']) && !empty($current_user['last_name']) ) ? $current_user['last_name'] : '-';
                                ?>

                                <h3 class="mb-0">Имя: <?php echo $first_name .' '. $last_name; ?></h3>

                                <?php
                                    if ( isset($current_user['id']) ){
                                        echo '<div class="mb-1 text-muted">ID: '. $current_user['id'] .'</div>';
                                    }
                                ?>

                                <?php
                                    $age = ( isset( $current_user['age']) && !empty($current_user['age']) ) ? $current_user['age'] : 'Не указано';
                                    if ( isset($age) ){
                                        echo '<div class="mb-1 text-muted">Возраст: '. $age .'</div>';
                                    }
                                ?>

                                <?php
                                    $city = ( isset( $current_user['city']) && !empty($current_user['city']) ) ? $current_user['city'] : 'Не указано';
                                    if ( isset($city) ){
                                        echo '<div class="mb-1 text-muted">Город: '. $city .'</div>';
                                    }
                                ?>

                                <div class="btn-group" role="group">
                                    <a href="/user_show.php?id=<?php echo $current_user['id']; ?>" class="btn btn-success">Открыть</a>
                                    <a href="/user_edit.php?id=<?php echo $current_user['id']; ?>" class="btn btn-warning">Редактировать</a>
                                    <a href="#" class="btn btn-danger disabled">Удалить</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                endif;

                if ( isset($users) && is_array($users) ):
                    $current_user_email = $_SESSION['user'];
                    unset($users[array_search($current_user_email, $users)]);
                    foreach ( $users as $user ):
            ?>
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-auto d-none d-lg-block" style="width: 200px; height: 250px;">
                            <?php
                            if ( isset($user['avatar']) && !empty($user['avatar']) ):
                                echo '<img src="/user_avatars/'. $user['avatar'] .'" style="width: 100%; height: 100%; object-fit: cover;">';
                            else: ?>
                                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="15%" y="50%" fill="#eceeef">Нет изображения</text></svg>
                        <?php
                            endif;
                        ?>
                        </div>
                        <div class="col p-4 d-flex flex-column position-static">

                            <?php
                                $first_name = ( isset( $user['first_name']) && !empty($user['first_name']) ) ? $user['first_name'] : '-';
                                $last_name = ( isset( $user['last_name']) && !empty($user['last_name']) ) ? $user['last_name'] : '-';
                            ?>

                            <h3 class="mb-0">Имя: <?php echo $first_name .' '. $last_name; ?></h3>

                            <?php
                                if ( isset($user['id']) ){
                                    echo '<div class="mb-1 text-muted">ID: '. $user['id'] .'</div>';
                                }
                            ?>
                            <?php
                                $age = ( isset( $user['age']) && !empty($user['age']) ) ? $user['age'] : 'Не указано';
                                if ( isset($age) ){
                                    echo '<div class="mb-1 text-muted">Возраст: '. $age .'</div>';
                                }
                            ?>

                            <?php
                                $city = ( isset( $user['city']) && !empty($user['city']) ) ? $user['city'] : 'Не указано';
                                if ( isset($city) ){
                                    echo '<div class="mb-1 text-muted">Город: '. $city .'</div>';
                                }
                            ?>

                            <div class="btn-group" role="group">
                                <a href="/user_show.php?id=<?php echo $user['id']; ?>" class="btn btn-success">Открыть</a>
                                <a href="/user_edit.php?id=<?php echo $user['id']; ?>" class="btn btn-warning">Редактировать</a>
                                <a href="/user_delete.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Удалить</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                    endforeach;
                endif;
            ?>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

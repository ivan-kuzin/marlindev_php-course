<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Итоговый проект подготовительного модуля</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
if ( !user_logged() ){
    $_SESSION['error'] = 'Необходима авторизация';
    header('Location: /');
}
?>
<main role="main">
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-12 mx-auto col-lg-5">
                <div class="p-4 p-md-5 border rounded-3 bg-light">
                    <?php
                    if ( isset($_GET['id']) && !empty($_GET['id']) ):
                        require $_SERVER['DOCUMENT_ROOT'].'/config.php';
                        $user_login_sql = 'SELECT * FROM users WHERE id = :id';
                        $statement = $pdo->prepare($user_login_sql);
                        $statement->execute(['id' => intval($_GET['id'])]);
                        $query_result = $statement->fetch(PDO::FETCH_ASSOC);
                        if ( is_array($query_result) ):
                            $first_name = ( isset( $query_result['first_name']) && !empty($query_result['first_name']) ) ? $query_result['first_name'] : '';
                            $last_name = ( isset( $query_result['last_name']) && !empty($query_result['last_name']) ) ? $query_result['last_name'] : '';
                            $age = ( isset( $query_result['age']) && !empty($query_result['age']) ) ? $query_result['age'] : '';
                            $city = ( isset( $query_result['city']) && !empty($query_result['city']) ) ? $query_result['city'] : '';
                            $avatar = ( isset( $query_result['avatar']) && !empty($query_result['avatar']) ) ? $query_result['avatar'] : '';
                    ?>

                            <form action="/user_edit_handler.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $query_result['id']; ?>">
                                <div class="form-floating mb-3">
                                    <div class="d-none d-lg-block" style="width: 200px; height: 250px;">
                                        <?php
                                        if ( isset($query_result['avatar']) && !empty($query_result['avatar']) ):
                                            echo '<img src="/user_avatars/'. $query_result['avatar'] .'" style="width: 100%; height: 100%; object-fit: cover;">';
                                        else: ?>
                                            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="15%" y="50%" fill="#eceeef">Нет изображения</text></svg>
                                        <?php
                                            endif;
                                        ?>
                                    </div>
                                    <input type="file" name="avatar" class="form-control" id="avatar_field" placeholder="Аватар" value="<?php echo $query_result['avatar']; ?>" >
                                    <label for="email_field">Аватар</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control" id="email_field" placeholder="Почта*" value="<?php echo $query_result['email']; ?>" required >
                                    <label for="email_field">Почта*</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="first_name" class="form-control" id="first_name_field" placeholder="Имя" value="<?php echo $first_name; ?>">
                                    <label for="first_name_field">Имя</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="last_name" class="form-control" id="last_name_field" placeholder="Фамилия" value="<?php echo $last_name ?>" >
                                    <label for="last_name_field">Фамилия</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" name="age" class="form-control" id="age_field" placeholder="Возраст" value="<?php echo $age; ?>" >
                                    <label for="age_field">Возраст</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="city" class="form-control" id="city_field" placeholder="Город" value="<?php echo $city; ?>">
                                    <label for="city_field">Город</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="password" class="form-control" id="password" placeholder="Назначить новый пароль">
                                    <label for="password">Назначить новый пароль</label>
                                </div>
                                <button class="w-100 btn btn-lg btn-primary" type="submit">Обновить данные</button>
                            </form>

                    <?php
                            endif;
                        endif;
                    ?>
                    <a class="w-100 btn btn-outline-primary mt-3" href="/users_page.php" role="button">Вернуться к списку</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
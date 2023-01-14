<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Регистрация</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'] .'/header.php'; ?>
<main role="main">
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Регистрация нового пользователя.</h1>
                <p class="col-lg-10 fs-4">Для создания нового профиля пользователя минимально необходимо заполнить все отмеченные звездочкой поля.</p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <div class="p-4 p-md-5 border rounded-3 bg-light">
                    <?php
                        if ( isset($_SESSION['error']) ){
                    ?>
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </symbol>
                                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                </symbol>
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </symbol>
                            </svg>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                    <?php echo $_SESSION['error']; ?>
                                </div>
                            </div>
                    <?php
                            unset($_SESSION['error']);
                        }
                    ?>
                    <form action="/user_registration.php" method="post" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="file" name="avatar" class="form-control" id="avatar_field" placeholder="Аватар" value="<?php echo $query_result['avatar']; ?>" >
                            <label for="email_field">Аватар</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="email_field" placeholder="Почта*" required>
                            <label for="email_field">Почта*</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="first_name" class="form-control" id="first_name_field" placeholder="Имя">
                            <label for="first_name_field">Имя</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="last_name" class="form-control" id="last_name_field" placeholder="Фамилия">
                            <label for="last_name_field">Фамилия</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="age" class="form-control" id="age_field" placeholder="Возраст">
                            <label for="age_field">Возраст</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="city" class="form-control" id="city_field" placeholder="Город">
                            <label for="city_field">Город</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="password_field" placeholder="Пароль*" required>
                            <label for="password_field">Пароль*</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Зарегистрироваться</button>
                        <hr class="my-4">
                        <small class="text-muted"><a href="/">Войти в свой профиль.</a></small>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

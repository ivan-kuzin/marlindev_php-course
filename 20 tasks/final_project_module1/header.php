<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/functions.php';
?>
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <?php include $_SERVER['DOCUMENT_ROOT'] .'/menu.php'; ?>

        <div class="col-md-3 text-end">
            <?php
                if ( user_logged() ){
                    echo '<a href="/user_logout.php" class="btn btn-primary">Выйти</a>';
                }
            ?>
        </div>
    </header>
</div>
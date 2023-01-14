<?php
    $menu_items = [
        [
            'link' => '/',
            'title' => 'Главная',
        ],
        [
            'link' => '/users_page.php',
            'title' => 'Пользователи',
        ],

    ];

    if ( isset($menu_items) && !empty($menu_items) && is_array($menu_items) ){
        echo '<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">';
        foreach ( $menu_items as $item ){
            echo '<li><a href="'. $item['link'] .'" class="nav-link px-2 link-secondary">'. $item['title'] .'</a></li>';
        }
        echo '</ul>';
    }
?>

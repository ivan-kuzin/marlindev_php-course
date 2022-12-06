<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>
            Подготовительные задания к курсу
        </title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
            <div class="col-md-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Задание
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <?php
                            $array = [
                                [
                                    'title' => 'Мои задачи',
                                    'value' => '7 / 10',
                                    'bar_style' => 'bg-fusion-400',
                                    'progress' => '65'
                                ],
                                [
                                    'title' => 'Емкость диска',
                                    'value' => '440 TB',
                                    'bar_style' => 'bg-success-500',
                                    'progress' => '34'
                                ],
                                [
                                    'title' => 'Пройдено уроков',
                                    'value' => '77%',
                                    'bar_style' => 'bg-info-400',
                                    'progress' => '77'
                                ],
                                [
                                    'title' => 'Осталось дней',
                                    'value' => '2 дня',
                                    'bar_style' => 'bg-primary-300',
                                    'progress' => '84'
                                ],
                                [
                                    'title' => 'Тестовый заголовок',
                                    'value' => '23 дня',
                                    'bar_style' => 'bg-primary-300',
                                    'progress' => '70'
                                ]
                            ];

                            echo '<div class="panel-content">';
                            foreach ($array as $item){
                                echo '<div class="d-flex">'. $item['title'] .'<span class="d-inline-block ml-auto">'. $item['value'] .'</span></div>';
                                echo '<div class="progress progress-sm mb-3">';
                                echo '<div class="progress-bar '. $item['bar_style'] .'" role="progressbar" style="width: '. $item['progress'] .'%;" aria-valuenow="'. $item['progress'] .'" aria-valuemin="0" aria-valuemax="100"></div>';
                                echo '</div>';
                            }
                            echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </main>
        

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>

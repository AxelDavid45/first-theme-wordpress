<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    // Call head from wordpress
    wp_head();
    ?>
</head>
<body>
<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="<?= get_template_directory_uri() ?>/assets/img/logo.png" alt="">
            </div>
            <div class="col-md-8">
                <nav>
                    <?php wp_nav_menu(
                        array(
                            'theme_localization' => 'top_menu',
                            'menu_class' => 'menu-principal',
                            'container_class' => 'container-menu'
                        )
                    ); ?>
                </nav>
            </div>
        </div>
    </div>
</header>



<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? __('Osoleno'); ?></title>
    <meta name="description" content="<?php echo $page_description ?? __('Restaurace Osoleno - mistrovství kachních specialit v srdci Prahy.'); ?>">
    <meta name="keywords" content="<?php echo $page_keywords ?? __('restaurace Osoleno, kachní restaurace Praha, kachní speciality Praha, vysoká kuchyně Praha'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="/" class="logo">
                <img src="assets/images/osoleno-logo.webp" alt="Osoleno Logo">
            </a>
            <nav>
                <ul>
                    <li><a href="?page=home"><?php echo __('nav_home'); ?></a></li>
                    <li><a href="?page=about"><?php echo __('nav_about'); ?></a></li>
                    <li><a href="?page=menu"><?php echo __('nav_menu'); ?></a></li>
                    <li><a href="?page=blog"><?php echo __('nav_blog'); ?></a></li>
                    <li><a href="?page=contact"><?php echo __('nav_contact'); ?></a></li>
                    <li><a href="?page=eshop"><?php echo __('nav_eshop'); ?></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>

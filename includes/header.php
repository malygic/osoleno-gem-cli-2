<?php session_start(); ?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Osoleno - Mistrovství kachních specialit</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="site-header">
    <div class="container">
        <div class="site-header__wrapper">
            <a href="/" class="site-header__logo">Osoleno</a>

            <nav class="site-header__nav" id="primary-navigation">
                <ul>
                    <li><a href="/index.php">Úvod</a></li>
                    <li><a href="/o-nas.php">O nás</a></li>
                    <li><a href="/menu.php">Menu</a></li>
                    <li><a href="/blog.php">Blog</a></li>
                    <li><a href="/kontakt.php">Kontakt</a></li>
                </ul>
            </nav>

            <div class="site-header__actions">
                <a href="/e-shop.php" class="site-header__action-link">E-shop</a>
                <a href="/e-shop.php" class="site-header__icon" aria-label="Nákupní košík">
                    <!-- lucide: shopping-cart -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.16"/></svg>
                </a>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="/ucet.php" class="site-header__action-link">Můj účet</a>
                <?php else: ?>
                    <a href="/ucet.php" class="site-header__action-link">Přihlášení</a>
                <?php endif; ?>
                
                <a href="/kontakt.php" class="button button--primary">Rezervovat stůl</a>
            </div>

            <button class="mobile-nav-toggle" aria-controls="primary-navigation" aria-expanded="false">
                <span class="sr-only">Menu</span>
                <!-- lucide: menu -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                <!-- lucide: x -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-close"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
            </button>
        </div>
    </div>
</header>

<main>
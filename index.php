
<?php

require_once 'includes/lang.php';

$page = $_GET['page'] ?? 'home';

// Nastavení meta tagů pro jednotlivé stránky
switch ($page) {
    case 'home':
        $page_title = 'Osoleno - Mistrovství kachních specialit v Praze';
        $page_description = 'Objevte kulinářský zážitek v restauraci Osoleno, specialisty na kachní pokrmy v srdci Prahy.';
        $page_keywords = 'restaurace Osoleno, kachní restaurace Praha, kachní speciality Praha, vysoká kuchyně Praha';
        break;
    case 'about':
        $page_title = 'O nás - Příběh restaurace Osoleno';
        $page_description = 'Poznejte příběh a filozofii restaurace Osoleno a našeho šéfkuchaře.';
        $page_keywords = 'příběh restaurace, šéfkuchař Osoleno, hodnoty restaurace';
        break;
    case 'menu':
        $page_title = 'Menu - Jídelní a nápojový lístek Osoleno';
        $page_description = 'Prohlédněte si náš kompletní jídelní a nápojový lístek plný kachních specialit.';
        $page_keywords = 'menu restaurace, jídelní lístek, nápojový lístek, kachní pokrmy';
        break;
    case 'blog':
        $page_title = 'Blog - Novinky a články z Osoleno';
        $page_description = 'Přečtěte si nejnovější články, recepty a novinky z naší restaurace Osoleno.';
        $page_keywords = 'blog restaurace, kulinářské články, recepty, novinky';
        break;
    case 'contact':
        $page_title = 'Kontakt a rezervace - Restaurace Osoleno';
        $page_description = 'Kontaktujte nás nebo si rezervujte stůl v restauraci Osoleno.';
        $page_keywords = 'kontakt restaurace, rezervace stolu, adresa Osoleno, otevírací doba';
        break;
    case 'eshop':
        $page_title = 'E-shop Osoleno - Objednejte si domů';
        $page_description = 'Objednejte si naše kachní speciality a dezerty k vyzvednutí nebo doručení.';
        $page_keywords = 'e-shop restaurace, objednávka jídla, kachní produkty, rozvoz jídla';
        break;
    case 'register':
        $page_title = 'Registrace - Osoleno E-shop';
        $page_description = 'Zaregistrujte se pro snadnější objednávání z našeho e-shopu.';
        $page_keywords = 'registrace, nový účet, e-shop registrace';
        break;
    case 'login':
        $page_title = 'Přihlášení - Osoleno E-shop';
        $page_description = 'Přihlaste se do svého účtu pro správu objednávek.';
        $page_keywords = 'přihlášení, uživatelský účet, e-shop přihlášení';
        break;
    case 'account':
        $page_title = 'Můj účet - Osoleno E-shop';
        $page_description = 'Spravujte svůj účet a prohlížejte historii objednávek.';
        $page_keywords = 'můj účet, historie objednávek, uživatelský profil';
        break;
    default:
        $page_title = 'Stránka nenalezena - Osoleno';
        $page_description = 'Požadovaná stránka nebyla nalezena.';
        $page_keywords = '404, stránka nenalezena';
        break;
}

require_once 'includes/header.php';

$page_path = "pages/{$page}.php";

if (file_exists($page_path)) {
    include $page_path;
} else if ($page === 'register') {
    include 'pages/register.php';
} else if ($page === 'login') {
    include 'pages/login.php';
} else if ($page === 'account') {
    include 'pages/account.php';
} else if ($page === 'logout') {
    include 'pages/logout.php';
} else {
    include 'pages/404.php'; // Or a default error page
}

require_once 'includes/footer.php';

?>

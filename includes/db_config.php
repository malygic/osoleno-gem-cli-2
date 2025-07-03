<?php
/*
 * SOUBOR: db_config.php
 * PROJEKT: Osoleno
 *
 * Konfigurace připojení k databázi.
 */

// --- ZDE VYPLŇTE VAŠE ÚDAJE ---
define('DB_HOST', 'localhost');      // Adresa databázového serveru
define('DB_USER', 'uzivatel');       // Uživatelské jméno pro databázi
define('DB_PASS', 'heslo');          // Heslo pro databázi
define('DB_NAME', 'osoleno_db');     // Název databáze
// ---------------------------------

// Vytvoření připojení
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Nastavení kódování
$conn->set_charset("utf8mb4");

// Kontrola připojení
if ($conn->connect_error) {
    // V produkčním prostředí by se chyba neměla vypisovat, ale logovat.
    // Pro účely vývoje je to v pořádku.
    die("Chyba připojení k databázi: " . $conn->connect_error);
}

<?php

$servername = "localhost";
$username = "TVOJE_UZIVATELSKE_JMENO"; // <-- DOPLŇ
$password = "TVOJE_HESLO"; // <-- DOPLŇ
$dbname = "osoleno";

// Vytvoření připojení
$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrola připojení
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>

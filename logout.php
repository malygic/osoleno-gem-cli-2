<?php
session_start(); // Je potřeba nastartovat session, abychom ji mohli zničit
session_unset();  // Odstraní všechny session proměnné
session_destroy(); // Zničí session

// Přesměrování na úvodní stránku
header("Location: /index.php"); 
exit();
?>
<?php
/*
 * SOUBOR: process_reservation.php
 * PROJEKT: Osoleno
 *
 * Zpracování rezervačního formuláře.
 */

// Načtení konfigurace databáze
require_once 'includes/db_config.php';

// Zpracovat pouze pokud byla data odeslána metodou POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Získání a sanitizace dat z formuláře
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $date = trim($_POST['date']);
    $time = isset($_POST['time']) ? trim($_POST['time']) : '19:00'; // Výchozí čas, pokud není zadán
    $people = filter_var($_POST['people'], FILTER_SANITIZE_NUMBER_INT);
    $note = trim(htmlspecialchars($_POST['note']));

    // 2. Validace dat
    if (empty($name) || empty($email) || empty($phone) || empty($date) || empty($time) || empty($people) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Pokud chybí povinné údaje nebo je e-mail neplatný, přesměruj na chybovou stránku
        header("Location: rezervace-chyba.php?err=validation");
        exit();
    }

    // 3. Příprava a vložení dat do databáze pomocí prepared statement
    $sql = "INSERT INTO reservations (customer_name, customer_email, customer_phone, reservation_date, reservation_time, num_guests, note) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssis", $name, $email, $phone, $date, $time, $people, $note);
        
        if ($stmt->execute()) {
            // 4. Odeslání e-mailů (pokud bylo vložení úspěšné)
            // Upozornění: Funkce mail() vyžaduje správně nakonfigurovaný poštovní server.
            
            // --- E-MAIL PRO RESTAURACI ---
            $to_restaurant = "rezervace@osoleno.cz"; // Email restaurace
            $subject_restaurant = "Nová rezervace od: " . $name;
            $message_restaurant = "Byla vytvořena nová rezervace:\n\n"
                                . "Jméno: " . $name . "\n"
                                . "E-mail: " . $email . "\n"
                                . "Telefon: " . $phone . "\n"
                                . "Datum: " . date("d.m.Y", strtotime($date)) . "\n"
                                . "Čas: " . $time . "\n"
                                . "Počet osob: " . $people . "\n"
                                . "Poznámka: " . (!empty($note) ? $note : "Žádná") . "\n";
            $headers_restaurant = "From: web@osoleno.cz" . "\r\n" . "Reply-To: " . $email;

            @mail($to_restaurant, $subject_restaurant, $message_restaurant, $headers_restaurant);

            // --- E-MAIL PRO ZÁKAZNÍKA ---
            $to_customer = $email;
            $subject_customer = "Potvrzení Vaší rezervace v restauraci Osoleno";
            $message_customer = "Dobrý den, " . $name . ",\n\n"
                              . "děkujeme za Vaši rezervaci v naší restauraci.\n\n"
                              . "Rekapitulace údajů:\n"
                              . "Datum: " . date("d.m.Y", strtotime($date)) . "\n"
                              . "Čas: " . $time . "\n"
                              . "Počet osob: " . $people . "\n\n"
                              . "Tato rezervace bude brzy potvrzena naším personálem. Těšíme se na Vaši návštěvu!\n\n"
                              . "S pozdravem,\nTým Osoleno";
            $headers_customer = "From: rezervace@osoleno.cz";

            @mail($to_customer, $subject_customer, $message_customer, $headers_customer);

            // 5. Přesměrování na děkovací stránku
            header("Location: rezervace-dekujeme.php");
            exit();

        } else {
            // Chyba při provádění dotazu
            header("Location: rezervace-chyba.php?err=db_execute");
            exit();
        }
        $stmt->close();
    } else {
        // Chyba při přípravě dotazu
        header("Location: rezervace-chyba.php?err=db_prepare");
        exit();
    }
    
    $conn->close();

} else {
    // Pokud se někdo pokusí přistoupit na skript přímo
    header("Location: kontakt.php");
    exit();
}
?>
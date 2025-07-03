<?php
session_start();
require_once 'includes/db_config.php';

// Zjistíme, zda jde o registraci nebo přihlášení
$action = $_POST['action'] ?? '';

// --- REGISTRACE ---
if ($action === 'register') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validace
    if (empty($name) || empty($email) || empty($password) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ucet.php?error=register_validation');
        exit();
    }

    // Hashování hesla
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Kontrola, zda email již neexistuje
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->close();
        header('Location: ucet.php?error=email_exists');
        exit();
    }
    $stmt->close();

    // Vložení nového uživatele
    $stmt = $conn->prepare("INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password_hash);
    
    if ($stmt->execute()) {
        // Automatické přihlášení po registraci
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['user_name'] = $name;
        $stmt->close();
        header('Location: ucet.php?success=register');
    } else {
        $stmt->close();
        header('Location: ucet.php?error=register_failed');
    }
    exit();
}

// --- PŘIHLÁŠENÍ ---
if ($action === 'login') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        header('Location: ucet.php?error=login_validation');
        exit();
    }

    $stmt = $conn->prepare("SELECT id, name, password_hash FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password_hash'])) {
            // Heslo je správné, přihlásíme uživatele
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $stmt->close();
            header('Location: ucet.php');
        } else {
            // Špatné heslo
            $stmt->close();
            header('Location: ucet.php?error=login_failed');
        }
    } else {
        // Uživatel neexistuje
        $stmt->close();
        header('Location: ucet.php?error=login_failed');
    }
    exit();
}

// Pokud se na skript přistoupí bez platné akce
header('Location: index.php');
exit();
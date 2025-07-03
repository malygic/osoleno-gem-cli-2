<?php
session_start();
require_once 'includes/db_config.php';

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'add':
        $product_id = (int)$_POST['product_id'];
        if ($product_id > 0) {
            if (!isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id] = 0;
            }
            $_SESSION['cart'][$product_id]++;
        }
        header('Location: e-shop.php');
        exit();

    case 'remove':
        $product_id = (int)$_GET['product_id'];
        if ($product_id > 0 && isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
        }
        header('Location: e-shop.php');
        exit();

    case 'place_order':
        // Kontrola, zda je uživatel přihlášen a košík není prázdný
        if (!isset($_SESSION['user_id']) || empty($_SESSION['cart'])) {
            header('Location: e-shop.php?error=order_failed');
            exit();
        }

        // Získání dat z formuláře
        $user_id = $_SESSION['user_id'];
        $name = trim($_POST['name-order']);
        $email = trim($_POST['email-order']);
        $phone = trim($_POST['phone-order']);
        $address = trim($_POST['address-order']);
        
        // Server-side validace
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            header('Location: e-shop.php?error=validation');
            exit();
        }

        // Spuštění transakce pro zajištění konzistence dat
        $conn->begin_transaction();

        try {
            // Výpočet celkové ceny na serveru pro bezpečnost
            $total_price = 0;
            $product_ids = array_keys($_SESSION['cart']);
            $placeholders = implode(',', array_fill(0, count($product_ids), '?'));
            $stmt_products = $conn->prepare("SELECT id, price FROM products WHERE id IN ($placeholders)");
            $types = str_repeat('i', count($product_ids));
            $stmt_products->bind_param($types, ...$product_ids);
            $stmt_products->execute();
            $result_products = $stmt_products->get_result();
            $products_in_db = [];
            while ($row = $result_products->fetch_assoc()) {
                $products_in_db[$row['id']] = $row;
            }
            $stmt_products->close();

            foreach ($_SESSION['cart'] as $product_id => $quantity) {
                 if (isset($products_in_db[$product_id])) {
                    $total_price += $products_in_db[$product_id]['price'] * $quantity;
                } else {
                    // Produkt v košíku nebyl nalezen v DB, chyba
                    throw new Exception("Product with ID $product_id not found.");
                }
            }

            // 1. Vložení do tabulky `orders`
            $stmt_order = $conn->prepare("INSERT INTO orders (user_id, total_price, delivery_address) VALUES (?, ?, ?)");
            $stmt_order->bind_param("ids", $user_id, $total_price, $address);
            $stmt_order->execute();
            $order_id = $stmt_order->insert_id;
            $stmt_order->close();

            // 2. Vložení do tabulky `order_items`
            $stmt_items = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price_per_item) VALUES (?, ?, ?, ?)");
            foreach ($_SESSION['cart'] as $product_id => $quantity) {
                $price_per_item = $products_in_db[$product_id]['price'];
                $stmt_items->bind_param("iiid", $order_id, $product_id, $quantity, $price_per_item);
                $stmt_items->execute();
            }
            $stmt_items->close();

            // Potvrzení transakce
            $conn->commit();

            // Vyčištění košíku
            unset($_SESSION['cart']);

            // Zde by přišlo odeslání notifikačních e-mailů...

            header('Location: objednavka-dekujeme.php');
            exit();

        } catch (Exception $e) {
            // Vrácení změn v případě chyby
            $conn->rollback();
            // Můžete přidat logování chyby: error_log($e->getMessage());
            header('Location: e-shop.php?error=dberror');
            exit();
        }
}

// Pokud se akce neshoduje, přesměrujeme na úvodní stránku
header('Location: index.php');
exit();